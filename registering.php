<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "uts_pemweb";

    $fn = $_POST['fname'];
    $ln = $_POST['lname'];
    $user = $_POST['uname'];
    $pass = $_POST['psw'];
    $cpass = $_POST['cfm'];

    if ($pass == $cpass) {
    $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
    $sql = "INSERT INTO users (firstname, lastname, username, password, usertype) VALUES ('".$fn."','".$ln."','".$user."', '".$pass."', 'user');";
    if ($conn->query($sql) === TRUE) {
        header("location: login.php");
            exit;
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    $conn->close();
    } else {
        $message = "Error, please recheck details. Go back to previous page.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>