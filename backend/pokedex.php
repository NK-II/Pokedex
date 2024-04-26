<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poke Dex Homepage</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('/Users/Sakib/Desktop/website_project/index/image/pkdx_bg.jpg'); 
        }

        .box, .banner-content {
            width: 100%;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: rgba(177, 243, 236, 0.5);
            text-align: center; 
        }


        .btn-primary {
            background-color: #007bff; 
            border-color: #007bff;
        }

        .custom-btn-color {
            background-color: #ff0000;
            border-color: #ff0000;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="homepage.html"><img src="./image/logo1.png" style="max-width: 40px;"/> <span class="ml-2 nav-banner">PokeRealm</span> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="homepage.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.html">LogOut</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center align-items-center py-5">
            <div class="banner-content text-center">
                <h1><b>This is the Pokédex!</b></h1>
                <p>Find all the pokémons here</p>
            </div>
        </div>

        <div class="row justify-content-center py-5">
            <div class="box">
                <h2>Pokédex</h2>
                <p>Find all of the Pokémons here!</p>

                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "pokebase";
                $conn = mysqli_connect($servername, $username, $password, $database);

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM pokemon";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<div><h3>" . $row['name'] . "</h3><p>" . $row['dex_entry'] . "</p><a href='details.html' id=" . $row['dex_entry'] . "' class='btn btn-primary custom-btn-color'>View</a></div>";

                    }
                } else {
                    echo "No Pokémon found.";
                }

                mysqli_close($conn);
                ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p>&copy; 2024 PokeDex. All rights reserved.</p>
            </div>
        </footer>
    </div>
</body>

</html>
