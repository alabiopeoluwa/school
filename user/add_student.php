
<?php
	
 include("db/include.php");
 session_start();
 $n_name = $_SESSION['n_name'];
$class = array ("JSS1", "JSS2", "JSS3", "SSS1", "SSS2", "SSS3"); 
$age =range(10, 18);
?>

<!DOCTYPE html>
<head>
<title>Add Student</title>
<link href="style_1.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id="container">
	<div id="header"><br>
	<h1> GLO INTERNATIONAL SCHOOL </h1>
     </div>
     <div id="nav"><br>
<a href="n_home.php">Home</a>
<a href="add_student.php">Register Student</a>
<a href="view_r.php">View Student report</a>
</div>
     <div id="centre">
     <?php

	echo "<p><br/> Dear ".$n_name.", You can now proceed to Fill in the Student's Data</p>";

	?>
     </div>

	<?php
	if(array_key_exists ('submit', ($_POST))) {
		$error = array();
	
	if(empty ($_POST['fname'])) {
		$error[] = "Enter Firstname";
		} else {$fname = mysqli_real_escape_string ($db, $_POST['fname']);
		}
		
		if(empty ($_POST['lname'])) {
			$error[] = "Enter Lastname";
			} else {$lname = mysqli_real_escape_string ($db, $_POST['lname']);
			}
			
			if(empty ($_POST['sex'])) {
				$error[] = "Select Gender";
				} else {$sex = mysqli_real_escape_string ($db, $_POST ['sex']);
				}
				
			if (empty ($_POST ['age'])) {
				$error[] = "Enter Age";
				} else { $age = mysqli_real_escape_string ($db, $_POST ['age']);
				}
				
			if (empty ($_POST['religion'])) {
				$error[] = "Select Religion";
				} else {$religion = mysqli_real_escape_string ($db, $_POST['religion']);
				}
				
			if(empty ($_POST['class'])) {
				$error[] ="Enter class";
				} else {$class1 = mysqli_real_escape_string ($db, $_POST['class']);
				}
				
						
			if(empty ($_POST['pname'])) {
				$error[] ="Enter parents number";
				} else {$pname = mysqli_real_escape_string ($db, $_POST['pname']);
				}
				
						
			if(empty ($_POST['pphone'])) {
				$error[] ="Enter parents phone number";
				} else {$ppnum = mysqli_real_escape_string ($db, $_POST['pphone']);
				}
			
		
	if(empty($error)){
				
							
				$insert = mysqli_query($db, "INSERT INTO student VALUES
																			(NULL,
																			'".$fname."',
																			'".$lname."',
																			'".$age."',
																			 '".$sex."',											 
																			 '".$class1."',
																			 '".$religion."',
																			 '".rand(1000000000, 9999999999)."',
																			 '".$pname."',
																			 '".$ppnum."')") or die(mysqli_error($db));
																			 
			$success = " Student's Registration Successful";
			header("Location:add_student.php?success=$success");
				
				}else{
					foreach($error as $error){
						echo $error.'<br/>';
						}
					}
	}
		
		if (isset($_GET['success'])){
			$succed = $_GET['success'];
			echo '<p>'.$succed.'</p>';
			}
	
	
?>
<div id="content">

<form action="" method="post"/><br/>
	
<h3 class="form1">Firstname: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="fname"/></h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<h3 class="form1">Lastname: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="lname"/></h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<h3 class="form1">Age: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="age">
		<option value="">Select</option>
        <?php foreach ($age as $age){?>
        <option value="<?php echo $age?>"><?php echo $age?></option>
       <?php } ?>
       </select>
       </h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <h3 class="form1"> Gender: 
 		
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	Male <input type="radio" name="sex"  value="M" />  
            Female <input type="radio" name="sex" value="F" />
            </h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <h3 class="form1"> Class: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="class">
 			<option value="">Select</option>
            <?php foreach ($class as $class){?>
            <option value="<?php echo $class ?>"><?php echo $class ?> </option>
            <?php }?>
            </select>
          </h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<h3 class="form1">Religion:

			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Christainity <input type="radio" name="religion" value="Christainity" />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Islam <input type="radio" name="religion" value="Islam" /> </h3>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
 <h3 class="form1"> Parents name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="pname" /></h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <h3 class="form1"> Parents Phone Number: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="pphone" /></h3><br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="submit" name="submit" value="SUBMIT" />         
			   
        



</form>
</div>
	<div id="footer">
	<a href="logout_n.php">Logout</a>
	</div>
</div>
</body>
</html>