<?php include 'hubheader.php';


if ( !isset( $_SESSION[ 'is_leadership' ] ) ) {
	header( 'Location: hub.php' );
	exit;
}

$studentid = $id;


//getting the GET variables	
$sig_name = mysqli_real_escape_string($connection, $_GET['sig_name']);
$open_attendance_id = mysqli_real_escape_string($connection, $_GET['open_attendance_id']);
$ip = "this is ip";


//Checking if the student actually is trying to access their attendance, not change it
//$sql = "SELECT * FROM attendance_status WHERE open_session_id = '$open_attendance_id' AND studentid = '$studentid' AND status = 'absent'";	

$sql = "SELECT attendance_status.*, open_attendance.* FROM attendance_status, open_attendance 

WHERE attendance_status.open_session_id = open_attendance.open_attendance_id 

AND attendance_status.studentid = '$id' 

AND open_attendance.open_attendance_status = 'open'

AND open_attendance_id = '$open_attendance_id'
";

$result = mysqli_query($connection, $sql);

$queryResults = mysqli_num_rows($result);

if ($queryResults > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		//echo "You are a sig leader here! Welcome!";
		$access_code = $row['attendance_name'];
		$datetime_open_attendance = $row['datetime_open_attendance'];
	
	}
	
} else {
	
	echo '<script>window.location.href = "hub.php?error=Failed to load attendance";</script>';
}
	





?>


	      <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
					<?php	
						
                      echo "<h4>Attendance for ". $sig_name ." -". $datetime_open_attendance ."</h4>"
						
					?>	
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px; padding-right:20px;">
						
						<form method="post">
													
													
													
													<br>
							<input type="text" name='attendance' placeholder="Enter Attendance Code" class='form-control' required>
							
							<br>
							<br>
													<button class="btn btn-success" name='submit' type="submit" value='submit'>This equipment to the project</button>
												</form>
						
						<br>

												
												<?php
												//If the post button was made and the code was correct

												if ( isset( $_POST[ 'attendance' ] ) == $access_code & !empty( $_POST[ 'submit' ] ) ) {
													
													//Update the student's attendance and record IP
													$sql = "UPDATE attendance_status SET status = 'present', ip_address_attendance = '$ip' WHERE sig_name = '$sig_name' AND studentid = '$id'";
													
													$result = mysqli_query($connection, $sql);
													
													if($result) {
													//If the update worked then redirect
													echo '<script>window.location.href = "hub.php?success=attendance updated";</script>';	
														
														
													} else {
													//If it didn't work then give the error message	
													echo '<script>window.location.href = "hub.php?error=Something went very wrong!!";</script>';
														
													}
													

												}else {

												}
						
						
												?>
						
						
						
					</div>
					</div>
			  </div>











</body>
</html>