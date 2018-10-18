<?php include 'hubheader.php';


$remove_studentid = mysqli_real_escape_string( $connection, $_GET[ 'remove_studentid' ] );
								
$signame = mysqli_real_escape_string( $connection, $_GET[ 'signame' ] );






if (isset($remove_studentid) & !empty($remove_studentid) & isset($signame) & !empty($signame)) {
	
	
	$removeeqsql = "DELETE FROM students_in_sigs WHERE studentid = '$remove_studentid' AND sig_name = '$signame';";
	
	$removestudentsresult = mysqli_query( $connection, $removeeqsql );
							if ( $removestudentsresult ) {
								//echo "Entry successfully Removed";
								//echo '<script>window.location.href = "hub.php?success=Success!";</script>';
								echo '<script>window.location.href = "adminmodifyproject.php?success=Successfully Removed!";</script>';	


							} else {
								//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
								//echo "Entry failed to be removed";
								//echo $removeeqsql;
								echo '<script>window.location.href = "hub.php?error=something went wrong!";</script>';
							}

						
						
	
	
} else {
	
	echo "Hiiii";
}





?>



</body>
</html>