
<?php
 
 include("db/include.php");
 session_start();
 $n_name = $_SESSION['n_name'];
 
?>

<!DOCTYPE html>
<head>
<title>non academic staff</title>
<link href="style_1.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id="container">
	<div id="header"><br>
	<h1> GLO INTERNATIONAL SCHOOL </h1>
     </div>
     <div id="centre">
     <?php

	echo "<p><br/> Welcome ".$n_name.", You can now proceed to Register new Student / View Student's Report</p>";

	?>
     </div>
     <div id="nav"><br/>
<a href="n_home.php">Home</a>
<a href="add_student.php">Register Student</a>
<a href="view_r.php">View Report</a>
</div>
<div id="content">
    </div>
    <div id="footer">
<a href="logout_n.php">Logout</a>
	</div>

</div>
</body>
</html>