<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chanteclaire Home</title>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> 

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 

    <!-- Custom CSS -->  
    <link rel="stylesheet" href="style.css" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    label {
        padding:12px 20px;
        margin: 8px;
        text-align: right;
    }
    input[type=text], input[type=password] {
          width: 60%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          box-sizing: border-box;
          text-align: left;
        }
    </style>
<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
    <a class="navbar-brand" href="index.php">
            <img src="https://media.discordapp.net/attachments/613736379746353154/818471840661241906/Chanteclaire.png" style="width:250px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Menu</a>
                </li>
                <?php if ($_SESSION['loginstatus'] == 'login') { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                <?php } ?>    
            </ul>
        </div>  
</nav>
</head>
<div style="padding-top:150px;">
<h1>Edit Item Form</h1>
<div class="row justify-content-center">
    <form action="updateitem.php" method="post" style="width:85%; border: 1px solid #aaa;" enctype="multipart/form-data">
      <div class="container" style="text-align:center;">
        <div class="row">
        <?php
            $id = $_GET["id"];
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "uts_pemweb";
        
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        
            $sql = "SELECT id, nama, tipe, harga, foto, description FROM food WHERE id=".$id;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
               
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>
            <input type="hidden" name="id" value="<?php echo $row["id"] ?>" >
            <div class="col-md-6 text-right">
                <label for="name"><b>Name</b></label>
            </div>
            <div class="col-md-6 text-left">
                <input type="text" placeholder="Name" name="nama" required value="<?php echo $row["nama"] ?>" >
            </div>
            <div class="col-md-6 text-right">
                <label for="type"><b>Type</b></label>
            </div>
            <div class="col-md-6 text-left" style="padding-top:20px">
                <select name="tipe" id="tipe">
                    <?php if ($row["tipe"] == "Cake") { ?>
                        <option value="Cake" selected>Cake</option>
                    <?php } else { ?>
                        <option value="Cake">Cake</option>
                    <?php } ?>
                    <?php if ($row["tipe"] == "Brownies") { ?>
                        <option value="Brownies" selected>Brownies</option>
                    <?php } else { ?>
                        <option value="Brownies">Brownies</option>
                    <?php } ?>
                    <?php if ($row["tipe"] == "Chocolate") { ?>
                        <option value="Chocolate" selected>Chocolate</option>
                    <?php } else { ?>
                        <option value="Chocolate">Chocolate</option>
                    <?php } ?>    
                </select>
            </div>
            <div class="col-md-6 text-right">
                <label for="price"><b>Price</b></label>
            </div>
            <div class="col-md-6 text-left">
                <input type="text" placeholder="Price" name="harga" required value="<?php echo $row['harga'] ?>" >
            </div>
            <div class="col-md-6 text-right">
                <label for="desc"><b>Description</b></label>
            </div>
            <div class="col-md-6 text-left">
                <input type="text" placeholder="Description" name="description" required value="<?php echo $row['description'] ?>" >
            </div>
            <div class="col-md-6 text-right">
                <label for="update"><b>Update Image</b></label>
            </div>
            <div class="col-md-6 text-left" style="padding-top:15px;">
                <input type="file" placeholder="Image" name="filetoupload" id="filetoupload">
            </div> 
            <div class="col-md-6 text-right">
                <label for="fname"><b>Current Image</b></label>
            </div>
            <div class="col-md-6 text-align-left" style="padding-top:15px;">
                <?php echo "<img src=".$row["foto"]." width='300' height='300' style='display: block;'>" ?>
            </div> 
            <div class="container" style="text-align:center; padding-top:10px">
                <input type="submit" value="Update" name="additembutton" style="background-color: #a4141c; color: white; padding: 14px 20px;"></button>
                <a href="admin.php" class="button input" style="background-color: #a4141c; color: white; padding: 14px 20px;">Cancel</a>
            </div>
        </div>
    </form>
</div>
</div>
<footer class="-bg-footer" id="footer">
        <div class="container-fluid">
            <div class="row footer-align">
                <div class="col-md-4 col-sm-4">
                    <h5>UMN</h5>
                    <hr class="hr-foot">
                    <div class="footer-items">
                        <p class="footer">
                            Is a university that was founded in 2006 with a definitive campus located in Kelapa Dua Summarecon Serpong, Tangerang Regency. <br>
			<br>The university was inaugurated on 20 November 2006. The educational focus is in the field of information and communication technology (ICT). The university was founded by the Kompas Gramedia Group.
                        </p>
                        <ul class="social-networks">
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <h5>Our contact</h5>
                    <hr class="hr-foot">
                    <div class="footer-items">
                        <address>
                                Jl. Boulevard Gading Serpong
                                <br>
                                Tangerang, Banten
                                <br>
                                Indonesia
                                <br>
                                <i class="fa fa-phone address"></i> 62+ 813 422 554
                                <br>
                                <i class="fa fa-fax address"></i> 62+ 813 422 554
                                <br>
                                <i class="fa fa-envelope address"></i> info@chanteclaire.com</a>
                        </address>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <h5>Open hours</h5>
                    <hr class="hr-foot">
                    <div class="footer-items">
                        <ul>
                            <li>Mon-Fri: 08:00-22:00</li>
                            <li>Sat    : 09:00-22:00</li>
                            <li>Sun    : Closed</li> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <a class="to-top" href="#myPage" title="toTop">
            <i class="fa fa-chevron-up"></i>
        </a>
    </footer>   
    <script src="script.js"></script>
    <script src="cart.js"></script>
</body>
</html>

