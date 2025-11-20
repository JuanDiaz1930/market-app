<?php
// Asegurando que el script se detenga si no hay un ID válido
if (!isset($_GET['userId']) || !is_numeric($_GET['userId'])) {
    die("Error: Se requiere un ID de usuario válido.");
}

// Requerir la conexión a la base de datos
require('../config/database.php');

$user_id = $_GET['userId'];

// **Consulta preparada para prevenir Inyección SQL**
$query_name = "get_user_by_id";
$sql_prepare = "SELECT id, ide_number, firstname, lastname FROM users WHERE id = $1";
$prepare_result = pg_prepare($conn_local, $query_name, $sql_prepare);

if ($prepare_result === false) {
    die("Error al preparar la consulta: " . pg_last_error($conn_local));
}

$result = pg_execute($conn_local, $query_name, array($user_id));

if (!$result) {
    die("Error al ejecutar la consulta: " . pg_last_error($conn_local));
}

$row = pg_fetch_assoc($result);

if ($row) {
    // Escapar datos de la DB antes de asignarlos (aunque htmlspecialchars se usará después)
    $id_number = $row['ide_number'];
    $f_name = $row['firstname'];
    $l_name = $row['lastname'];
} else {
    die("Error: Usuario con ID $user_id no encontrado.");
}

pg_free_result($result);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <style> 
        /* Estilos aplicados de tu ejemplo */
        body {
            /* Fondo degradado */
            background: linear-gradient(135deg, #9dc1d8, #dfdfdf);
            font-family: 'Times New Roman', Times, serif;
            text-align: center; /* Centrar el contenido */
            margin: 0; /* Eliminar márgenes por defecto */
            padding: 20px;
        }

        h1 {
            color: #333;
        }
        
        form {
            /* Estilos para el formulario/contenedor para que resalte */
            width: 350px;
            margin: 30px auto;
            padding: 20px;
            background-color: white; /* Fondo blanco para contraste */
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            border-collapse: collapse; /* Unificar bordes */
            width: 100%;
        }
        
        tr, td {
            border: none;
            padding: 8px 0;
            text-align: left;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        
        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
        }

        button[type="submit"] {
            /* Color del botón de tu ejemplo */
            background-color: rgb(182, 211, 212);
            color: #333;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        
        button[type="submit"]:hover {
            background-color: rgb(160, 190, 191);
        }
        
    </style>
</head>
<body>
    <center><h1>Editar Usuario</h1></center>
    
    <form name="edit_user_form" action="update_user.php" method="post" enctype="multipart/form-data">
        
        <input type="hidden" name="userId" value="<?php echo htmlspecialchars($user_id); ?>" required/>
        
        <table align="center">
            <tr>
                <td><label for="photo_user">Foto:</label></td>
            </tr>
            <tr>
                <td><input type="file" id="photo_user" name="photo_user"></td>
            </tr>
            
            <tr>
                <td><label for="id_number">Número de Identificación:</label></td>
            </tr>
            <tr>
                <td><input type="text" id="id_number" name="id_number" value="<?php echo htmlspecialchars($id_number); ?>" readonly required/></td>
            </tr>
            
            <tr>
                <td><label for="fname">Nombre:</label></td>
            </tr>
            <tr>
                <td><input type="text" id="fname" name="fname" value="<?php echo htmlspecialchars($f_name); ?>" required/></td>
            </tr>
            
            <tr>
                <td><label for="lname">Apellido:</label></td>
            </tr>
            <tr>
                <td><input type="text" id="lname" name="lname" value="<?php echo htmlspecialchars($l_name); ?>" required/></td>
            </tr>
            
            <tr>
                <td style="text-align: center; padding-top: 20px;">
                    <button type="submit">Actualizar Usuario</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>