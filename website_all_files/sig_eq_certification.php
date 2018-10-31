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


?>



<div class="col-xl-9">
	<div class="card">
		<div class="card-header">

			<h2> Certify this Student in Equipment </h2>
		</div>
		<div class="" style="padding-left:20px; padding-top:10px ; padding-right:20px;">


			<?php

			$sql = "SELECT students.*, students_in_sigs.* FROM students_in_sigs, students WHERE students_in_sigs.studentid = students.studentid AND students.studentid = '$certify_student' AND students_in_sigs.sig_name = '$sig_name'";


			$result = mysqli_query( $connection, $sql );

			$queryResults = mysqli_num_rows( $result );

			if ( $queryResults > 0 ) {
				while ( $row = mysqli_fetch_assoc( $result ) ) {
					$viewed_student_id = $row['studentid'];

					?>

			<h4>
				<?php echo "Student Name: ". $row['name'];?>
			</h4>
		
			<br>
			<h4>
				<?php echo "Position: ". $row['sig_position'];?>
			</h4>
			<hr>

			<?php



			}

			}?>
			
			<h2>List of Equipment Student has access to: </h2>
			<br>
			<table class="table table-light project-table table-hover">
				<tr style="background-color:ghostwhite;">
										<th>EQ Name</th>
										<th>EQ Code</th>
										<th>SIG Certified In</th>
										<th>Certified By</th>

									</tr>
									<?php

		
									//$sql = "SELECT project_list.*, students.* from project_list, students WHERE project_list.student_rep = students.studentid";
				
									$sql = "SELECT students_in_eq.*, students.*, eqcatalog.* FROM students_in_eq, students, eqcatalog WHERE students_in_eq.studentid = students.studentid AND eqcatalog.eq_id = students_in_eq.eq_id AND students_in_eq.studentid = '$certify_student'";
		
		
		
									$result = mysqli_query( $connection, $sql );

//
									$resultCheck = mysqli_num_rows( $result );
									if ( $resultCheck > 0 ) {
										while ( $row = mysqli_fetch_assoc( $result ) ) {

										





											echo "<tr>
    <td>" . $row[ "eq_name" ] . "</td>
    <td>" . $row[ "eq_code" ] . "</td>
    <td>" . $row[ 'sig_certified' ] . "</td>
    <td>" . $row[ "certified_by" ] . "</td>
 

    </tr>";

										}

										echo "</table>";
									} else {
										echo "0 results";
									}
									//$hours = "0";
	
									?>


<br>




		</div>
	</div>

</div>

<div class="col-xl-3" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Search for a Project</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
						<p>Scroll Down to find the list of equipment you can certify for this sig.</p>
						
				
						<label for="">Or...Remove Access to Equipment</label>
						<br>
						
						<form method="POST">
						<button type="submit" name="remove_eq" class = 'btn btn-success'>Remove EQ</button>
						</form>
						
						<?php 
						
						if(isset($_POST['remove_eq']) & !empty(isset($_POST['remove_eq']))){
							
								echo "<script>window.location.href =  'removeeq_for_student.php?studentid=" . $certify_student . "&signame=" . $sig_name . "';</script>;";
								
								//echo '<script>window.location.href = "addselfproject2.php?success=Entry added";</script>';	
	
							}

						
						
						
						?>
						
	
	
						
						<br>
	
	      
                    </div>
                </div>
                <!-- /# card -->
            </div>

	      <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h3>List of Equipment to certify</h3>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
						
							
						
						
						
						
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
	<form method="post">
						
						
							<?php
								//$sql = "SELECT eqcatalog.*, eq_in_sigs.* FROM eqcatalog, eq_in_sigs WHERE eq_in_sigs.eq_id = eqcatalog.eq_id AND eq_in_sigs.sig_name = '$sig_name'";
						$checkbox = "checkbox";
						$eqarray = "eqarray[]";
						$space = " Certify this piece of equipment ";
						
								$sql = "SELECT * FROM eqcatalog";
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										
																echo "
				
					<h3>" . $row[ 'eq_name' ] . "</h3>
					<p>" . $row[ 'eq_description' ] . "</p>
				
				
				<input type=". $checkbox. " name=".$eqarray ." value=".  $row['eq_id'] ." <span>".$space."<span>
				
				<br><br><a class = 'btn btn-secondary' href = 'change_eq_sig_all.php?studentid=" . $certify_student . "&eq_id=" . $row[ 'eq_id' ] . "&signame=" . $sig_name . "'> Add EQ for everyone</a>
				<hr>";
									}


								} else {
									
									echo "nothing here";
								}	?>
										
						<br>
													<button class="btn btn-success" name='certify_equipment' type="submit" value='certify_equipment'>Certify the select equipment</button>
		
												</form>
												<br>
						<br>

												<!--Adding a student to the project-->
												<?php

												if ( isset( $_POST[ 'certify_equipment' ] ) == 'certify_equipment' & !empty( $_POST[ 'certify_equipment' ] ) ) {
													
													 $aEquipment = $_POST['eqarray'];
													
													if(empty($aEquipment)) 
  {
    
	$error = "You didnt select anything";
	 echo "<script>window.location.href =  'altersiginfo.php?error=" . $error . "&name=". $sig_name. "';</script>;";
														
														
  } 
  else 
  {
    $N = count($aEquipment);

    echo("You selected $N door(s): ");
    for($i=0; $i < $N; $i++)
    {
      //echo($aStudent[$i] . " ");
		

		
													
													$alreadysql = "SELECT * FROM students_in_eq WHERE eq_id = '$aEquipment[$i]' AND studentid = '$certify_student'";
													//echo $alreadysql;
													$alreadyresult = mysqli_query( $connection, $alreadysql );
													$alreadyqueryResults = mysqli_num_rows( $alreadyresult );
													
													
													if ( $alreadyqueryResults == 0 ) {

													
														$addstudentsql = "INSERT INTO students_in_eq (eq_id, studentid, certified_by, sig_certified) VALUES ('$aEquipment[$i]', '$certify_student', '$studentid', '$sig_name');";
														
														$addstudentresult = mysqli_query( $connection, $addstudentsql );
													
													
													}
													
													
													
												
													// - - - - -- - - -- - - - - - 
													
													
														
													
													
		
    }
	  $success = "Possibly Worked";
	 echo "<script>window.location.href =  'altersiginfo.php?success=" . $success . "&name=". $sig_name. "';</script>;";
	  
	  
  }				
										
												}
						
										
							
										
										
										/*
										
										echo "
				<div>
					<h3>" . $row[ 'eq_name' ] . "</h3>
					<p>" . $row[ 'eq_description' ] . "</p>
				</div>
				<a class = 'btn btn-success' href = 'addeq_for_student.php?studentid=" . $certify_student . "&eq_id=" . $row[ 'eq_id' ] . "&signame=" . $sig_name . "'>Add This equipment</a>
				
				<a class = 'btn btn-secondary' href = 'change_eq_sig_all.php?studentid=" . $certify_student . "&eq_id=" . $row[ 'eq_id' ] . "&signame=" . $sig_name . "'>Add EQ for everyone</a>
				<hr>";
									}


								} else {
									
									echo "nothing here";
								}
*/
								?>
						
						
						
						
						
						
						
                        
                    </div>
                </div>
                <!-- /# card -->
            </div>

<div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h3>DELETE THIS STUDENT</h3>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px; padding-right:10px;">
						<h2>Permanently Remove this person from the SIG</h2>
						<br>
						<div class="alert alert-danger" role="alert">
							WARNING: This will remove the Student from this SIG. The equipment certified will stay certified. 
						</div>
						<br>
						
						
							
						
						
						
						
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
	
						
						<form method="POST">
						<button type="submit" name="remove_student_from_sig" class = 'btn btn-danger'>REMOVE THE STUDENT FROM THIS SIG</button>
						</form>
						
						<?php 
						
						if(isset($_POST['remove_student_from_sig']) & !empty(isset($_POST['remove_student_from_sig']))){
							
								echo "<script>window.location.href =  'remove_student_from_sig.php?remove_studentid=" . $viewed_student_id . "&signame=" . $sig_name . "';</script>;";
								
								//echo '<script>window.location.href = "addselfproject2.php?success=Entry added";</script>';	
	
							}

						?>
					<br>
						
						
						
                        
                    </div>
                </div>
                <!-- /# card -->
            </div>





</body>
</html>