<?php
	session_start();
	include ("db/include.php");

?>
<!DOCTYPE html>
<head>
<title>admin login</title>
</head>

<body>
	 
     <?php
	 if(array_key_exists ('login', $_POST)) {
		 $error = array ();
		 
		 if(empty ($_POST['username'])) {
			 $error[] = "Enter your username";
			 } else {$username = mysqli_real_escape_string ($db, $_POST ['username']);
			 }
			 
			 if(empty ($_POST ['password'])) {
				 $error[] = "Enter your password";
				 } else { $password = mysqli_real_escape_string ($db, $_POST ['password']);
				 }
				 
				 if(empty ($error)) {
					$query = mysqli_query ($db, "SELECT * FROM admin WHERE username = '".$username."' AND 
											password = '".$password."'") or die (mysqli_error ());
											
				if(mysqli_num_rows($query) == 1 ){
				
				while ($row = mysqli_fetch_array ($query)) {
					
					$_SESSION['id'] = $row ['admin_id'];
					$_SESSION['username'] = $row['username'];
					header ("Location:home.php");
					}
				}else {
					 $wrong = "Invalid Username and password";
					 header ("Location:login.php?wrong=$wrong");
					 }
				 
				 } else{
					  foreach($error as $error){
						  echo $error;
					  }
				 }
		 }
	 
	 if(isset ($_GET['wrong'])) {
		 $err = $_GET['wrong']; 
		 
		 echo $err;
		 }
	 
	 ?>



	<form action="" method="post">
    
    <p> Username : <input type="text" name="username" /></p>
    
    <p> Password : <input type="password" name="password" /></p>
    
    <input type="submit" name="login" value="Login" />
    </form>
</body>
</html>