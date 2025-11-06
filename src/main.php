<?php
session_start();

// Verifica si tiene la id del usuario
if(!isset($_SESSION['session_user_id'])){
  header('refresh:0;url=error_403.html');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="src/icons/market_main.png" />
    <style>
        /* Estilo global */
        body {
            background: linear-gradient(135deg, #4e73df, #1d2f6d);
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            color: #fff;
        }

        .container {
            max-width: 800px;
            margin: 100px auto;
            text-align: center;
            padding: 30px;
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #fff;
            font-weight: 700;
        }

        .user-info {
            font-size: 1.1em;
            margin: 20px 0;
            color: #ccc;
        }

        .user-info b {
            color: #fff;
        }

        a {
            display: inline-block;
            margin: 15px;
            padding: 14px 25px;
            font-size: 1.1em;
            text-decoration: none;
            color: white;
            background-color: #28a745;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        a:hover {
            background-color: #218838;
            transform: translateY(-3px);
        }

        a:active {
            transform: translateY(1px);
        }

        footer {
            margin-top: 40px;
            color: #aaa;
            font-size: 0.9em;
        }

        footer a {
            color: #aaa;
            text-decoration: none;
        }

        footer a:hover {
            color: #fff;
        }
    </style>
    <title>MarketApp - Home</title>
</head>

<body>
    <div class="container">
        <h1>Welcome to MarketApp</h1>
        <div class="user-info">
            <b>User:</b> <?php echo htmlspecialchars($_SESSION['session_user_fullname']); ?>
        </div>
        <a href="list_users.php">List All Users</a>
        <a href="logout.php">Logout</a>
    </div>

    <footer>
        <p>&copy; 2025 MarketApp. All rights reserved. | <a href="about_us.html">About Us</a></p>
    </footer>
</body>

</html>

