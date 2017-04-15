
<?php
 include("db/include.php");
 session_start();
 
 $sub1 = array("Mathematics", "English", "Physics", "Chemistry", "Biology", "F_maths", "Commerce", "Account", "Government", "Literature", "Economics", "Geograpy", "Agricultural Science");

$grade1 = array("A", "B", "C", "D", "E", "F");

$score1 = range(1, 100);


$name1 = $_SESSION['name1'];
 $class = $_SESSION['class']; 
 $reg_num = $_SESSION['reg_num']
 



?>

<!DOCTYPE html>
<head>
<title>Assessment</title>
<link href="style_1.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id="container">
	<div id="header"><br>
	<h1> GLO INTERNATIONAL SCHOOL </h1>
     </div>  <hr/>
<div id="centre"> <br/>
<?php
 echo '<p>Student Name:'.$name1.'</p>';
 echo '<p>Class:'.$class.'</p>';

?>
</div>
<div id="nav"><br/>
<a href="a_home.php">Home</a>
<a href="assessment.php">Add Result</a>
<a href="view_r.php">View Student report</a>
</div>

	<?php
	
		if (array_key_exists('save', $_POST)){
			$error = array();
			
			if(empty($_POST['subject1'])){
				
				$error[] = "Please make sure you select a subject";
				}else {
					$subject1 = mysqli_real_escape_string($db, $_POST['subject1']);
					}
			if (empty($_POST['score1'])){
				$error[] = "Please make sure you select a score";
				}else {
					$score_a = mysqli_real_escape_string($db, $_POST['score1']);
					}
			if (empty($_POST['grade1'])){
				$error[] = "Please make sure you select appropriate grade";
				}else {
					$grade_a = mysqli_real_escape_string($db, $_POST['grade1']);
					}
				if (empty($_POST['remark'])){
				$error[] = "Enter Remark";
				}else {
					$remark = mysqli_real_escape_string($db, $_POST['remark']);
					}
			if(empty($error)){
				$query = mysqli_query($db, "INSERT INTO student_result VALUES
																		(NULL,
																		'".$name1."',
																		'".$subject1."',
																		'".$score_a."',
																		'".$grade_a."',
																		'".$reg_num."',																		
																		'".$remark."')") or die (mysqli_error($db));
				
																		
																		
				$success = "Successfully Added";
				header("Location:assessment.php?success=$success");
				
				
								}else{
					foreach($error as $error){
						echo $error.'<br/>';
						}
								}

					
			}
	if (isset($_GET['success'])){
		$success1 = $_GET['success'];
		echo '<p>'.$success1.'</p>';
		}
	
	
	?>
	<div id="content">
	<form action="" method="post"><br/>
    
    	<h3 class="form1">Subject: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="subject1">
        			<option value="">Select Subject</option>
                    <?php foreach($sub1 as $sub1) {?>
                    <option value="<?php echo $sub1 ?>"><?php echo $sub1 ?>
                    </option>
                    <?php } ?>
                    </select><br/>
        Score: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="score1">
        			<option value="">Select score</option>
                    <?php foreach($score1 as $score1) {?>
                    <option value="<?php echo $score1 ?>"><?php echo $score1 ?>
                    </option>
                    <?php } ?>
                    </select><br/>
         Grade: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="grade1">
        			<option value="">Select score</option>
                    <?php foreach($grade1 as $grade1) {?>
                    <option value="<?php echo $grade1 ?>"><?php echo $grade1 ?>
                    </option>
                    <?php } ?>
                    </select></h3><br/>
                    
          <h3 class="form1">Teacher's Remark: <input type="text" name="remark" /></h3><br/>
          
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="save" value="SAVE" />
            
                  
   </form>
   </div>
    <div id="footer">
<a href="logout.php">Logout</a>
	</div>

</div>
</body>
</html>