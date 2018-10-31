<?php
include 'hubheader.php';



	if ( !isset( $_SESSION[ 'exec_rights' ] ) ) {
	echo '<script>window.location.href = "hub.php?error=You need exec rights";</script>';
	exit;
}



//$eq_code = mysqli_real_escape_string( $connection, $_GET[ 'eq_code' ] );
$studentid = mysqli_real_escape_string( $connection, $_GET[ 'id' ] );



$sql = "SELECT * from students where studentid = '$studentid'";



$result = mysqli_query( $connection, $sql );
$queryResults = mysqli_num_rows( $result );
if ( $queryResults == 1 ) {
	while ( $row = mysqli_fetch_assoc( $result ) ) {
		$name = $row[ 'name' ];
		$studentid = $row[ 'studentid' ];
		$position = $row[ 'position' ];
		$year = $row[ 'year' ];
		$eq_id = $row[ '' ];

		?>


		<div class="col-xl-11">
			<div class="card">
				<div class="card-header">
					<h4>Project Details</h4>
				</div>
				<div class="" style="padding-left:20px; padding-top:10px; padding-right:20px;">


					<h2>
						<?= $row['name'] ?>
					</h2>
					<span class=''> Studentid ID: ( <?= $row['studentid'] ?> )</span>
					<br>
					
					<br>
					<p>Description:
						<?= $row['position'] ?>
					</p>
					<br>

					
					
					<hr>
				
				
				<br>
				
				

					<?php
					}
					}
					?>
					<h3 style="text-align:center;"> Make Changes to the equipment </h3>
					<br>
					<form method="post">
						<input type="text" name="name" class="form-control" placeholder="Name" maxlength=200>
						<br>
						<input type="text" name="position" class="form-control" placeholder="Position" maxlength=200>
						<br>
						<input type="number" name="year" class="form-control" placeholder="Year" max=12>
						<br>


						

						<br>
						<button class="btn btn-secondary" type="submit" value = 'make_changes' name = 'make_changes'>Make Changes to Student Information</button>
						<br>


					</form>



					<?php
					if ( isset( $_POST[ 'make_changes' ] ) & !empty( $_POST[ 'make_changes' ] ) ) {

						//$updateid = mysqli_real_escape_string( $connection, $_GET[ "updateid" ] );
						$name = mysqli_real_escape_string( $connection, $_POST[ "name" ] );
						$position = mysqli_real_escape_string( $connection, $_POST[ "position" ] );
						$year = mysqli_real_escape_string( $connection, $_POST[ "year" ] );

						//Generating the SQL statement to pass in as a string

						//Trying to piece together the string based on whether or not a variable is entered

						//If a name is entered, alter the name
						if ( !empty( $name ) ) {
							$sqlName = "name = " . "'" . $name . "',";
						} else {
							$sqlName = "";
						}
						//echo $sqlName;

						
						//If a request ID is entered, update the request ID
						if ( !empty( $year ) ) {
							$sqlyear = "year = " . "'" . $year . "',";
						} else {
							$sqlyear = "";
						}
						

						//If a student ID is entered, update the student ID
						if ( !empty( $position ) ) {
							$sqlposition = "position = " . "'" . $position . "',";
						} else {
							$sqlposition = "";
						}
						//echo $sqlstudent_request_id;

						$sqlend = "end = '1' ";

						
						//Actual String	
						$sql = "UPDATE students 
		SET $sqlName $sqlyear $sqlposition $sqlend
		
		WHERE studentid = '$studentid'";

						$result = mysqli_query( $connection, $sql );
						if ( $result ) {
							
							//$smsg = "Entry successfully added";
							//echo '<script>window.location.href = "hub.php?success=Success!";</script>';	
							//echo '<script>window.location.href = ' . "tech_modify_equipment_details.php?eq_code=" . $eq_code . "&success=Success!" .'</script>';
							$success = "Success!!";
							echo "<script>window.location.href = 'tech_modify_equipment_details.php?studentid=" . $studentid . "&success=" . $success . "'</script>";


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


				
				
					<div style="margin-bottom:60px;">
						<hr>
						<br>
						<h2>Permanently Remove this person from the database</h2>
						<br>
						<div class="alert alert-danger" role="alert">
							WARNING: This will erase all records of this person.
						</div>
						<br>
						<form name='fulldelete' method="post">
							<button class="btn btn-danger btn-lg" name='fulldelete' type="submit" value="fulldelete">DELETE THIS CHILD</button>
						</form>
						<?php
						echo $eq_id;

						if ( isset( $_POST[ 'fulldelete' ] ) == 'fulldelete' & !empty( $_POST[ 'fulldelete' ] ) ) {
							//$project_id = mysqli_real_escape_string($connection, $_GET["updateid"]);
							
							

							$delete_student_from_peoplesql = "DELETE FROM students_in_eq WHERE studentid = '$studentid'
							
;";
							
							$delete_student_in_projectssql = "DELETE FROM students_in_projects WHERE studentid = '$studentid'
							
;";
						
							$delete_student_from_sigssql = "DELETE FROM students_in_sigs WHERE studentid = '$studentid'
;";
							
							
							$delete_student_from_catalogsql = "DELETE FROM students WHERE studentid = '$studentid'
;";
							
							


							$delete_student_from_people = mysqli_query( $connection, $delete_student_from_peoplesql );
							
							
							
							$delete_student_in_projects = mysqli_query( $connection, $delete_student_in_projectssql );
							
							
							
							$delete_student_from_catalog = mysqli_query( $connection, $delete_student_from_catalogsql );
							
							
							
							$delete_student_from_sigs = mysqli_query( $connection, $delete_student_from_sigssql );
							
							
							if ( $delete_student_from_people && $delete_student_in_projects && $delete_student_from_catalog && $delete_student_from_sigs ) {
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