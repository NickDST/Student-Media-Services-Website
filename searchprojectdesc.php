<?php include 'hubheader.php'?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Search Project</title>
</head>

<body>
	
	
	

	
	
	
	
	      <div class="col-xl-8" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Project Details</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
						
					<br>
						
							<?php
								$name = mysqli_real_escape_string( $connection, $_GET[ 'name' ] );
								$projectid = mysqli_real_escape_string( $connection, $_GET[ 'id' ] );
								//	echo $projectid;
								$sql = "SELECT project_list.*, students.* FROM project_list, students WHERE project_list.project_name = '$name' AND project_list.projectid = '$projectid' AND students.studentid = project_list.student_rep ";
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										$student_rep = $row['student_rep'];
										
										?>

								<h2>
									<?php echo "Project Name: ". $row['project_name'];?>
								</h2>
								<h5>
									<?php echo "Description: ". $row['description'];?>
								</h5>
						<hr>
								
								<h5>
									<?php echo "Procedure: ". $row['procedure_outline'];?>
								</h5>
								<br>
								<h5>
									<?php echo "Goal: ". $row['requestee_goal'];?>
								</h5>
								<hr>
						
								<h5>
									<?php echo "Student Responsible: ". $row['name'];?>
									
								</h5>
								<br>
						
								
								<h5>
									<?php echo "Datetime Start: ". $row['datetime_start'];?>
								</h5>
								<br>
								<h5>
									<?php echo "Datetime End: ". $row['datetime_end'];?>
								</h5>
								<br>
								<h5>
									<?php echo "Project ID: ". $row['projectid'];?>
								</h5>
								<br>
								<h5>
									<?php echo "Requestee: ". $row['requestee_name'];?>
								</h5>
								<br>
								
								<h5>
									<?php echo "Requestee Contact: ". $row['requestee_contact'];?>
								</h5>
						
								<br>
								<hr>
								

								<?php  } ?>
						<h3>People in this project:</h3>
						
						<?php
								

									
								$sql = "SELECT project_list.*, students_in_projects.* FROM project_list, students_in_projects WHERE project_list.projectid = students_in_projects.projectid AND project_list.projectid = '$projectid'";
									
									//echo $sql;
								$result = mysqli_query( $connection, $sql );
								

								while ( $studentid = $result->fetch_assoc() ):	
									$studentnamesql = "SELECT name FROM students WHERE studentid = {$studentid['studentid']}";
									
										$studentnameresult = mysqli_query( $connection, $studentnamesql );
										while ( $studentname2 = $studentnameresult->fetch_assoc() ):
										echo $studentname2[ 'name' ];
									
								endwhile;?> |

								<?php echo $studentid['service_hours'];?> <span>hours - </span>
								<?php echo $studentid['role'].",";?>
								<br>
						
								<?php
								endwhile;
									
							} ?>
						<br>
						<hr>
					
						<h3>Equipment Used:</h3>
						
						<?php
								

									
								$sql = "SELECT project_list.*, students_in_projects.* FROM project_list, students_in_projects WHERE project_list.projectid = students_in_projects.projectid AND project_list.projectid = '$projectid'";
									
									//echo $sql;
								$result = mysqli_query( $connection, $sql );
								

								while ( $studentid = $result->fetch_assoc() ):	
									$studentnamesql = "SELECT name FROM students WHERE studentid = {$studentid['studentid']}";
									
										$studentnameresult = mysqli_query( $connection, $studentnamesql );
										while ( $studentname2 = $studentnameresult->fetch_assoc() ):
										echo $studentname2[ 'name' ];
									
								endwhile;?> |

								<?php echo $studentid['service_hours'];?> <span>hours - </span>
								<?php echo $studentid['role'].",";?>
								<br>
						<br>
								<?php
								endwhile;
									
							 ?>
						
						
						
						
                        
                    </div>
                </div>
                <!-- /# card -->
            </div>


	
	
	
	   <div class="col-xl-4" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Search for a Project</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
						
						<label for="">Add students to projects</label>
						<a class = 'btn btn-success' href = 'addselfproject2.php?name=" . $row[ 'project_name' ] . "&id=" . $row[ 'projectid' ] . "'>I'm also in this project!</a>
				<hr>
						<label for="">Modify Project Details</label>
						<br>
						
						<form method="POST">
						<button type="submit" name="modify" class = 'btn btn-success'>Modify Details</button>
						</form>
						
						<?php 
						
						if(isset($_POST['modify']) & !empty(isset($_POST['modify']))){
							if($student_rep == $id) {
								echo "yay";
								
							} else {
								
								echo "sorry only the student responsible of this project or the SMS leadership team can modify";
							}

						}
						
						
						?>
						
<!--						<a class = 'btn btn-success' href = 'addselfproject2.php?name=" . $row[ 'project_name' ] . "&id=" . $row[ 'projectid' ] . "'>Modify Details</a>-->
				<hr>
						<label for="">Add Equipment</label>
						<br>
						<a class = 'btn btn-success' href = 'addselfproject2.php?name=" . $row[ 'project_name' ] . "&id=" . $row[ 'projectid' ] . "'>Document Equipment</a>
				<hr>
	
	
						
						<br>
	
	      
                    </div>
                </div>
                <!-- /# card -->
            </div>

	
	
	
</body>
</html>