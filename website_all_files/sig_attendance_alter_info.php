
<?php include 'hubheader.php';


if ( !isset( $_SESSION[ 'is_leadership' ] ) ) {
	header( 'Location: hub.php' );
	exit;
}

$studentid = $id;


	
$sig_name = mysqli_real_escape_string($connection, $_GET['sig_name']);
$open_attendance_id = mysqli_real_escape_string($connection, $_GET['open_attendance_id']);




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


<!--Set to Present-->
<div class="col-xl-12">
	<div class="card">
		<div class="card-header">

			<h2> Set to Present </h2>
		</div>
		<div class="" style="padding-left:20px; padding-top:10px ; padding-right:20px;">

			
						<form method="post">
					
							<br>
							<input type="number" class = 'form-control' required placeholder = "Student Number (e.g. 2019108)" name = 'student_number_present'>
							<br>
													<button class="btn btn-success" name='close' type="submit" value='close'>Set student to present</button>
												</form>
												<br>

												<!--Adding a student to the project-->
												<?php

												if ( isset( $_POST[ 'close' ] ) == 'close' & !empty( $_POST[ 'close' ] ) ) {
													
													$altering_studentid = mysqli_real_escape_string($connection, $_POST['student_number_present']);
													
													
													$sql = "UPDATE attendance_status SET status = 'present' WHERE open_session_id = '$open_attendance_id' AND studentid = '$altering_studentid'";	


													$result = mysqli_query($connection, $sql);
													
													if($result){
															echo '<script>window.location.href = "mysig.php?success=yay";</script>';

													}
												} ?>

		</div>
	</div>
	
</div>



<!--Set to Present-->
<div class="col-xl-12">
	<div class="card">
		<div class="card-header">

			<h2> Set to Absent </h2>
		</div>
		<div class="" style="padding-left:20px; padding-top:10px ; padding-right:20px;">

			
						<form method="post">
					
							<br>
							<input type="number" class = 'form-control' required placeholder = "Student Number (e.g. 2019108)" name = 'student_number_absent'>
							<br>
													<button class="btn btn-danger" name='absent' type="submit" value='absent'>Set student to present</button>
												</form>
												<br>

												<!--Adding a student to the project-->
												<?php

												if ( isset( $_POST[ 'absent' ] ) == 'absent' & !empty( $_POST[ 'absent' ] ) ) {
													
													$altering_studentid = mysqli_real_escape_string($connection, $_POST['student_number_absent']);
													
													
													$sql = "UPDATE attendance_status SET status = 'absent' WHERE open_session_id = '$open_attendance_id' AND studentid = '$altering_studentid'";	


													$result = mysqli_query($connection, $sql);
													
													if($result){
															echo '<script>window.location.href = "mysig.php?success=yay";</script>';

													}
												} ?> 
		</div>
	</div>
</div>





<!--Set to Present-->
<div class="col-xl-12">
	<div class="card">
		<div class="card-header">

			<h2> Set to Late </h2>
		</div>
		<div class="" style="padding-left:20px; padding-top:10px ; padding-right:20px;">

			
						<form method="post">
					
							<br>
							<input type="number" class = 'form-control' required placeholder = "Student Number (e.g. 2019108)" name = 'student_number_late'>
							<br>
													<button class="btn btn-warning" name='late' type="submit" value='late'>Set student to Late</button>
												</form>
												<br>

												<!--Adding a student to the project-->
												<?php

												if ( isset( $_POST[ 'late' ] ) == 'late' & !empty( $_POST[ 'late' ] ) ) {
													
													$altering_studentid = mysqli_real_escape_string($connection, $_POST['student_number_late']);
													
													
													$sql = "UPDATE attendance_status SET status = 'late' WHERE open_session_id = '$open_attendance_id' AND studentid = '$altering_studentid'";	

													$result = mysqli_query($connection, $sql);
													
													if($result){
															echo '<script>window.location.href = "mysig.php?success=yay";</script>';

													}
												} ?>

		</div>
	</div>
	
</div>


<!--Set to Present-->
<div class="col-xl-12">
	<div class="card">
		<div class="card-header">

			<h2> Set to Excused </h2>
		</div>
		<div class="" style="padding-left:20px; padding-top:10px ; padding-right:20px;">

			
	
						<form method="post">
					
							<?php 
							$sql = "SELECT students.*, attendance_status.* FROM students, attendance_status WHERE attendance_status.studentid = students.studentid AND attendance_status.open_session_id = '$open_attendance_id'";
							$result = mysqli_query($connection, $sql);
							
							$queryResults = mysqli_num_rows($result);
							
							if ($queryResults > 0) {
							while ($row = mysqli_fetch_assoc($result)) {?>
							    <input type="checkbox" name="student[]" value="<?php echo $row['studentid']; ?>" 
							 <span><?php echo " ". $row['name']; ?></span><br>


		
								
								
						<?php	}
							}
							
							?>
							
							
							
<!--							<input type="number" class = 'form-control' required placeholder = "Student Number (e.g. 2019108)" name = 'student_number_excused'>-->
							<br>
													<button class="btn btn-secondary" name='excused' type="submit" value='excused'>Set student to excused</button>
												</form>
												<br>

												<!--Adding a student to the project-->
												<?php

												if ( isset( $_POST[ 'excused' ] ) == 'excused' & !empty( $_POST[ 'excused' ] ) ) {
													
													 $aStudent = $_POST['student'];
													
													if(empty($aStudent)) 
  {
    echo("You didn't select any buildings.");
  } 
  else 
  {
    $N = count($aStudent);

    echo("You selected $N door(s): ");
    for($i=0; $i < $N; $i++)
    {
      //echo($aStudent[$i] . " ");
		
		$sql = "UPDATE attendance_status SET status = 'excused' WHERE open_session_id = '$open_attendance_id' AND studentid = '$aStudent[$i]'";	
		
		$result = mysqli_query($connection, $sql);
		
		
		
    }
	 echo "<script>window.location.href =  'sig_manage_attendance_view_session.php?open_attendance_id=" . $open_attendance_id . "&sig_name=". $sig_name. "';</script>;";
	  
  }

													
													
													
													
													/*
													$altering_studentid = mysqli_real_escape_string($connection, $_POST['student_number_excused']);
													
													
													$sql = "UPDATE attendance_status SET status = 'excused' WHERE open_session_id = '$open_attendance_id' AND studentid = '$altering_studentid'";	

													$result = mysqli_query($connection, $sql);
													
													if($result){
															echo '<script>window.location.href = "mysig.php?success=yay";</script>';

													}
													
													*/
												} ?>

		</div>
	</div>
	
</div>





















</body>
</html>