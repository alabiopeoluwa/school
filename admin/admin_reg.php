<?php
	include("db/include.php");
	session_start();

?>



<!DOCTYPE html>
<head>

<title>Add Admin Staff</title>
</head>

<body>

	<?php
	if(array_key_exists('submit', $_POST)){
			$error = array();
			
			if(empty($_POST['username'])){
				$error[] = "Enter UserName";
				}else{
					$username = mysqli_real_escape_string($db, $_POST['username']);
					}
			if(empty($_POST['password'])){
				$error[] = "Enter your Password";
				}else{
					$pword = mysqli_real_escape_string($db, $_POST['password']);
					}
	if(empty($error)){
				
							
				$insert = mysqli_query($db, "INSERT INTO admin VALUES(NULL,
																	'".$username."',
																	'".$pword."'
																	)") or die(mysqli_error());
			$success = "Admin Registration successful";
			header("Location:admin_reg.php?success=$success");
				
				} else{
					foreach($error as $error){
						echo $error.'<br/>';
						}
					}}
			if (isset($_GET['success'])){
			$success_1 = $_GET['success'];
			echo '<p>'.$success_1.'</p>';
			}
	
	?>

	<form action="" method="post">
<p>Username: <input type="text" name="username"/></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<p>Password: <input type="password" name="password"/></p>
<input type="submit" name="submit" value="SUBMIT"/>
</form>
</body>
</html>