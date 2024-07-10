<?php
$db_hostname = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "netflix";
$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);
if (!$conn) {
    echo "connection failed:" . mysqli_connect_error();
    exit;
}
$email = $_POST["email"];
$password = $_POST["password"];
$sql = "SELECT * FROM mv WHERE email = '$email'";
$result3 = mysqli_query($conn, $sql);
if (!$result3) {
    echo "Query failed: " . mysqli_error($conn);
    exit;
}
$us2 = mysqli_fetch_assoc($result3);
if($us2)
{
    echo '<p id="ab">please enter new email id</p>;
    <script type="text/JavaScript" src="signup.js">
    </script>';
    exit;
}
// Use prepared statement to insert data
$sq = "INSERT INTO mv ( email, password) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $sq);

// Bind parameters
mysqli_stmt_bind_param($stmt, "ss", $email, $password);

// Execute the statement
$result = mysqli_stmt_execute($stmt);

if (!$result) {
    echo "error:" . mysqli_error($conn);
    exit;
}
echo "successfully registered";
header("Location:reg.html");
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>