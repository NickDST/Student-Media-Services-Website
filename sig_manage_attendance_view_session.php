<?php include 'hubheader.php';


if ( !isset( $_SESSION[ 'is_leadership' ] ) ) {
	header( 'Location: hub.php' );
	exit;
}

$studentid = $id;


	
$sig_name = mysqli_real_escape_string($connection, $_GET['sig_name']);
$open_attendance_id = mysqli_real_escape_string($connection, $_GET['open_attendance_id']);




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
	


//Getting the numbers of absent and those who attended

												//$sqlhours = "SELECT SUM(service_hours) FROM students_in_projects, project_list WHERE students_in_projects.projectid = project_list.projectid AND students_in_projects.studentid = '$studentid' AND affiliated_group_for_servicehours = 'SNHS' AND project_list.datetime_start >= '$datetime_start' AND project_list.datetime_start <='$datetime_end'";


	$sql = "SELECT COUNT(status) FROM attendance_status WHERE open_session_id = '$open_attendance_id' AND status = 'absent';";
		
		//oh my god im an idiot
		
									$result = mysqli_query( $connection, $sql );

//
									$resultCheck = mysqli_num_rows( $result );
									if ( $resultCheck > 0 ) {
										while ( $row = mysqli_fetch_assoc( $result ) ) {
$number_absent = $row['COUNT(status)'];

										}
										
									}


//number present
$sql = "SELECT * FROM attendance_status WHERE open_session_id = '$open_attendance_id' AND status = 'present';";
$result = mysqli_query( $connection, $sql );
$number_present = mysqli_num_rows( $result );


//number late
$sql = "SELECT * FROM attendance_status WHERE open_session_id = '$open_attendance_id' AND status = 'late';";
$result = mysqli_query( $connection, $sql );
$number_late = mysqli_num_rows( $result );


//number excused
$sql = "SELECT * FROM attendance_status WHERE open_session_id = '$open_attendance_id' AND status = 'excused';";
$result = mysqli_query( $connection, $sql );
$number_excused = mysqli_num_rows( $result );


	
?>


	      <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Member Status</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px; padding-right:20px;">
						<h3>Status Report: </h3>
						<hr>		
<!--Number of people present-->
						<?php echo "<p>Number of people present: ". $number_present ."</p>" ?>
						
<!--Number of people who are absent-->
						
						<?php echo "<p>Number of people absent: ". $number_absent . "</p>"?>
						
<!--Number of people late-->
						<?php echo "<p>Number of people late: ". $number_late ."</p>" ?>
						
<!--Number of people who are excused-->
						
						<?php echo "<p>Number of people excused: ". $number_excused . "</p>"?>
												
						<form method="post">
					<br>
							
													<button class="btn btn-danger" name='close' type="submit" value='close'>Delete this Run</button>
												</form>

												<!--Adding a student to the project-->
												<?php

												if ( isset( $_POST[ 'close' ] ) == 'close' & !empty( $_POST[ 'close' ] ) ) {
													
													$sql1 = "DELETE FROM open_attendance WHERE open_attendance_id = '$open_attendance_id'";
													
													$result1 = mysqli_query($connection, $sql1);
													
													
													
													$sql = "DELETE FROM attendance_status WHERE open_session_id = '$open_attendance_id'";
													
													$result = mysqli_query($connection, $sql);
													
													if($result){
														//Redirect out of there
														echo '<script>window.location.href = "hub.php?success=Removed";</script>';	
													} else {
														//Error Message
														echo '<script>window.location.href = "hub.php?error=something went wrong";</script>';	
													}
													
													
												}
						
						?>
						
						
						<hr>
												<form method="post">
													
													<button class="btn btn-secondary" name='alter_attendance' type="submit" value='alter_attendance'>Alter Attendance</button>
												</form>

												<!--Adding a student to the project-->
												<?php

												if ( isset( $_POST[ 'alter_attendance' ] ) == 'alter_attendance' & !empty( $_POST[ 'alter_attendance' ] ) ) {
													
														echo "<script>window.location.href =  'sig_attendance_alter_info.php?open_attendance_id=" . $open_attendance_id . "&sig_name=".$sig_name ."';</script>;";
													
												}
						
						?>
						<br>
						
					</div>
					</div>
			  </div>



	      <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Member Status</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px; padding-right:20px;">

								
								<table class="table table-light project-table table-hover">
									<tr style="background-color:ghostwhite;">
										<th>Session ID</th>
										<th>Student</th>
										<th>IP</th>
										<th>Status</th>
									

									</tr>
									<?php

		
									$sql = "SELECT attendance_status.*, students.* from attendance_status, students WHERE attendance_status.studentid = students.studentid AND open_session_id = '$open_attendance_id' ORDER BY status ASC";
		
		
		
									$result = mysqli_query( $connection, $sql );

//
									$resultCheck = mysqli_num_rows( $result );
									if ( $resultCheck > 0 ) {
										while ( $row = mysqli_fetch_assoc( $result ) ) {

										





											echo "<tr>
    <td>" . $row[ "open_session_id" ] . "</td>
    <td>" . $row[ "name" ] . "</td>
    <td>" . $row[ 'ip_address_attendance' ] . "</td>
    <td>" . $row[ "status" ] . "</td>

    </tr>";

										}

										echo "</table>";
									} else {
										echo "0 results";
									}
									//$hours = "0";
	
									?>


			
			
<br>
		</div>
	</div>
	
</div>

















</body>
</html>