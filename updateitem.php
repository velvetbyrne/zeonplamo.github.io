<?php
session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "uts_pemweb";

    $id = $_POST['id'];
    $name = $_POST['nama'];
    $type = $_POST['tipe'];
    $price = $_POST['harga'];
    $description = $_POST['description'];
    $target_dir = "asset/";
    $target_file = $target_dir . basename($_FILES['filetoupload']['name']);
    $file_tmp = $_FILES['filetoupload']['tmp_name'];
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        if (basename($_FILES['filetoupload']['name']) == '') {
            $sql = "UPDATE food SET nama ='".$name."', tipe='".$type."', harga='".$price."', description='".$description."' WHERE id=" .$id;
            if ($conn->query($sql) === TRUE) {       
                header("location: admin.php");
                exit;
            }
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();      
        } else {
            move_uploaded_file ( $_FILES['filetoupload']['tmp_name'] , $target_file );
            $sql = "UPDATE food SET nama ='".$name."', tipe='".$type."', harga='".$price."', description='".$description."', foto='".$target_file."' WHERE id=" .$id;
            if ($conn->query($sql) === TRUE) {       
                header("location: admin.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }
    }
?>