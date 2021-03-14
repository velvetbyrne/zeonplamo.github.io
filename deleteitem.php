<?php
session_start();

$id = $_GET["id"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uts_pemweb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $sql = "DELETE FROM food WHERE id=".$id;
    if ($conn->query($sql) === TRUE) {       
        header("location: admin.php");
        exit; 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();

}   

?>