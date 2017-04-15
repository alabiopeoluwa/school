<?php

	include("db/include.php");
	session_start();


?>
<!DOCTYPE html>
<head>
<title>Non academic staff login</title>
<link href="style_1.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id="container">
	<div id="header"><br>
	<h1> GLO INTERNATIONAL SCHOOL </h1>
     </div>
     <div id="centre"><br/>
     <h3>Non-Academic Staff LOGIN Page</h3>
     </div>
<?php
		if (array_key_exists('login', $_POST)){
			$error = array();
			
			if(empty($_POST['lname'])){
				$error[] = "Enter your Last Name <br/>";
				}else { $lname = mysqli_real_escape_string($db, $_POST['lname']);
					}
			if(empty($_POST['password'])){
				$error[] = "Enter your password";
				}else{
					$password = mysqli_real_escape_string($db, $_POST['password']);
					}
			if(empty($error)){
				
				$select = mysqli_query($db, "SELECT * FROM non_academic_staff WHERE lastname = '".$lname."' 
									AND password = '".$password."'") or die(mysqli_error());
									
				if(mysqli_num_rows($select)){
					
					while($row = mysqli_fetch_array($select)){
						
						$_SESSION['n_name'] = $row['lastname'];
						header("Location:n_home.php");
						}
					}else{
						$failed = "Invalid login name and password";
						header("Location:n_staff_login.php?failed=$failed");
						}
							
				}else{
					  foreach($error as $error){
						  echo $error;
					  }
					  }
			}
	if(isset($_GET['failed'])){
		$fail = $_GET['failed'];
		echo '<p>'.$fail.'</p>';
		}
?>
<div id="content">
<form action="" method="post">
<br/>
	<h3 class="form1">&nbsp;Last Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="lname" /></h3><br/>
    <h3 class="form1">&nbsp;Password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password" /></h3>
    
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="login" value="LOGIN" />


</form>
</div>
</div>

</body>
</html>