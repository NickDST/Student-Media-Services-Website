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
								
$eq_id = mysqli_real_escape_string( $connection, $_GET[ 'eq_id' ] );

$sig_name = mysqli_real_escape_string( $connection, $_GET[ 'signame' ] );

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Adding Equipment</title>
</head>

<body>

	
	
	      <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Adding Equipment to Project</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px; padding-right:20px;">
							<?php
								
							//	echo $projectid;
								$sql = "SELECT * FROM eqcatalog WHERE eq_id = '$eq_id'";
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										echo "
				<div>
					<h3>" . $row[ 'eq_name' ] . "</h3>
					<p>" . $row[ 'eq_description' ] . "</p>
					
				</div>
				<hr>";
									}


								}


								?>
						
					
			
						
						
						
						
						
						
						
						
							<form method="post">
													
													
													
												
													<button class="btn btn-success" name='add' type="submit" value='add'>This equipment to the project</button>
												</form>

												<!--Adding a student to the project-->
												<?php

												if ( isset( $_POST[ 'add' ] ) == 'add' & !empty( $_POST[ 'add' ] ) ) {
													
														

													$alreadysql = "SELECT * FROM students_in_eq WHERE eq_id = '$eq_id' AND studentid = '$certify_student'";
													//echo $alreadysql;
													$alreadyresult = mysqli_query( $connection, $alreadysql );
													$alreadyqueryResults = mysqli_num_rows( $alreadyresult );
													
													
													if ( $alreadyqueryResults == 0 ) {

													


														$addstudentsql = "INSERT INTO students_in_eq (eq_id, studentid, certified_by, sig_certified) VALUES ('$eq_id', '$certify_student', '$studentid', '$sig_name');";
														//echo $addstudentsql;


														

														$addstudentresult = mysqli_query( $connection, $addstudentsql );
														if ( $addstudentresult ) {
															//echo "Entry successfully added";
															echo '<script>window.location.href = "hub.php?success=Entry added";</script>';	
															


														} else {
															//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
															//echo "Entry failed to be added";
															echo '<script>window.location.href = "hub.php?error=Entry failed to be added";</script>';	
														}

													} else {
														echo '<script>window.location.href = "hub.php?error=Student already has access to this";</script>';	
														//echo "student is already in the project";
													}
													
												}
												?>
						<br>
						
						
						
						
						
						
                        
                    </div>
                </div>
                <!-- /# card -->
            </div>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

	
	
	
	
	
	
</body>
</html>














</body>
</html>