<?php

 include("db/include.php");
 session_start();
 $a_id = $_SESSION ['id'];
$username = $_SESSION['username'];

 
 $subject = array("English", "Mathematics", "Biology", "Chemistry", "Physics", "F-Maths", "Geography", "Economics", "Account", "Commerce", "Govenment", "Yoruba", "Engilsh Literature", "Agric Sci", "Information Technogy");
 
 $discipline = array("Micro Biology", "Chemistry", "Math and Statistics", "Accounting", "Economics", "Computer sci", "English Language");
 
 $qualification = array("BSc", "NCE", "MSc", "Phd");
 


?>

<!DOCTYPE html>
<head>
<title>Add academic staff</title>
<link href="style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id="container">
	<div id="header"><br>
<h1> GLO INTERNATIONAL SCHOOL </h1>
	</div>
    <div id="centre"><br>
<h3> Academic Staff Registration</h3><br/>
<?php  echo 'Admin Name: <strong>'.$username.'</strong>';?>
</div>
    <div id="nav"><br>
    <a href="home.php">Home</a>
    <a href="academic.php">Academic Staff</a>
	<a href="non_academic.php">Non Academic Staff</a>
    </div>
<?php
		if(array_key_exists('submit', $_POST)){
			$error = array();
			
			if(empty($_POST['firstname'])){
				$error[] = "Enter first name";
				}else{
					$fname = mysqli_real_escape_string($db, $_POST['firstname']);
					}
			if(empty($_POST['lastname'])){
				$error[] = "Enter last name";
				}else{
					$lname = mysqli_real_escape_string($db, $_POST['lastname']);
					}
			if(empty($_POST['sex'])){
				$error[] = "Select Gender";
				}else{
					$sex = mysqli_real_escape_string($db, $_POST['sex']);
					}
			if(empty($_POST['email'])){
				$error[] = "Enter your email address";
				}else{
					$email = mysqli_real_escape_string($db, $_POST['email']);
					}
			if(empty($_POST['phone'])){
				$error[] = "Enter phone number";
				}else{
					$phone = mysqli_real_escape_string($db, $_POST['phone']);
					}
			if(empty($_POST['address'])){
				$error[] = "Enter Address";
				}else{
					$address = mysqli_real_escape_string($db, $_POST['address']);
					}
			if(empty($_POST['status'])){
				$error[] = "Select Marital";
				}else{
					$status = mysqli_real_escape_string($db, $_POST['status']);
					}
			if(empty($_POST['date'])){
				$error[] = "Enter date of appointment";
				}else{
					$date = mysqli_real_escape_string($db, $_POST['date']);
					}
			if(empty($_POST['discipline'])){
				$error[] = "Select staff discipline";
				}else{
					$discip = mysqli_real_escape_string($db, $_POST['discipline']);
					}
			if(empty($_POST['qualification'])){
				$error[] = "Select qualification";
				}else{
					$qual = mysqli_real_escape_string($db, $_POST['qualification']);
					}
			if(empty($_POST['subject'])){
				$error[] = "Select subject taken";
				}else{
					$subj = mysqli_real_escape_string($db, $_POST['subject']);
					}
			if(empty($_POST['password'])){
				$error[] = "Enter password";
				}else{
					$pword = mysqli_real_escape_string ($db, $_POST['password']);
					}
			if(empty($error)){
				
							
				$insert = mysqli_query($db, "INSERT INTO academic_staff VALUES
																			(NULL,
																			'".$fname."',
																			'".$lname."',
																			'".$sex."',
																			'".$email."',
																			'".$phone."',
																			'".$address."',
																			'".$status."',
																			'".$date."',
																			'".$discip."',
																			'".$qual."',
																			'".$subj."',
																			'".$pword."')") or die(mysqli_error());
			$success = "Registration successful";
			header("Location:academic.php?success=$success");
				
				} else{
					foreach($error as $error){
						echo $error.'<br/>';
						}
					}
			}
		
		if (isset($_GET['success'])){
			$succed = $_GET['success'];
			echo "<p> &nbsp; &nbsp; ".$succed; "</p>";
			}
?>
<div id="content">
<form action="" method="post">
<p>Firstname: <input type="text" name="firstname"/></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<p>Lastname: <input type="text" name="lastname"/></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<p>Gender: Male: <input type="radio" name="sex" value="Male"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Female: <input type="radio" name="sex" value="Female"/></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<p>Email: <input type="text" name="email"/></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<p>Phone Number: <input type="text" name="phone"/></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<p>Address: <textarea name="address"></textarea></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<p>Marital Status: Single: <input type="radio" name="status" value="Single"/>
					Married: <input type="radio" name="status" value="Married"/></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<p>Date of Appointment: <input type="date" name="date" value="YYYY-MM-DD"/></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<p>Discipline: <select name="discipline">
			<option value="">Select</option>
            <?php foreach($discipline as $discipline){ ?>
            <option value="<?php echo $discipline ?>"><?php echo $discipline?>
            </option>
            <?php } ?>
            </select></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
 <p>Qualification: <select name="qualification">
			<option value="">Select</option>
            <?php foreach($qualification as $qualify){ ?>
            <option value="<?php echo $qualify ?>"><?php echo $qualify?>
            </option>
            <?php } ?>
            </select></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               
<p>Subject taken:<select name="subject">
				<option value="">Select</option>
            <?php foreach($subject as $subject){ ?>
            <option value="<?php echo $subject ?>"><?php echo $subject?>
            </option>
            <?php } ?>
            </select></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
<p>Password: <input type="password" name="password"/></p>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= "submit" name="submit" value="SUBMIT" />
</form>
</div>
	<div id="footer">
	<a href="logout.php">Logout</a>
	</div>
</div>
</body>
</html>