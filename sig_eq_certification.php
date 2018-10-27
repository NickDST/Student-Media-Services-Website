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
			<br>
			
			<?php

			$sql = "SELECT eqcatalog.*, students_in_eq.* FROM eqcatalog, students_in_eq WHERE eqcatalog.eq_id = students_in_eq.eq_id AND students_in_eq.studentid = '$certify_student'";


			$result = mysqli_query( $connection, $sql );

			$queryResults = mysqli_num_rows( $result );

			if ( $queryResults > 0 ) {
				while ( $row = mysqli_fetch_assoc( $result ) ) {

					?>

			<h5>
				<?php echo "Equipment Name: ". $row['eq_name'];?>
			</h5>
			
			<p>
				<?php echo "Description: ". $row['eq_description'];?>
			</p>
			<p>
				<?php echo "Certified in: ". $row['sig_certified'];?>
			</p>
			<hr>

			<?php


			}

			} else {
				
				echo "<h5>It Appears that the student does not have access to any equipment</h5>";
			
			
			
			}?>


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
	
						
						
							<?php
								//$sql = "SELECT eqcatalog.*, eq_in_sigs.* FROM eqcatalog, eq_in_sigs WHERE eq_in_sigs.eq_id = eqcatalog.eq_id AND eq_in_sigs.sig_name = '$sig_name'";
						
								$sql = "SELECT * FROM eqcatalog";
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										
										
										
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