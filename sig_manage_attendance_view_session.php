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
						<p>Number of people present: </p>
<!--Number of people who are absent-->
						<p>Number of people absent: </p>
						
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

		
									$sql = "SELECT attendance_status.*, students.* from attendance_status, students WHERE attendance_status.studentid = students.studentid AND open_session_id = '$open_attendance_id' ORDER BY ip_address_attendance ASC";
		
		
		
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