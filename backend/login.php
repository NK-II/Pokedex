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

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $_SESSION['user'] = $username;
    $sql = "SELECT * FROM trainers WHERE trainer_name='$username'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['trainer_pass'])) {
            echo "Login successful!";
            header("Location: homepage.html");
            exit;
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
}
// $_SESSION['user'] = $username;
// var_dump($_SESSION['user']);// Close database connection
// echo $_SESSION['user'];
// session_destroy();
mysqli_close($conn);
?>
