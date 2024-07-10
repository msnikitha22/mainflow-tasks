<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "netflix";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$email = $_POST['email']; 
$password = $_POST['password']; 

$sql = "SELECT * FROM mv WHERE email = '$email' and password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    session_start();
    

    $_SESSION['email'] = $email;
    
    
    header("Location: homepage.html");
    exit();
} else {
    
    echo "<script>alert('Invalid email or password');</script>";
    echo "<script>window.location='login.html';</script>"; 
    exit();
}


$conn->close();
?>


