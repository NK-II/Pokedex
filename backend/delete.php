<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "pokebase";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user = $_SESSION['user'];
var_dump($_SESSION['user']);
$sql = "DELETE FROM trainers WHERE trainer_name = '$user'";
mysqli_query($conn, $sql);
mysqli_close($conn);

session_destroy();

header("Location: register.html");
exit;
?>
