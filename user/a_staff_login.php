<?php
	
	include("db/include.php");
	session_start();

?>




<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Academic staff login</title>
<link href="style_1.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id="container">
	<div id="header"><br>
	<h1> GLO INTERNATIONAL SCHOOL </h1>
     </div>
     <div id="centre">
     <br/><h3>Academic Staff LOGIN Page</h3>
     </div>

<?php
	
	if(array_key_exists('login', $_POST)){
		$error = array();
		
		if(empty($_POST['lname'])){
			$error[] = "Enter your last name<br/>"; 
			}else{
				$lastname = mysqli_real_escape_string($db, $_POST['lname']);
				}
		if(empty($_POST['password'])){
			$error[] = "Enter your Password";
			}else{
				$password = mysqli_real_escape_string($db, $_POST['password']);
				}
		if(empty($error)){
			$select = mysqli_query ($db, "SELECT * FROM academic_staff WHERE lastname = '".$lastname."' AND password = '".$password."'") or die(mysqli_error());
		if(mysqli_num_rows($select) == 1 ){
					
					while($row = mysqli_fetch_array($select)){
						
						$_SESSION['name'] = $row['lastname'];
						header("Location:a_home.php");
				}
				
					}else{
						$failure = "Invalid login name and password";
						header("Location:a_staff_login.php?failure=$failure");
						}
							
				}else{
					  foreach($error as $error){
						  echo $error;	
					  }
				}
			}
	if(isset($_GET['failure'])){
		$fail = $_GET['failure'];
		echo '<p>'.$fail.'</p>';
	}
?>
<div id="content">
<form action="" method="post">

	<br/><h3 class="form1">&nbsp;Last Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="lname" /></h3><br/>
    <h3 class="form1">&nbsp;Password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password" /></h3>
    
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="login" value="LOGIN" />


</form>
</div>

</div>
</body>
</html>