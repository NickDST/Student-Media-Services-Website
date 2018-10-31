<?php
include 'hubheader.php';


if ( !isset( $_SESSION[ 'is_leadership' ] ) ) {
	header( 'Location: hub.php' );
	exit;
}

$studentid = $id;


$certify_student = mysqli_real_escape_string( $connection, $_GET[ 'studentid' ] );
$sig_name = mysqli_real_escape_string( $connection, $_GET[ 'signame' ] );



$sql = "SELECT * FROM students_in_sigs WHERE sig_name = '$sig_name' AND studentid = '$studentid' AND sig_position = 'Leader'";


$result = mysqli_query( $connection, $sql );

$queryResults = mysqli_num_rows( $result );

if ( $queryResults > 0 ) {
	while ( $row = mysqli_fetch_assoc( $result ) ) {
		//echo "You are a sig leader here! Welcome!";
	}

} else {

	echo '<script>window.location.href = "hub.php?error=You are not the leader of this sig";</script>';
}


$certify_student = mysqli_real_escape_string( $connection, $_GET[ 'studentid' ] );

$sig_name = mysqli_real_escape_string( $connection, $_GET[ 'signame' ] );

?>





	      <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Remove Equipment for  <?php echo $certify_student;?></h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
							<?php
								//$sql = "SELECT * FROM eqcatalog";
						$sql = "SELECT DISTINCT students.*, students_in_eq.*, eqcatalog.* FROM students, eq_in_projects,  students_in_eq, eqcatalog WHERE students_in_eq.studentid = students.studentid AND students_in_eq.studentid = '$certify_student' AND students_in_eq.eq_id = eqcatalog.eq_id";
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										
										
										
										echo "
				<div>
					<h3>" . $row[ 'eq_name' ] . "</h3>
					<p>" . $row[ 'eq_description' ] . "</p>
				</div>
				<a class = 'btn btn-success' href = 'removeeq_for_student2.php?signame=" . $sig_name . "&eq_id=" . $row[ 'eq_id' ] . "&studentid=" . $certify_student . "'>Remove this piece of equipment</a>
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