<?php include 'hubheader.php'?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Create a New Project</title>
</head>

<body>
	
	
	
	
	      <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Adding Equipment to Project</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px; padding-right:20px;">
							<?php
								$name = mysqli_real_escape_string( $connection, $_GET[ 'name' ] );
								
								$projectid = mysqli_real_escape_string( $connection, $_GET[ 'id' ] );
							//	echo $projectid;
								$sql = "SELECT * FROM project_list WHERE project_name = '$name' AND projectid = '$projectid'";
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										echo "
				<div>
					<h3>" . $row[ 'project_name' ] . "</h3>
					<p>" . $row[ 'description' ] . "</p>
					
				</div>
				<hr>";
									}


								}


								?>
						
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
						
						
							<form method="post">
													<br>
													<input type="number" name="service_hours" class="form-control" placeholder="Number of Service Hours" required maxlength = 100>
													<br>
													<input type="text" name="role" class="form-control" placeholder="My Role" required maxlength = 100>
													<br>
	
													
													
													<br>
													<button class="btn btn-success" name='add' type="submit" value='add'>Add Me To this Project</button>
												</form>

												<!--Adding a student to the project-->
												<?php

												if ( isset( $_POST[ 'add' ] ) == 'add' & !empty( $_POST[ 'add' ] ) ) {
													
														

													$alreadysql = "SELECT * FROM students_in_projects WHERE projectid = '$projectid' AND studentid = '$id'";
													//echo $alreadysql;
													$alreadyresult = mysqli_query( $connection, $alreadysql );
													$alreadyqueryResults = mysqli_num_rows( $alreadyresult );
													
													
													if ( $alreadyqueryResults == 0 ) {

														$service_hours = mysqli_real_escape_string( $connection, $_POST[ "service_hours" ] );
														$role = mysqli_real_escape_string( $connection, $_POST[ "role" ] );


														$addstudentsql = "INSERT INTO students_in_projects (projectid, studentid, service_hours, role) VALUES ('$projectid', '$id', '$service_hours' , '$role');";
														//echo $addstudentsql;



														$addstudentresult = mysqli_query( $connection, $addstudentsql );
														if ( $addstudentresult ) {
															//echo "Entry successfully added";
															echo '<script>window.location.href = "addselfproject2.php?success=Entry added";</script>';	
															


														} else {
															//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
															//echo "Entry failed to be added";
															echo '<script>window.location.href = "addselfproject2.php?error=Entry failed to be added";</script>';	
														}

													} else {
														echo '<script>window.location.href = "addselfproject2.php?error=Student is already in the Project";</script>';	
														//echo "student is already in the project";
													}
													
												}
												?>
						<br>
						
						
						
						
						
						
                        
                    </div>
                </div>
                <!-- /# card -->
            </div>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

	
	
	
	
	
	
</body>
</html>