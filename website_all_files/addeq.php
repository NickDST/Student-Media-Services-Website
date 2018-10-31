<?php include 'hubheader.php';

//this is a file that adds equipment to a project
$name = mysqli_real_escape_string( $connection, $_GET[ 'name' ] );
								
$eq_id = mysqli_real_escape_string( $connection, $_GET[ 'eq_id' ] );

$projectid = mysqli_real_escape_string( $connection, $_GET[ 'projectid' ] );

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Adding Equipment</title>
</head>

<body>

	
	
	      <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Adding Equipment to Project</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px; padding-right:20px;">
							<?php
								
							//	echo $projectid;
								$sql = "SELECT * FROM eqcatalog WHERE eq_id = '$eq_id'";
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										echo "
				<div>
					<h3>" . $row[ 'eq_name' ] . "</h3>
					<p>" . $row[ 'eq_description' ] . "</p>
					
				</div>
				<hr>";
									}


								}


								?>
						
						<?php  
								

									
								$sql = "SELECT project_list.*, eq_in_projects.*, eqcatalog.* FROM project_list, eq_in_projects, eqcatalog WHERE project_list.projectid = eq_in_projects.projectid AND eqcatalog.eq_id = eq_in_projects.eq_id AND project_list.projectid = '$projectid'";
									
									//echo $sql;
								$result = mysqli_query( $connection, $sql );
						
						
								$queryResults = mysqli_num_rows( $result );
						
								if($queryResults == 0) {
									echo "No equipment has been added to this project yet";
								}
						


								while ( $equipment = $result->fetch_assoc() ):	
	
						
									echo $equipment['eq_name'];?> <span>hours - </span>
								<?php echo $equipment['eq_description'].",";?>
								<br>
						<br>
								<?php
								endwhile;
									
							 ?>
						
			
						
						
						
						
						
						
						
						
							<form method="post">
													
													
													
													<br>
													<button class="btn btn-success" name='add' type="submit" value='add'>This equipment to the project</button>
												</form>

												<!--Adding a student to the project-->
												<?php

												if ( isset( $_POST[ 'add' ] ) == 'add' & !empty( $_POST[ 'add' ] ) ) {
													
														

													$alreadysql = "SELECT * FROM eq_in_projects WHERE eq_id = '$eq_id' AND projectid = '$projectid'";
													//echo $alreadysql;
													$alreadyresult = mysqli_query( $connection, $alreadysql );
													$alreadyqueryResults = mysqli_num_rows( $alreadyresult );
													
													
													if ( $alreadyqueryResults == 0 ) {

														$service_hours = mysqli_real_escape_string( $connection, $_POST[ "service_hours" ] );
														$role = mysqli_real_escape_string( $connection, $_POST[ "role" ] );


														$addstudentsql = "INSERT INTO eq_in_projects (eq_id, projectid) VALUES ('$eq_id', '$projectid');";
														//echo $addstudentsql;



														$addstudentresult = mysqli_query( $connection, $addstudentsql );
														if ( $addstudentresult ) {
															//echo "Entry successfully added";
															echo '<script>window.location.href = "addeq.php?success=Entry added";</script>';	
															


														} else {
															//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
															//echo "Entry failed to be added";
															echo '<script>window.location.href = "addeq.php?error=Entry failed to be added";</script>';	
														}

													} else {
														echo '<script>window.location.href = "addeq.php?error=EQ is already in the Project";</script>';	
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