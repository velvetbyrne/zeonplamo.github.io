<?php
session_start();
$_SESSION['loginstatus'] = 'logout';

header("location: index.php");
exit;
?>