<?php

include('hubheader.php');



if ( !isset( $_SESSION[ 'is_leadership' ] ) ) {
	header( 'Location: hub.php' );
	exit;
}

$studentid = $id;


	
$sig_name = mysqli_real_escape_string($connection, $_GET['sig_name']);
$add_studentid = mysqli_real_escape_string($connection, $_GET['add_studentid']);








if (isset($sig_name) & !empty($sig_name) & isset($add_studentid) & !empty($add_studentid)) {	
	
$sql = "SELECT * FROM students_in_sigs WHERE sig_name = '$sig_name' AND studentid = '$studentid' AND sig_position = 'Leader'";	
$result = mysqli_query($connection, $sql);
$queryResults = mysqli_num_rows($result);
	
							if ( $queryResults > 0 ) {
								
								
								$sql = "SELECT * FROM students_in_sigs WHERE sig_name = '$sig_name' AND studentid = '$add_studentid'";	


								$result = mysqli_query($connection, $sql);

								$student_in_sig_queryResults = mysqli_num_rows($result);
		
								
								if($student_in_sig_queryResults == 0) {
									
									$sql = "INSERT INTO students_in_sigs (studentid, sig_name, sig_position) VALUES ('$add_studentid', '$sig_name', 'member');";



								$result = mysqli_query( $connection, $sql );

								if ( $result ) {
		
								//echo "succes";
									//echo '<script>window.location.href = "mysig.php?success=student has been added to the sig!;</script>';
									echo '<script>window.location.href = "mysig.php?success=student has been added!";</script>';
		
								} else {
									echo "something went wrong";
									echo '<script>window.location.href = "hub.php?error=something went wrong!";</script>';
									
								}
									
									
									
									
								}else{
									echo "student is already in the sig.";
								}
								
								
								
								
								
								//echo "Entry successfully Removed";
								//echo '<script>window.location.href = "hub.php?success=Success!";</script>';
								
								//echo '<script>window.location.href = "adminmodifyproject.php?success=Successfully Removed!";</script>';	


							}else{
								echo "You are not a sig leader";
								echo '<script>window.location.href = "hub.php?error=You are not a sig leader!";</script>';
								
							}
	
	

						
						
	
	
	
	
	
	
	
} else {
	
	echo "Hiiii";
}








?>