<?php include 'hubheader.php';


$name = mysqli_real_escape_string( $connection, $_GET[ 'name' ] );
								
//$eq_id = mysqli_real_escape_string( $connection, $_GET[ 'id' ] );

$projectid = mysqli_real_escape_string( $connection, $_GET[ 'id' ] );




if (isset($name) & !empty($name) & isset($projectid) &  !empty($projectid)) {
	
	
	$removeeqsql = "DELETE FROM students_in_projects WHERE projectid = '$projectid' AND studentid = '$id';";
	
	$removestudentsresult = mysqli_query( $connection, $removeeqsql );
							if ( $removestudentsresult ) {
								//echo "Entry successfully Removed";
								echo '<script>window.location.href = "hub.php?success=Successfully removed!";</script>';
								
								
								//echo '<script>window.location.href = "adminmodifyproject.php?success=Successfully Removed!";</script>';	


							} else {
								//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
								//echo "Entry failed to be removed";
								echo $removeeqsql;
								//echo '<script>window.location.href = "hub.php?error=something went wrong!";</script>';
							}

						
						
	
	
} else {
	
	echo "Hiiii";
}





?>



</body>
</html>