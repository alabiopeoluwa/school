<?php
	
	include("db/include.php");
	session_start();



?>
<!DOCTYPE html>
<head>
<title>add result</title>
</head>

<body>

	<?php
	
		if(array_key_exists('add', $_POST)){
			$error = array();
			
			if(empty($_POST['reg_num'])){
				$error[] = "enter student registration number";
				}
			else{
				$reg_num = mysqli_real_escape_string($db, $_POST['reg_num']);
				}
			if (empty($error)){
				$query = mysqli_query($db, "SELECT * FROM student WHERE reg_number = '".$reg_num."'") or die (mysqli_error());
				
				if(mysqli_num_rows($query) == 1){
					
					while($detail = mysqli_fetch_array($query)){
						
						$_SESSION['name1'] = $detail['firstname'].' '.$detail['lastname'];
						$_SESSION['class'] = $detail['class'];
						$_SESSION['reg_num'] = $detail['reg_number'];
						header("Location:assessment.php");
										
					}
					
				}else{
					$invalid = "Invalid registration number";
					header("Location:add_result.php?invalid=$invalid");
					}
				
				}else{foreach($error as $error){
					echo '<p>'.$error.'</p>';
					}
				}
			}
	if(isset($_GET['invalid'])){
		$n_valid = $_GET['invalid'];
		echo '<p>'.$n_valid.'</p>';
		}
	
	?>

<form action="" method="post">

	<p>Registration Number : &nbsp;<input type="text" name="reg_num" /></p>
    
    <input type="submit" name="add" value="Add RESULT" />
 

</form>


</body>
</html>