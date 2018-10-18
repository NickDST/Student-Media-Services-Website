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
                    <div class="" style = "padding-left:20px; padding-top:10px; padding-right:20px;">
						
					
						
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
										$project_name = $row['project_name'];
										$project_id = $row['projectid'];
										
										
										?>

								<h2>
									<?php echo "Project Name: ". $row['project_name'];?>
								</h2>
						<br>
								<h5>
									<?php echo "Description: ". $row['description'];?>
								</h5>
						<hr>
								
								<h5>
									<?php echo "Procedure: ". $row['procedure_outline'];?>
								</h5>
								<br>
								<h5>
									<?php echo "Goal: ". $row['requestor_goal'];?>
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
									<?php echo "Requestor: ". $row['requestor_name'];?>
								</h5>
								<br>
								
								<h5>
									<?php echo "Requestor Contact: ". $row['requestor_contact'];?>
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
						<br>
						
						<?php
								

									
								//$sql = "SELECT project_list.*, eq_in_projects.*, eqcatalog.* FROM project_list, eq_in_projects, eqcatalog WHERE project_list.projectid = eq_in_projects.projectid AND project_list.projectid = '$projectid'";
						$sql = "SELECT project_list.*, eq_in_projects.*, eqcatalog.* FROM project_list, eq_in_projects, eqcatalog WHERE project_list.projectid = eq_in_projects.projectid AND project_list.projectid = '$projectid' AND eq_in_projects.eq_id = eqcatalog.eq_id";
									
									//echo $sql;
								$result = mysqli_query( $connection, $sql );
								

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


	
	
	
	   <div class="col-xl-4" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Search for a Project</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
						
						<label for="">Add students to projects</label><br>
						
						<?php echo "<a class = 'btn btn-success' href = 'addselfproject2.php?name=" . $project_name . "&id=" . $project_id . "'>I'm also in this project!</a>
						" ?>
						
						
<!--						<a class = 'btn btn-success' href = 'addselfproject2.php?name=" . $row[ 'project_name' ] . "&id=" . $row[ 'projectid' ] . "'>I'm also in this project!</a>-->
				<hr>
						
						<label for="">Modify Project Details</label>
						<br>
						
						<form method="POST">
						<button type="submit" name="modify" class = 'btn btn-success'>Modify Details</button>
						</form>
						
						<?php 
						
						if(isset($_POST['modify']) & !empty(isset($_POST['modify']))){
							if($student_rep == $id) {
								echo "<script>window.location.href =  'modifyproject.php?student_rep=" . $student_rep . "&id=" . $project_id . "';</script>;";
								
								//echo '<script>window.location.href = "addselfproject2.php?success=Entry added";</script>';	
								
								
							} else {
								
								echo "sorry only the student responsible of this project or the SMS leadership team can modify";
							}

						}
						
						
						?>
						
<!--						<a class = 'btn btn-success' href = 'addselfproject2.php?name=" . $row[ 'project_name' ] . "&id=" . $row[ 'projectid' ] . "'>Modify Details</a>-->
				<hr>
						<label for="">Add Equipment</label>
						<br>
						<form method="POST">
						<button type="submit" name="addeq" class = 'btn btn-success'>Modify Details</button>
						</form>
						
						<?php 
						
						if(isset($_POST['addeq']) & !empty(isset($_POST['addeq']))){
							
								echo "<script>window.location.href =  'addeqsearch.php?student_rep=" . $student_rep . "&id=" . $project_id . "';</script>;";
								
								//echo '<script>window.location.href = "addselfproject2.php?success=Entry added";</script>';	
	
							}

						
						
						
						?>
<!--						<a class = 'btn btn-success' href = 'addselfproject2.php?name=" . $row[ 'project_name' ] . "&id=" . $row[ 'projectid' ] . "'>Document Equipment</a>-->
				<hr>
						<label for="">Remove Equipment</label>
						<br>
						
						<form method="POST">
						<button type="submit" name="remove_eq" class = 'btn btn-success'>Remove EQ</button>
						</form>
						
						<?php 
						
						if(isset($_POST['remove_eq']) & !empty(isset($_POST['remove_eq']))){
							
								echo "<script>window.location.href =  'removeeq.php?student_rep=" . $student_rep . "&id=" . $project_id . "';</script>;";
								
								//echo '<script>window.location.href = "addselfproject2.php?success=Entry added";</script>';	
	
							}

						
						
						
						?>
						
	
	
						
						<br>
	
	      
                    </div>
                </div>
                <!-- /# card -->
            </div>

	
	
	
</body>
</html>