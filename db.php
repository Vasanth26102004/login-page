<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$create_database_sql = "CREATE DATABASE IF NOT EXISTS admin";

if ($conn->query($create_database_sql) === FALSE){
    echo "Error creating Database: " . $conn->error . "<br>";
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";


$conn = new mysqli($servername, $username, $password,$dbname);

$create_table_sql = "CREATE TABLE IF NOT EXISTS page01
(
Username varchar(20),
Email varchar(50) NOT NULL,
Pass varchar(20),
PRIMARY KEY (Email),
UNIQUE (Username,Pass)
)";


if ($conn->query($create_table_sql) === TRUE) {
   echo "Table created successfully<br>";
} else {
   echo "Error creating table: " . $conn->error . "<br>";
}

if(isset($_POST['action']) && $_POST['action'] == 'login'){
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $checkQuery = "SELECT * FROM  WHERE Username='$user' AND Pass='$password'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "Login successful!";
    } else {
        echo "Invalid username or password";
    }
}

if(isset($_POST['action']) && $_POST['action'] == 'register') {

    $username = $_POST['user'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $insert_data_sql = "INSERT INTO page01 (Username,Email,Pass)
                        VALUES ('$username','$email','$pass')";

    $message = "REGISTRATION SUCCESSFUL";

    echo $message;
    echo "REGISTRATION SUCCESSFUL";
}

$conn->close();
?>
