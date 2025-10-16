<?php
require('../config/database.php');

$country_id = $_GET['country_id'] ?? 0;

// Obtener regiones de ese país
$query = "SELECT id, name FROM regions WHERE id_country = $country_id AND deleted_at IS NULL";
$res = pg_query($conn_supa, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- HEAD normal con iconos y estilos -->
</head>
<body>
  <h1>Add City</h1>
  <form action="city_insert.php" method="post">
    <input type="hidden" name="country_id" value="<?php echo htmlspecialchars($country_id); ?>">
    
    <label for="region_id">Region:</label>
    <select name="region_id" required>
      <option value="">-- Select Region --</option>
      <?php
      while($row = pg_fetch_assoc($res)){
        echo "<option value='{$row['id']}'>{$row['name']}</option>";
      }
      ?>
    </select>

    <label for="cityname">Name:</label>
    <input type="text" name="cityname" id="cityname" required>

    <label for="abbrevcity">Abbrev:</label>
    <input type="text" name="abbrevcity" id="abbrevcity" required>

    <label for="codecity">Code:</label>
    <input type="text" name="codecity" id="codecity" required>

    <button type="submit">Add City</button>
  </form>
</body>
</html>

