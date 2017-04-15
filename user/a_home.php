<?php
	include("db/include.php");
	session_start();
	$name = $_SESSION['name'];


?>

<!DOCTYPE html>
<head>
<title>Academic Staff - Home</title>
<link href="style_1.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id="container">
	<div id="header"><br>
	<h1> GLO INTERNATIONAL SCHOOL </h1>
     </div>
     <div id="centre">
     <?php

	echo '<p><br/> Welcome '.$name.', You can now proceed to Add/View Result</p>';

	?>
     </div>
    <div id="nav"><br/>
<a href="a_home.php">Home</a>
<a href="add_result.php">Add Result</a>
<a href="view_r.php">View Report</a>
</div>
    <div id="content">
    </div>
    <div id="footer">
<a href="logout.php">Logout</a>
</div>
    
</div>
<hr/>





</body>
</html>