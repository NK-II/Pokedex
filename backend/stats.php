<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Information</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            color: #d32f2f;
        }
        h1 {
            color: #d32f2f;
            text-align: center;
            font-size: 36px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #d32f2f;
            text-align: center;
            font-size: 24px;
            margin-bottom: 15px;
            text-transform: uppercase;
        }
        p {
            margin: 5px 0;
        }
        .pokemon-info {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        .stat-container {
            background-color: #fff;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, color 0.3s;
        }
        .stat-container:hover {
            background-color: #d32f2f;
            color: #fff;
        }
        .stat-label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .stat-value {
            font-size: 18px;
        }
        .error-message {
            color: red;
            text-align: center;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Pokémon Information</h1>

    <div class="pokemon-info">

    <?php
    $servername = "localhost"; 
    $username = "root";
    $password = "";
    $dbname = "pokebase";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $pokemon_name = $_POST["pokemon_name"];
    echo "<h2>{$pokemon_name}</h2>";

    $sql = "SELECT dex_entry FROM pokemon WHERE name = '$pokemon_name'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dex_entry = $row["dex_entry"];

        $sql = "SELECT * FROM pokemon_stats WHERE dex_no = '$dex_entry'";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            echo "<div class='pokemon-stats'>";
            echo "<h2>Pokémon Stats</h2>";
            
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='stat-container'>";
                echo "<p class='stat-label'>HP:</p>";
                echo "<p class='stat-value'>" . $row["HP"] . "</p>";
                echo "</div>";

                echo "<div class='stat-container'>";
                echo "<p class='stat-label'>Attack:</p>";
                echo "<p class='stat-value'>" . $row["Attack"] . "</p>";
                echo "</div>";

                echo "<div class='stat-container'>";
                echo "<p class='stat-label'>Defense:</p>";
                echo "<p class='stat-value'>" . $row["Defense"] . "</p>";
                echo "</div>";

                echo "<div class='stat-container'>";
                echo "<p class='stat-label'>Special Attack:</p>";
                echo "<p class='stat-value'>" . $row["Special_Attack"] . "</p>";
                echo "</div>";

                echo "<div class='stat-container'>";
                echo "<p class='stat-label'>Special Defense:</p>";
                echo "<p class='stat-value'>" . $row["Special_Defense"] . "</p>";
                echo "</div>";

                echo "<div class='stat-container'>";
                echo "<p class='stat-label'>Speed:</p>";
                echo "<p class='stat-value'>" . $row["Speed"] . "</p>";
                echo "</div>";

                echo "<div class='stat-container'>";
                echo "<p class='stat-label'>Ability:</p>";
                echo "<p class='stat-value'>" . $row["Ability"] . "</p>";
                echo "</div>";
            }

            echo "</div>";
        } else {
            echo "<p class='error-message'>No stats found for the given Pokémon.</p>";
        }
    } else {
        echo "<p class='error-message'>No Pokémon found with the given name or ID.</p>";
    }

    $conn->close();
    ?>

    </div>

</body>
</html>









