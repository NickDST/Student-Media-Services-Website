<?php include 'hubheader.php';

if ( !isset( $_SESSION[ 'is_leadership' ] ) ) {
	header( 'Location: hub.php' );
	exit;
}
$studentid = mysqli_real_escape_string( $connection, $_GET[ 'id' ] );
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Search Project</title>
</head>

<body>
	
		   <div class="col-xl-4" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Search for a Project</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
						
						<label for="">Student Details</label>
						<br>
						
						<form method="POST">
						<button type="submit" name="modify" class = 'btn btn-success'>Modify Student Details</button>
						</form>
						
						<?php 
						
						if(isset($_POST['modify']) & !empty(isset($_POST['modify']))){
							
								echo "<script>window.location.href =  'modifystudentinfo.php?id=" . $studentid . "';</script>;";

							}

						?>
						
						<br>

                    </div>
                </div>
                <!-- /# card -->
            </div>

	


	
	
	

	
	      <div class="col-xl-8" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Student Details</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px; padding-right:20px;">
						
					
						
							<?php
								$name = mysqli_real_escape_string( $connection, $_GET[ 'name' ] );
								//$studentid = mysqli_real_escape_string( $connection, $_GET[ 'id' ] );
								//	echo $projectid;
								$sql = "SELECT * from students where studentid = '$studentid'";
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										
										
										
										?>

								<h2>
									<?php echo "Student Name: ". $row['name'];?>
								</h2>
						<br>
								<h5>
									<?php echo "Position: ". $row['position'];?>
								</h5>
						<hr>
								
								
								

								<?php  } ?>
						<h3>Projects the student is involved in:</h3>
						
						<?php
								

									
								$sql = "SELECT project_list.*, students_in_projects.*, students.* FROM project_list, students_in_projects, students WHERE project_list.projectid = students_in_projects.projectid AND students.studentid = students_in_projects.studentid AND students.studentid = '$studentid'";
									
									//echo $sql;
								$result = mysqli_query( $connection, $sql );
									
								$queryResults = mysqli_num_rows( $result );
								
									if ($queryResults == 0) {
										echo "Student is not involved in any projects yet.";
									}

								while ( $projects = $result->fetch_assoc() ):	?>


								<?php echo $projects['project_name']. "<br>";?> 
								<?php echo $projects['service_hours']. " Hours<br>";?> 
								<?php echo $projects['role'].". <br>";?>
								<br>
						
								<?php
								endwhile;
									
								} ?>
						<br>
						<hr>
						
						
						
						<h3>SIGs the student is involved in:</h3>
						<br>
						
						<?php					
								$sql = "SELECT sigs.*, students_in_sigs.*, students.* FROM sigs, students_in_sigs, students WHERE sigs.sig_name = students_in_sigs.sig_name AND students.studentid = students_in_sigs.studentid AND students.studentid = '$studentid'";
									
									//echo $sql;
								$result = mysqli_query( $connection, $sql );
									
								$queryResults = mysqli_num_rows( $result );
								
									if ($queryResults == 0) {
										echo "Student is not involved in any SIGs yet.";
									}

								while ( $projects = $result->fetch_assoc() ):	?>


								<?php echo $projects['sig_name']. "<br>";?> 
								<?php echo $projects['sig_position']. "<br>";?> 
								
								<br>
						
								<?php
								endwhile;
									
						?>
						
						<hr>
						
						
						
						
						
						
					
						<h3>Certified EQ to use:</h3>
						<br>
						
						<?php
								

									
								//$sql = "SELECT project_list.*, eq_in_projects.*, eqcatalog.* FROM project_list, eq_in_projects, eqcatalog WHERE project_list.projectid = eq_in_projects.projectid AND project_list.projectid = '$projectid'";
						$sql = "SELECT students_in_eq.*, eqcatalog.* FROM students_in_eq, eqcatalog WHERE students_in_eq.eq_id = eqcatalog.eq_id AND students_in_eq.studentid = '$studentid'";
									
									//echo $sql;
								$result = mysqli_query( $connection, $sql );
						
						$queryResults = mysqli_num_rows( $result );
								
									if ($queryResults == 0) {
										echo "Student is not certified in any equipment.";
									}
								

								while ( $eq_in_projects = $result->fetch_assoc() ):	
									?>
									
										

								<?php echo $eq_in_projects['eq_name'];?> 
								
								<br>
					
								<?php
								endwhile;
									
							 ?>
						
						<br>
				
                        
                    </div>
                </div>
                <!-- /# card -->
            </div>
	
		

	

	
	
</body>
</html>