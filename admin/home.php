<?php
session_start ();
include("db/include.php");

$a_id = $_SESSION ['id'];
$username = $_SESSION['username'];

?>



<!DOCTYPE html>
<head>
<title>Glo intl-home</title>
<link href="style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id="container">
	<div id="header"><br>
	<h1> GLO INTERNATIONAL SCHOOL </h1>
     </div>
     <div id="centre"><br>
	<p> WELCOME <?php  echo '<strong>'.$username.'</strong>';?></p>
	</div>
    <div id="nav"><br>
    <a href="home.php">Home</a>
    <a href="academic.php">Academic Staff</a>
	<a href="non_academic.php">Non Academic Staff</a>
    </div>
    <div id="content">
    </div>
    <div id="footer">
	<a href="logout.php">Logout</a>
	</div>
    
</div>    
</body>
</html>