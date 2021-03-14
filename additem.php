<?php
session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "uts_pemweb";

    $name = $_POST['nama'];
    $type = $_POST['tipe'];
    $price = $_POST['harga'];
    $desc = $_POST['description'];
    $target_dir = "asset/";
    $target_file = $target_dir . basename($_FILES['filetoupload']['name']);
    $file_tmp = $_FILES['filetoupload']['tmp_name'];
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        move_uploaded_file ( $_FILES['filetoupload']['tmp_name'] , $target_file );
        $sql = "INSERT INTO food (nama, tipe, harga, description, foto) VALUES ('".$name."','".$type."','Rp. ".$price."', '".$desc."', '".$target_file."');";
        if ($conn->query($sql) === TRUE) {       
            header("location: admin.php");
            exit; 
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
?>