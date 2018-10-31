<?php include 'hubheader.php';


$name = mysqli_real_escape_string( $connection, $_GET[ 'name' ] );
								
$eq_id = mysqli_real_escape_string( $connection, $_GET[ 'eq_id' ] );

$projectid = mysqli_real_escape_string( $connection, $_GET[ 'projectid' ] );




if (isset($name) & !empty($name) & isset($eq_id) & !empty($eq_id) & isset($projectid) &  !empty($projectid)) {
	
	
	$removeeqsql = "DELETE FROM eq_in_projects WHERE eq_id = $eq_id AND projectid = $projectid;";
	
	$removestudentsresult = mysqli_query( $connection, $removeeqsql );
							if ( $removestudentsresult ) {
								//echo "Entry successfully Removed";
								echo '<script>window.location.href = "hub.php?success=Success!";</script>';
								//echo '<script>window.location.href = "adminmodifyproject.php?success=Successfully Removed!";</script>';	


							} else {
								//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
								//echo "Entry failed to be removed";
								echo '<script>window.location.href = "hub.php?error=something went wrong!";</script>';
							}

						
						
	
	
} else {
	
	echo "Hiiii";
}





?>



</body>
</html>