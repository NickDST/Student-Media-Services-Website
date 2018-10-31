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
                        <h4>Adding Equipment to EVERYONE. ARE YOU SURE.</h4>
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
													
													
													$sql = "SELECT sigs.*, students_in_sigs.*, students.* FROM students, students_in_sigs, sigs WHERE students.studentid = students_in_sigs.studentid AND sigs.sig_name = students_in_sigs.sig_name AND sigs.sig_name = '$sig_name'";
													
													$result = mysqli_query( $connection, $sql );
								

													while ( $siginfo = $result->fetch_assoc() ):
													
													$certified_studentid = $siginfo['studentid'];
													
													
													
													
													$alreadysql = "SELECT * FROM students_in_eq WHERE eq_id = '$eq_id' AND studentid = '$certified_studentid'";
													//echo $alreadysql;
													$alreadyresult = mysqli_query( $connection, $alreadysql );
													$alreadyqueryResults = mysqli_num_rows( $alreadyresult );
													
													
													if ( $alreadyqueryResults == 0 ) {

													
														$addstudentsql = "INSERT INTO students_in_eq (eq_id, studentid, certified_by, sig_certified) VALUES ('$eq_id', '$certified_studentid', '$studentid', '$sig_name');";
														
														$addstudentresult = mysqli_query( $connection, $addstudentsql );
													
													
													}
													
													
													
													endwhile;
													// - - - - -- - - -- - - - - - 
													
													echo '<script>window.location.href = "mysig.php?success=Completed Hypothetical Sequence";</script>';
														
													
													
												}
												?>
						<br>
						
						
						
						
						
						
							<form method="post">
													
													
													
												
													<button class="btn btn-success" name='remove' type="submit" value='remove'>REMOVE FROM ALL</button>
												</form>

												<!--Adding a student to the project-->
												<?php

												if ( isset( $_POST[ 'remove' ] ) == 'remove' & !empty( $_POST[ 'remove' ] ) ) {
													
													
													$sql = "SELECT sigs.*, students_in_sigs.*, students.* FROM students, students_in_sigs, sigs WHERE students.studentid = students_in_sigs.studentid AND sigs.sig_name = students_in_sigs.sig_name AND sigs.sig_name = '$sig_name'";
													
													$result = mysqli_query( $connection, $sql );
								

													while ( $siginfo = $result->fetch_assoc() ):
													
													$certified_studentid = $siginfo['studentid'];
													
													
													
													
													$alreadysql = "SELECT * FROM students_in_eq WHERE eq_id = '$eq_id' AND studentid = '$certified_studentid'";
													//echo $alreadysql;
													$alreadyresult = mysqli_query( $connection, $alreadysql );
													$alreadyqueryResults = mysqli_num_rows( $alreadyresult );
													
													
													
													if ( $alreadyqueryResults == 0 ) {} else {
														$removeeqsql = "DELETE FROM students_in_eq WHERE eq_id = $eq_id AND studentid = $certified_studentid;";
	
														$removestudentsresult = mysqli_query( $connection, $removeeqsql );
													}
													
													
													
													endwhile;
													// - - - - -- - - -- - - - - - 
													
													echo '<script>window.location.href = "mysig.php?success=Completed Hypothetical Sequence";</script>';
														
													
													
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