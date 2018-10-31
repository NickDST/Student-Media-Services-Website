<?php
include 'hubheader.php';



	if ( !isset( $_SESSION[ 'exec_rights' ] ) ) {
	echo '<script>window.location.href = "hub.php?error=You need exec rights";</script>';
	exit;
}





?>

<div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h2>Add Student</h2>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px; padding-right:20px;">


	
						<form method="post">
						<input type="text" name="name" class="form-control" placeholder="Name of Student" maxlength=200 required>
						<br>
							
						<input type="number" name="studentid" class="form-control" placeholder="Student Numbers" required>
						<br>
						<input type="number" name="year" class="form-control" placeholder="Year (like 12 or 11 or 10 or 9...I dont feel like coding a drop down so please just put one of those)" max=12 required>
						<br>
							
						<input type="text" name="position" class="form-control" placeholder="Position" maxlength=200 required>
						<br>
							
						<input type="text" name="email" class="form-control" placeholder="Email" maxlength=200 required>
						
							
						<br>
						<button class="btn btn-success" type="submit" value = 'make_changes' name = 'make_changes'>Submit New Student</button>
						<br>

						</form>
						
						<br>
						

						<?php
						if ( isset( $_POST[ 'make_changes' ] ) == 'make_changes' & !empty( $_POST[ 'make_changes' ] ) ) {
							//$project_id = mysqli_real_escape_string($connection, $_GET["updateid"]);
						
						$name = mysqli_real_escape_string( $connection, $_POST[ "name" ] );
						$studentid = mysqli_real_escape_string( $connection, $_POST[ "studentid" ] );
						$position = mysqli_real_escape_string( $connection, $_POST[ "position" ] );
						$email = mysqli_real_escape_string( $connection, $_POST[ "email" ] );	
						$year = mysqli_real_escape_string( $connection, $_POST[ "year" ] );
							

							
													$alreadysql = "SELECT * FROM students WHERE studentid = '$studentid'";
													$alreadyresult = mysqli_query( $connection, $alreadysql );
													$alreadyqueryResults = mysqli_num_rows( $alreadyresult );
													if ( $alreadyqueryResults != 0 ) {
														
														$false = 'yes';
														
													}
							
							
													$alreadysql = "SELECT * FROM students WHERE studentid = '$name'";
													$alreadyresult = mysqli_query( $connection, $alreadysql );
													$alreadyqueryResults = mysqli_num_rows( $alreadyresult );
													if ( $alreadyqueryResults != 0 ) {
														
														$false = 'yes';
														
													}
													
													
													
													if ($false != 'yes'){

														$addstudentsql = "INSERT INTO students (name, studentid, position, contact, year) VALUES ('$name', '$studentid', '$position', '$email', '$year');";
														


														$addstudentresult = mysqli_query( $connection, $addstudentsql );
														if ( $addstudentresult ) {
															
															
															echo '<script>window.location.href = "exec_add_student.php?success=uaodifljkasdf";</script>';	
															


														} else {
															
															echo '<script>window.location.href = "exec_add_student.php?error=Entry failed to be added";</script>';	
														}
														
														
													} else {
														echo '<script>window.location.href = "exec_add_student.php?error=This isnt ok";</script>';	
														
													}
													
												}
												?>
						
						
						
						
						
						
						
						
						
						
					 </div>
                </div>
                <!-- /# card -->
            </div>







</body>
</html>