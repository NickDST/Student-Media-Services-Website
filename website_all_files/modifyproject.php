<?php
include 'hubheader.php';





$student_rep = mysqli_real_escape_string( $connection, $_GET[ 'student_rep' ] );
$projectid = mysqli_real_escape_string( $connection, $_GET[ 'id' ] );


if ( $id != $student_rep ) {

	if ( !isset( $_SESSION[ 'is_leadership' ] ) )

		echo '<script>window.location.href = "hub.php?error=You are not a leader";</script>';

}

$sql = "SELECT project_list.*, students.* FROM project_list, students WHERE project_list.projectid = '$projectid' AND students.studentid = project_list.student_rep ";

//echo $sql;
$result = mysqli_query( $connection, $sql );
$queryResults = mysqli_num_rows( $result );
if ( $queryResults == 1 ) {
	while ( $row = mysqli_fetch_assoc( $result ) ) {
		$student_rep = $row[ 'student_rep' ];
		$project_name = $row[ 'project_name' ];
		$project_id = $row[ 'projectid' ];

		?>

		<div class="col-xl-12">
			<div class="card">
				<div class="card-header">
					<h4>Project Details</h4>
				</div>
				<div class="" style="padding-left:20px; padding-top:10px; padding-right:20px;">


					<h2>
						<?= $row['project_name'] ?>
					</h2>
					<span class=''> Project ID: ( <?= $row['projectid'] ?> )</span>
					<br>
					<br>
					<h4>Start Date:</h4>
					<span>
						<?= $row['datetime_start'] ?>
					</span>
					<br>
					<br>
					<h4>End Date:</h4>
					<span>
						<?= $row['datetime_end'] ?>
					</span>
					<br>
					<p>Description:
						<?= $row['description'] ?>
					</p>
					<br>
					<br>
					<h3> Students involved : </h3>
					<?php



					$sql = "SELECT project_list.*, students_in_projects.* FROM project_list, students_in_projects WHERE project_list.projectid = students_in_projects.projectid AND project_list.projectid = '$projectid'";

					//echo $sql;
					$result = mysqli_query( $connection, $sql );


					while ( $studentid = $result->fetch_assoc() ):
						$studentnamesql = "SELECT name FROM students WHERE studentid = {$studentid['studentid']}";

					$studentnameresult = mysqli_query( $connection, $studentnamesql );
					while ( $studentname2 = $studentnameresult->fetch_assoc() ):
						echo $studentname2[ 'name' ];

					endwhile;
					?> |

					<?php echo $studentid['service_hours'];?> <span>hours - </span>
					<?php echo $studentid['role'].",";?>
					<br>

					<?php
					endwhile;

					?>
					<br>
					<hr>


					<?php
					}
					}
					?>
					<h3 style="text-align:center;"> Make Changes to this Project </h3>
					<br>
					<form method="post">
						<input type="text" name="name" class="form-control" placeholder="Change Name of Project" maxlength=200>
						<br>
						<input type="text" name="requestor" class="form-control" placeholder="change requestee" maxlength=200>
						<br>
						<input type="text" name="requestor_email" class="form-control" placeholder="Change requestee email" maxlength=200>
						<br>
						<p>Start Date:</p>
						<input type="date" name="date_start" class="form-control" placeholder="Change Start Date">
						<br>
						<p>End Date:</p>
						<input type="date" name="date_end" class="form-control" placeholder="Change End Date">
						<br>
						<input type="text" name="status" class="form-control" placeholder="Change Status" maxlength=200>
						<br>
<!--						<input type="textarea" name="description" class="form-control" placeholder="Description" maxlength=500>-->
						<textarea class="form-control" type="textarea" id="message" name="description" maxlength="6000" rows="7" placeholder="Procedure Outline"></textarea>

						<br>
						<button class="btn btn-secondary" type="submit">Make Changes to Project</button>
						<br>


					</form>



					<?php
					if ( isset( $_POST ) & !empty( $_POST ) ) {

						//$updateid = mysqli_real_escape_string( $connection, $_GET[ "updateid" ] );
						$name = mysqli_real_escape_string( $connection, $_POST[ "name" ] );
						$requestee = mysqli_real_escape_string( $connection, $_POST[ "requestor" ] );
						$requestee_email = mysqli_real_escape_string( $connection, $_POST[ "requestor_email" ] );
						$date_start = mysqli_real_escape_string( $connection, $_POST[ "date_start" ] );
						$date_end = mysqli_real_escape_string( $connection, $_POST[ "date_end" ] );
						$status = mysqli_real_escape_string( $connection, $_POST[ "status" ] );
						$description = mysqli_real_escape_string( $connection, $_POST[ "description" ] );

						//Generating the SQL statement to pass in as a string

						//Trying to piece together the string based on whether or not a variable is entered

						//If a name is entered, alter the name
						if ( !empty( $name ) ) {
							$sqlName = "project_name = " . "'" . $name . "',";
						} else {
							$sqlName = "";
						}
						//echo $sqlName;

						//If a request ID is entered, update the request ID
						if ( !empty( $requestee ) ) {
							$sqlrequestee = "requestor = " . "'" . $requestee . "',";
						} else {
							$sqlrequestee = "";
						}
						//echo $sqlrequest_id;


						//If a student ID is entered, update the student ID
						if ( !empty( $requestee_email ) ) {
							$sqlrequestee_email = "requestor_email = " . "'" . $requestee_email . "',";
						} else {
							$sqlrequestee_email = "";
						}
						//echo $sqlstudent_request_id;


						//If a start date is entered, update the start date
						if ( !empty( $date_start ) ) {
							$sqldate_start = "datetime_start = " . "'" . $date_start . "',";
						} else {
							$sqldate_start = "";
						}
						//echo $sqldate_start;


						//If an end date is entered, update the end date
						if ( !empty( $date_end ) ) {
							$sqldate_end = "datetime_end = " . "'" . $date_end . "',";
						} else {
							$sqldate_end = "";
						}
						//echo $sqldate_end;


						//If a status is entered, update the status
						if ( !empty( $status ) ) {
							$sqlstatus = "status = " . "'" . $status . "',";
						} else {
							$sqlstatus = "";
						}
						//echo $sqlstatus;


						//If a review is entered, update the review
						if ( !empty( $description ) ) {
							$sqldescription = "procedure_outline = " . "'" . $description . "',";
						} else {
							$sqldescription = "";
						}
						//echo $sqlreq_satisfaction;

						$sqlend = "end = '1' ";

						//Actual String	
						$sql = "UPDATE project_list 
		SET $sqlName $sqlrequestee $sqlrequestee_email $sqldate_start $sqldate_end $sqlstatus $sqldescription $sqlend
		
		WHERE projectid = '$projectid'";

						$result = mysqli_query( $connection, $sql );
						if ( $result ) {
							//$smsg = "Entry successfully added";
							echo '<script>window.location.href = "hub.php?success=Success!";</script>';	


						} else {
							//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							//$fmsg = "Entry failed to be added";
							echo '<script>window.location.href = "hub.php?error=something went wrong!";</script>';
							//echo '<script>window.location.href = "adminmodifyproject.php?error=Something went wrong!";</script>';	
							//echo $sql;
						}
						//Ending the if statement if the Post has been submitted	
					}
					//Ending bracket of the inner form
					?>
					<?php if(isset($smsg)){ ?>
					<div class="alert alert-success" role="alert" style="margin-top: 100px;">
						<?php echo $smsg; ?> </div>
					<?php } ?>
					<?php if(isset($fmsg)){ ?>
					<div class="alert alert-danger" role="alert" style="margin-top: 100px;">
						<?php echo $fmsg; ?> </div>
					<?php } ?>

					<hr>








					<div>


						<h4 style="text-align:center;"> Add a student to this project </h4>
						<br>


						<form method="post">
							<input type="number" name="student_id" class="form-control" placeholder="Student ID" required>
							<br>
							<input type="number" name="service_hours" class="form-control" placeholder="Number of Service Hours" required>
							<br>
							<input type="text" name="role" class="form-control" placeholder="Role" required maxlength=2 00>
							<br>
							<button class="btn btn-success" name='add' type="submit" value='add'>Add the student</button>
						</form>

						<!--Adding a student to the project-->
						<?php

						if ( isset( $_POST[ 'add' ] ) == 'add' & !empty( $_POST[ 'add' ] ) ) {
							//$project_id = mysqli_real_escape_string($connection, $_GET["updateid"]);
							$student_id = mysqli_real_escape_string( $connection, $_POST[ "student_id" ] );
							$service_hours = mysqli_real_escape_string( $connection, $_POST[ "service_hours" ] );
							$role = mysqli_real_escape_string( $connection, $_POST[ "role" ] );


							$addstudentsql = "INSERT INTO students_in_projects (projectid, studentid, service_hours, role) VALUES ('$projectid', '$student_id', '$service_hours' , '$role');";



							$addstudentresult = mysqli_query( $connection, $addstudentsql );
							if ( $addstudentresult ) {
								//echo "Entry successfully added";
								//echo '<script>window.location.href = "adminmodifyproject.php?success=successfully added!";</script>';	
								echo '<script>window.location.href = "hub.php?success=Success!";</script>';



							} else {
								//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
								//echo "Entry failed to be added";
								echo '<script>window.location.href = "hub.php?error=Something went wrong!";</script>';

							}

						}
						?>
					</div>
					<hr>

					<div>
						<h4 style="text-align:center;"> Remove a student from this project </h4>
						<br>
						<form name='delete' method="post">
							<input type="INT" name="student_id" class="form-control" placeholder="student ID">
							<br>
							<button class="btn btn-danger" name='delete' type="submit" value="delete">Remove this Student</button>
						</form>

						<!--Remove a student to the project-->
						<?php

						if ( isset( $_POST[ 'delete' ] ) == 'delete' & !empty( $_POST[ 'delete' ] ) ) {
							//$project_id = mysqli_real_escape_string($connection, $_GET["updateid"]);
							$student_id = mysqli_real_escape_string( $connection, $_POST[ "student_id" ] );


							$removestudentsql = "DELETE FROM students_in_projects WHERE studentid = $student_id AND projectid = $projectid
;";



							$removestudentsresult = mysqli_query( $connection, $removestudentsql );
							if ( $removestudentsresult ) {
								//echo "Entry successfully Removed";
								echo '<script>window.location.href = "hub.php?success=Success!";</script>';
								//echo '<script>window.location.href = "adminmodifyproject.php?success=Successfully Removed!";</script>';	


							} else {
								//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
								//echo "Entry failed to be removed";
								echo '<script>window.location.href = "hub.php?error=something went wrong!";</script>';
							}

						}
						?>

					</div>

					<div style="margin-bottom:60px;">
						<hr>
						<br>
						<h2>Permanently Delete This Project</h2>
						<br>
						<div class="alert alert-danger" role="alert">
							WARNING: This will erase all records of this project.
						</div>
						<br>
						<form name='fulldelete' method="post">
							<button class="btn btn-danger btn-lg" name='fulldelete' type="submit" value="fulldelete">DELETE THIS PROJECT</button>
						</form>
						<?php

						if ( isset( $_POST[ 'fulldelete' ] ) == 'fulldelete' & !empty( $_POST[ 'fulldelete' ] ) ) {
							//$project_id = mysqli_real_escape_string($connection, $_GET["updateid"]);

							$deletepeopleprojectsql = "DELETE FROM students_in_projects WHERE projectid = $projectid
;";
							$deleteprojectsql = "DELETE FROM project_list WHERE projectid = $projectid
;";

							$removestudentprojectresult = mysqli_query( $connection, $deleteprojectsql );
							$removeprojectresult = mysqli_query( $connection, $deleteprojectsql );
							if ( $removeprojectresult && $removestudentprojectresult ) {
								//echo "Entry successfully Removed";
								echo '<script>window.location.href = "hub.php?success=Success!";</script>';
								//echo '<script>window.location.href = "adminmodifyproject.php?success=Successfully Removed!";</script>';	


							} else {
								//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
								//echo "Entry failed to be removed";
								echo '<script>window.location.href = "hub.php?error=error!";</script>';
							}

						}
						?>

					</div>
					<br>


					<!--Largest close bracket-->

					<?php if(isset($fmsg)){ ?>
					<div class="alert alert-danger" role="alert" style="margin-top: 100px;">
						<?php echo $fmsg; ?> </div>
					<?php } ?>
					<?php

					?>


				</div>
			</div>
		</div>









		</div>
		</div>
		<!-- /# card -->
		</div>