<?php
	include("db/include.php");
	session_start();
	include "view_function.php";

 //$name2 = $_SESSION['name2'];
 //$class2 = $_SESSION['class2'];



?>


<!DOCTYPE html>
<head>
<title>View Result</title>
<link href="style_1.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id="container">
	<div id="header"><br>
	<h1> GLO INTERNATIONAL SCHOOL </h1>
     </div>



<?php
	//echo '<p>Student Name:'.$name2.'</p>';
	//echo '<p>Class:'.$class2.'</p>';

?>

<?php
	
		if(array_key_exists('add', $_POST)){
			$error = array();
			
			if(empty($_POST['reg_num'])){
				$error[] = "Enter Student's Registration Number";
				}
			else{
				$reg_num_1 = mysqli_real_escape_string($db, $_POST['reg_num']);
				}
			if (empty($error)){
				$query = mysqli_query($db, "SELECT * FROM student WHERE reg_number = '".$reg_num_1."'") or die (mysqli_error());
				
				if(mysqli_num_rows($query) == 1){
					
					$select = mysqli_query($db, "SELECT * FROM student_result WHERE reg_number = '".$reg_num_1."'") or die (mysqli_error()); 
					
					?>
				<?php
					}else{
					$invalid = "Invalid registration number";
					header("Location:add_result.php?invalid=$invalid");
					}
				
				}else{foreach($error as $error){
					 echo '<div id="nav"> <p>'.$error.'</p> </div>';
					}
				}
			}
	if(isset($_GET['invalid'])){
		$n_valid = $_GET['invalid'];
		echo '<p>'.$n_valid.'</p>';
		}
	
	?>
 <div id="content">
<form action="" method="post"><br/>

	<p class="form1">Registration Number: <input type="text" name="reg_num" /></p><br/>
    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="add" value="View Result" />
 

</form>
</div>
 
	<div id="centre1">				
                     <table border = 3 cellspacing="7px" width="5px">
    
    <tr>
    
    <th>S/N</th><th>Full Name</th><th>Subject</th><th>Score</th><th>Grade</th>
    </tr>
    
    <tr>
			
           <?php
  $showschool = showSchoolReport($select);
  echo $showschool;

  ?>
    
                        
            
            </tr>
            <?php //$_SESSION['name2'] = $result['fullname']; ?>
            </table>
	</div>
					
    
    
                













            
	
	
    
    
    
</div>

</body>
</html>