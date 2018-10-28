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
	


$sql = "SELECT * FROM open_attendance WHERE sig_name_attendance = '$sig_name' AND open_attendance_status = 'open'";


$result = mysqli_query($connection, $sql);

$queryResults = mysqli_num_rows($result);

if ($queryResults > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		
		$open_attendance_id = $row[ 'open_attendance_id' ];
		
		echo "<script>window.location.href =  'sig_manage_attendance_close_session.php?open_attendance_id=" . $open_attendance_id . "&sig_name=". $sig_name. "';</script>;";
		
	}
	
	
} else {
	
	
}


	
?>

	      <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Create New Attendance Run</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">

						
					<form method="POST">
						<button type="submit" name="addeq" class = 'btn btn-secondary'>Open New Session</button>
						</form>
						<br>
						<?php 
						
						if(isset($_POST['addeq']) & !empty(isset($_POST['addeq']))){
							
								echo "<script>window.location.href =  'sig_manage_attendance_create_session.php?sig_name=" . $sig_name . "';</script>;";
								
								//echo '<script>window.location.href = "addselfproject2.php?success=Entry added";</script>';	
	
							}

						
						
						
						?>
						
	      
                    </div>
                </div>
                <!-- /# card -->
            </div>









   <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Prior Attendance Runs</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
							<?php
								$sql = "SELECT * FROM open_attendance WHERE sig_name_attendance = '$sig_name'";
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										
										
										
										echo "
				<div>
					<h3>" . $row[ 'attendance_name' ] . "</h3>
					<p>" . $row[ 'datetime_open_attendance' ] . "</p>
					<p>Status: " . $row[ 'open_attendance_status' ] . "</p>
				</div>
				<a class = 'btn btn-success' href = 'sig_manage_attendance_view_session.php?open_attendance_id=" . $row[ 'open_attendance_id' ] . "&sig_name=". $sig_name. "'>View Project Details</a>
				<hr>";
										
									}


								} else {
									
									echo "<h3>No Previous Attendance Runs Recorded</h3><br>";
								}

								?>
						
						
						
						
                        
                    </div>
                </div>
                <!-- /# card -->
            </div>


















</body>
</html>