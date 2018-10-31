<?php
include 'hubheader.php';



	if ( !isset( $_SESSION[ 'exec_rights' ] ) ) {
	echo '<script>window.location.href = "hub.php?error=You need exec rights";</script>';
	exit;
}



$eq_code = mysqli_real_escape_string( $connection, $_GET[ 'eq_code' ] );





$sql = "SELECT * from eqcatalog where eq_code = '$eq_code' ";



$result = mysqli_query( $connection, $sql );
$queryResults = mysqli_num_rows( $result );
if ( $queryResults == 1 ) {
	while ( $row = mysqli_fetch_assoc( $result ) ) {
		$eq_name = $row[ 'eq_name' ];
		$eq_code = $row[ 'eq_code' ];
		$eq_type = $row[ 'eq_type' ];
		$eq_description = $row[ 'eq_description' ];
		$eq_id = $row[ 'eq_id' ];

		?>

		<div class="col-xl-12">
			<div class="card">
				<div class="card-header">
					<h4>Project Details</h4>
				</div>
				<div class="" style="padding-left:20px; padding-top:10px; padding-right:20px;">


					<h2>
						<?= $row['eq_name'] ?>
					</h2>
					<span class=''> EQ ID: ( <?= $row['eq_id'] ?> )</span>
					<br>
					
					<br>
					<p>Description:
						<?= $row['eq_description'] ?>
					</p>
					<br>

					
					
					<hr>
					
					<h3>List of students who can currently use this equipment</h3>
					<br>
			<table class="table table-light project-table table-hover">
									<tr style="background-color:ghostwhite;">
										<th>Name</th>
										<th>Student ID</th>
										<th>SIG Certified In</th>
										<th>Certified By</th>
										<th>Certified Date</th>
									


									</tr>
									<?php


				
					$sql = "SELECT students_in_eq.*, students.*, eqcatalog.* FROM students_in_eq, students, eqcatalog WHERE students_in_eq.studentid = students.studentid AND eqcatalog.eq_id = students_in_eq.eq_id AND eqcatalog.eq_code = '$eq_code'";
		
		
		
									$result = mysqli_query( $connection, $sql );


									$resultCheck = mysqli_num_rows( $result );
									if ( $resultCheck > 0 ) {
										while ( $row = mysqli_fetch_assoc( $result ) ) {

										





											echo "<tr>
    <td>" . $row[ "name" ] . "</td>
	<td>" . $row[ "studentid" ] . "</td>
    <td>" . $row[ "sig_certified" ] . "</td>
    <td>" . $row[ 'certified_by' ] . "</td>
	<td>" . $row[ 'datetime_event' ] . "</td>
    
 

    </tr>";

										}

										echo "</table>";
									} else {
										echo "0 results";
									}
									//$hours = "0";
	
									?>
				<br>
				<hr>

				

					<?php
					}
					}
					?>
					<h3 style="text-align:center;"> Make Changes to the equipment </h3>
					<br>
					<form method="post">
						<input type="text" name="eq_name" class="form-control" placeholder="Change Name of Equipment" maxlength=200>
						<br>
						<input type="text" name="eq_type" class="form-control" placeholder="Change equipment type (we should probably keep this formal so there should be some list to choose from)" maxlength=200>
						<br>

						<textarea class="form-control" type="textarea" id="message" name="eq_description" maxlength="6000" rows="7" placeholder="Change the description of the equipment"></textarea>

						<br>
						<button class="btn btn-secondary" type="submit" value = 'make_changes' name = 'make_changes'>Make Changes to Equipment</button>
						<br>


					</form>



					<?php
					if ( isset( $_POST[ 'make_changes' ] ) & !empty( $_POST[ 'make_changes' ] ) ) {

						//$updateid = mysqli_real_escape_string( $connection, $_GET[ "updateid" ] );
						$eq_name = mysqli_real_escape_string( $connection, $_POST[ "eq_name" ] );
						$eq_type = mysqli_real_escape_string( $connection, $_POST[ "eq_type" ] );
						$eq_description = mysqli_real_escape_string( $connection, $_POST[ "eq_description" ] );

						//Generating the SQL statement to pass in as a string

						//Trying to piece together the string based on whether or not a variable is entered

						//If a name is entered, alter the name
						if ( !empty( $eq_name ) ) {
							$sqlName = "eq_name = " . "'" . $eq_name . "',";
						} else {
							$sqlName = "";
						}
						//echo $sqlName;

						
						//If a request ID is entered, update the request ID
						if ( !empty( $eq_type ) ) {
							$sqltype = "eq_type = " . "'" . $eq_type . "',";
						} else {
							$sqltype = "";
						}
						

						//If a student ID is entered, update the student ID
						if ( !empty( $eq_description ) ) {
							$sqldescription = "eq_description = " . "'" . $eq_description . "',";
						} else {
							$sqldescription = "";
						}
						//echo $sqlstudent_request_id;

						$sqlend = "end = '1' ";

						//Actual String	
						$sql = "UPDATE eqcatalog 
		SET $sqlName $sqltype $sqldescription $sqlend
		
		WHERE eq_code = '$eq_code'";

						$result = mysqli_query( $connection, $sql );
						if ( $result ) {
							
							//$smsg = "Entry successfully added";
							//echo '<script>window.location.href = "hub.php?success=Success!";</script>';	
							//echo '<script>window.location.href = ' . "tech_modify_equipment_details.php?eq_code=" . $eq_code . "&success=Success!" .'</script>';
							$success = "Success!!";
							echo "<script>window.location.href = 'tech_modify_equipment_details.php?eq_code=" . $eq_code . "&success=" . $success . "'</script>";


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


						<h4 style="text-align:center;"> Certify a student to use this equipment</h4>
						<br>


						<form method="post">
							<input type="number" name="student_id" class="form-control" placeholder="Student ID" required>
					
							<br>
							<button class="btn btn-success" name='add' type="submit" value='add'>Certify the Student</button>
						</form>

						<!--Adding a student to the project-->
						<?php

						if ( isset( $_POST[ 'add' ] ) == 'add' & !empty( $_POST[ 'add' ] ) ) {
							//$project_id = mysqli_real_escape_string($connection, $_GET["updateid"]);
							 
						$certify_student = mysqli_real_escape_string( $connection, $_POST[ "student_id" ] );
						
							

													$alreadysql = "SELECT * FROM students_in_eq WHERE eq_id = '$eq_id' AND studentid = '$certify_student'";
													//echo $alreadysql;
													$alreadyresult = mysqli_query( $connection, $alreadysql );
													$alreadyqueryResults = mysqli_num_rows( $alreadyresult );
													
													
													if ( $alreadyqueryResults == 0 ) {

													


														$addstudentsql = "INSERT INTO students_in_eq (eq_id, studentid, certified_by, sig_certified) VALUES ('$eq_id', '$certify_student', '$studentid', '$sig_name');";
														//echo $addstudentsql;


														

														$addstudentresult = mysqli_query( $connection, $addstudentsql );
														if ( $addstudentresult ) {
															//echo "Entry successfully added";
															//echo '<script>window.location.href = "tech_list_equipment.php?success=Entry added";</script>';	
															
															$success = "entry successfully added!!";
							echo "<script>window.location.href = 'tech_modify_equipment_details.php?eq_code=" . $eq_code . "&success=" . $success . "'</script>";
															


														} else {
															//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
															//echo "Entry failed to be added";
															echo '<script>window.location.href = "hub.php?error=Entry failed to be added";</script>';	
														}

													} else {
														echo '<script>window.location.href = "tech_list_equipment.php?error=Student already has access to this";</script>';	
														//echo "student is already in the project";
													}
													
												}
												?>
						
					</div>
					<hr>

					<div>
						<h4 style="text-align:center;"> Revoke Permissions for a student to use this equipment </h4>
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
							$revoked_student = mysqli_real_escape_string( $connection, $_POST[ "student_id" ] );
							
	$removeeqsql = "DELETE FROM students_in_eq WHERE eq_id = $eq_id AND studentid = $revoked_student;";
	
	$removestudentsresult = mysqli_query( $connection, $removeeqsql );
							if ( $removestudentsresult ) {
								//echo "Entry successfully Removed";
								$success = "Success in revoking!!";
							echo "<script>window.location.href = 'tech_modify_equipment_details.php?eq_code=" . $eq_code . "&success=" . $success . "'</script>";


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
						<h2>Permanently Delete This piece of equipment</h2>
						<br>
						<div class="alert alert-danger" role="alert">
							WARNING: This will erase all records of this piece of equipment.
						</div>
						<br>
						<form name='fulldelete' method="post">
							<button class="btn btn-danger btn-lg" name='fulldelete' type="submit" value="fulldelete">DELETE THIS EQUIPMENT</button>
						</form>
						<?php
						echo $eq_id;

						if ( isset( $_POST[ 'fulldelete' ] ) == 'fulldelete' & !empty( $_POST[ 'fulldelete' ] ) ) {
							//$project_id = mysqli_real_escape_string($connection, $_GET["updateid"]);
							
							

							$delete_eq_from_peoplesql = "DELETE FROM students_in_eq WHERE eq_id = '$eq_id'
							
;";
							
							$delete_eq_in_projectssql = "DELETE FROM eq_in_projects WHERE eq_id = '$eq_id'
							
;";
							$delete_eq_in_sigssql = "DELETE FROM eq_in_sigs WHERE eq_id = '$eq_id'
							
;";
							
							
							$delete_eq_from_catalogsql = "DELETE FROM eqcatalog WHERE eq_id = '$eq_id'
;";

							$delete_eq_from_people = mysqli_query( $connection, $delete_eq_from_peoplesql );
							
							
							
							$delete_eq_in_projects = mysqli_query( $connection, $delete_eq_in_projectssql );
							
							
							
							$delete_eq_in_sigs = mysqli_query( $connection, $delete_eq_in_sigssql );
							
							
							
							$delete_eq_from_catalog = mysqli_query( $connection, $delete_eq_from_catalogsql );
							
							
							if ( $delete_eq_from_people && $delete_eq_in_projects && $delete_eq_from_catalog && $delete_eq_in_sigs ) {
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









</body>
</html>