<?php
echo "Welcome to my world !!! ";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="src/icons/market_main.png"/>
    <style>
        body {
            background: linear-gradient(135deg, #9dc1d8, #dfdfdf); 
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 50px;
        }

        h1 {
            color: #333;
            font-size: 2em;
        }

        .user-info {
            color: #555;
            margin: 20px 0;
        }

        a {
            display: inline-block;
            margin: 10px;
            padding: 12px 20px;
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            font-size: 1em;
        }

        a:hover {
            background-color: #45a049;
        }
    </style>
    <title>Marketapp - Home</title>
</head>
<body>
    <h1>Welcome to MarketApp</h1>
    <div class="user-info">
        <b>User:</b> Here print your name
    </div>

    <a href="list_users.php">List All Users</a>
    <a href="logout.php">Logout</a>
</body>
</html>

