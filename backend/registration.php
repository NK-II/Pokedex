
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pokebase";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
}

if(isset($_POST["register"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO trainers (trainer_name, trainer_pass) VALUES ('$username', '$hashed_password')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
header("Location: login.html");
exit;
?>
