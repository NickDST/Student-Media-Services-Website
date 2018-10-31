<?php include 'hubheader.php';


if ( !isset( $_SESSION[ 'is_leadership' ] ) ) {
	header( 'Location: hub.php' );
	exit;
}


$sig_name = mysqli_real_escape_string( $connection, $_GET[ 'signame' ] );
								
$eq_id = mysqli_real_escape_string( $connection, $_GET[ 'eq_id' ] );

$certify_student = mysqli_real_escape_string( $connection, $_GET[ 'studentid' ] );



$sql = "SELECT * FROM students_in_sigs WHERE sig_name = '$sig_name' AND studentid = '$id' AND sig_position = 'Leader'";


$result = mysqli_query( $connection, $sql );

$queryResults = mysqli_num_rows( $result );

if ( $queryResults > 0 ) {
	while ( $row = mysqli_fetch_assoc( $result ) ) {
		//echo "You are a sig leader here! Welcome!";
	}

} else {

	echo '<script>window.location.href = "hub.php?error=You are not the leader of this sig";</script>';
}


if (isset($sig_name) & !empty($sig_name) & isset($eq_id) & !empty($eq_id) & isset($certify_student) &  !empty($certify_student)) {
	
	
	$removeeqsql = "DELETE FROM students_in_eq WHERE eq_id = $eq_id AND studentid = $certify_student;";
	
	$removestudentsresult = mysqli_query( $connection, $removeeqsql );
							if ( $removestudentsresult ) {
								//echo "Entry successfully Removed";
								echo '<script>window.location.href = "hub.php?success=Success!";</script>';
//								echo '<script>window.location.href = "hub.php?success=Successfully Removed!";</script>';	


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