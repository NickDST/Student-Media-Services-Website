<?php include 'hubheader.php';


if ( !isset( $_SESSION[ 'is_leadership' ] ) ) {
	header( 'Location: hub.php' );
	exit;
}

$studentid = $id;


	
$sig_name = mysqli_real_escape_string($connection, $_GET['sig_name']);



$sql = "SELECT * FROM students_in_sigs WHERE sig_name = '$sig_name' AND studentid = '$studentid' AND sig_position = 'Leader'";	


$result = mysqli_query($connection, $sql);

$queryResults = mysqli_num_rows($result);

if ($queryResults > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		//echo "You are a sig leader here! Welcome!";
	}
	
} else {
	
	echo '<script>window.location.href = "hub.php?error=You are not the leader of this sig";</script>';
}
	
	
?>



  <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Create an attendance session for this SIG</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px; padding-right:20px;">
						
						
						<h3>Open a new Attendance session</h3>
						<hr>
						
						<?php $date = date('Y-m-d H:i:s');
							echo "<h3>The current time is: " . $date."</h3>";?>
						<br>
						
							<form method="post">
													
												<input type="text" name="name" id="" class="form-control" placeholder="Enter Access Code" required maxlength=100>
													
													<br>
													<button class="btn btn-success" name='add' type="submit" value='add'>Create Session</button>
												</form>

													<br>
												<!--Adding a student to the project-->
												<?php

												if ( isset( $_POST[ 'add' ] ) == 'add' & !empty( $_POST[ 'add' ] ) ) {
													
													$enter_name = mysqli_real_escape_string( $connection, $_POST[ 'name' ] );
													
													
													$alreadysql = "SELECT * FROM open_attendance WHERE sig_name_attendance = '$sig_name' AND open_attendance_status = 'open'";
													
													$alreadyresult = mysqli_query( $connection, $alreadysql );
													$alreadyqueryResults = mysqli_num_rows( $alreadyresult );
													
													
													if ( $alreadyqueryResults == 0 ) {

													
													
													
													
													$addattendancesql = "INSERT INTO open_attendance (attendance_name, open_attendance_status, sig_name_attendance) VALUES ('$enter_name', 'open', '$sig_name');";
														
													

														$addattendanceresult = mysqli_query( $connection, $addattendancesql );
													
	
													if($addattendanceresult){
													
														$sql = "SELECT * FROM open_attendance WHERE open_attendance_status = 'open'";
														
														$result = mysqli_query( $connection, $sql );
														
														while ( $attendance = $result->fetch_assoc() ):
														
														$open_attendance_id = $attendance['open_attendance_id'];
														
														endwhile;

													
														$sql = "SELECT sigs.*, students_in_sigs.*, students.* FROM students, students_in_sigs, sigs WHERE students.studentid = students_in_sigs.studentid AND sigs.sig_name = students_in_sigs.sig_name AND sigs.sig_name = '$sig_name'";
													
													$result = mysqli_query( $connection, $sql );
								

													while ( $siginfo = $result->fetch_assoc() ):
													
													$certified_studentid = $siginfo['studentid'];
													

													
														$addstudentsql = "INSERT INTO attendance_status (open_session_id, studentid, sig_name) VALUES ('$open_attendance_id', '$certified_studentid', '$sig_name');";
														
														$addstudentresult = mysqli_query( $connection, $addstudentsql );
													
													
													
													
													
													
													endwhile;
														
													}
													// - - - - -- - - -- - - - - - 
													
													echo '<script>window.location.href = "mysig.php?success=Completed Hypothetical Sequence";</script>';
														
													
													
												}
														echo '<script>window.location.href = "mysig.php?error=You already have an attendance open, stop trying to break things";</script>';
												
												}

						?>
						
						
						</div>
                </div>
                <!-- /# card -->
            </div>








</body>
</html>