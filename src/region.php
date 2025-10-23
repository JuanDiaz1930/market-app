<?php
require('../config/database.php');

// Cargar países para el select
$query_countries = "SELECT id, name FROM countries ORDER BY name ASC";
$result_countries = pg_query($conn_supa, $query_countries);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Market-app || Add Region</title>
  <link rel="icon" type="image/png" href="icons/market_main.png"/>
  <style>
    body {
      background-color: #D2D9D3;
    }
    .button-container {
      text-align: center;
      margin-top: 20px;
    }
    .form-button {
      background-color: rgb(153, 153, 153);
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      margin: 5px;
      cursor: pointer;
      text-decoration: none; 
      display: inline-block;
    }
    .form-button:hover {
      background-color: #777;
    }
  </style>
</head>
<body>
  <center><h1>Add Region</h1></center>

  <form name="Region-Form" action="region.php" method="post">
    <center><img src="icons/region.png" width="5%" class="forma"></center>
    <table border="0" align="center">
      <tr>
        <td><label for="nregion">Name: </label></td>
      </tr>
      <tr>
        <td><input type="text" name="nregion" id="nregion" required><br></td>
      </tr>
      <tr>
        <td><label for="abbrevregion">Abbrev: </label></td>
      </tr>
      <tr>
        <td><input type="text" name="abbrevregion" id="abbrevregion" required><br></td>
      </tr>
      <tr>
        <td><label for="coderegion">Code: </label></td>
      </tr>
      <tr>
        <td><input type="text" name="coderegion" id="coderegion" required><br></td>
      </tr>
      <tr>
        <td><label for="country_id">Select Country: </label></td>
      </tr>
      <tr>
        <td>
          <select name="country_id" id="country_id" required>
            <option value="">-- Select a country --</option>
            <?php while ($row = pg_fetch_assoc($result_countries)): ?>
              <option value="<?= htmlspecialchars($row['id']) ?>">
                <?= htmlspecialchars($row['name']) ?>
              </option>
            <?php endwhile; ?>
          </select>
          <br>
        </td>
      </tr>
    </table>

    <!-- Botones juntos al final -->
    <div class="button-container">
      <button type="submit" class="form-button">Add Region</button>
      <a href="/src/index.html" class="form-button">Home</a>
    </div>
  </form>
</body>
</html>
