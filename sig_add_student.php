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
                        <h4>Add student to this SIG</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
							<?php
								$sql = "SELECT * FROM students";
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										
										
										
										echo "
				<div>
					<h3>" . $row[ 'name' ] . "</h3>
					<p>" . $row[ 'studentid' ] . "</p>
				</div>
				<a class = 'btn btn-success' href = 'add_student_to_sig_function.php?sig_name=" . $sig_name . "&add_studentid=" . $row[ 'studentid' ] . "'>Add This Student</a>
				<hr>";
									}


								} else {
									
									echo "nothing here";
								}

								?>
						
						
						
						
                        
                    </div>
                </div>
                <!-- /# card -->
            </div>









</body>
</html>