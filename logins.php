<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "uts_pemweb";

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
    $sql = "SELECT usertype FROM users WHERE username='".$user."' AND password='".$pass."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['usertype'] = 'admin') {
            $_SESSION['loginstatus'] = 'login';
            header("location: admin.php");
            exit;
        } 
        elseif ($row['usertype'] = 'user') {
            header("location: index.php");
            exit;
        } 
        }
    else {
        header("location: register.php");
        exit;
    }
    $conn->close();
?>