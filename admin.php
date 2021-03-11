<!DOCTYPE html>
<html lang="en">

<head>  
  <title>Test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="home.php">Home</a></li>
      <li><a href="#">Contact Us</a></li>
      <li class="active"><a href="#">Admin</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="login.php">Login</a></li>
    </ul>
  </div>
</nav>

<main>
    <table id="students" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Harga (Rupiah)</th>
                <th>Foto</th>
            </tr>
        </thead>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "uts_pemweb";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT nama, tipe, harga, foto FROM food";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>"."<td>". $row["nama"]. "</td>"."<td>". $row["tipe"]. "</td>"."<td>" .$row["harga"] . "</td>"."<td>" .$row["foto"] . "</td>"."</tr>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>

    </article>
  </main>
  <script src="./Fixed top navbar example for Bootstrap_files/jquery-3.2.1.slim.min.js.download" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
  <script src="./Fixed top navbar example for Bootstrap_files/popper.min.js.download"></script>
  <script src="./Fixed top navbar example for Bootstrap_files/bootstrap.min.js.download"></script>

</body>
</html>