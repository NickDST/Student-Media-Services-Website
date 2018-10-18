<?php include 'hubheader.php';


if ( !isset( $_SESSION[ 'is_leadership' ] ) ) {
	header( 'Location: hub.php' );
	exit;
}

$studentid = $id;


	
$sig_name = mysqli_real_escape_string($connection, $_GET['name']);



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


<div class="col-xl-12">
	<div class="card">
		<div class="card-header">

			<h2> Sig Details</h2>
		</div>
		<div class="" style="padding-left:20px; padding-top:10px ; padding-right:20px;">
			
			
			
							<?php
						//echo $name;
							
								//$sql = "SELECT sigs.*, students_in_sigs.*, students.*, FROM students, students_in_sigs, sigs WHERE students.studentid = students_in_sigs.studentid AND sigs.sig_name = students_in_sigs.sig_name, sigs.sig_name = '$name'";
								$sql = "SELECT * FROM sigs where sig_name = '$sig_name'";
									
									//echo $sql;
								$result = mysqli_query( $connection, $sql );
								

								while ( $siginfo = $result->fetch_assoc() ):	?>
									

								<?php echo "<h3>". $siginfo['sig_name'] ."</h3><br>";?>
								
						
								<?php echo "Description: ".$siginfo['sig_desc'];?>
								<br>
								
						
								<?php
								endwhile;
									
							 ?>
						<br>
			
							
						<?php
						//echo $name;
							
								//$sql = "SELECT sigs.*, students_in_sigs.*, students.*, FROM students, students_in_sigs, sigs WHERE students.studentid = students_in_sigs.studentid AND sigs.sig_name = students_in_sigs.sig_name, sigs.sig_name = '$name'";
								$sql = "SELECT sigs.*, students_in_sigs.*, students.* FROM students, students_in_sigs, sigs WHERE students.studentid = students_in_sigs.studentid AND sigs.sig_name = students_in_sigs.sig_name AND sigs.sig_name = '$sig_name' AND students_in_sigs.sig_position = 'Leader'";
									
									//echo $sql;
								$result = mysqli_query( $connection, $sql );
								

								while ( $siginfo = $result->fetch_assoc() ):	?>
									

								<?php echo "Leader: ". $siginfo['name'];?>
								
								<?php
								endwhile;
									
							 ?>
						<br>
						<br>
						
						
						
						<h4>List of Members:</h4>
						
						
						<?php
						//echo $name;
							
								//$sql = "SELECT sigs.*, students_in_sigs.*, students.*, FROM students, students_in_sigs, sigs WHERE students.studentid = students_in_sigs.studentid AND sigs.sig_name = students_in_sigs.sig_name, sigs.sig_name = '$name'";
								$sql = "SELECT sigs.*, students_in_sigs.*, students.* FROM students, students_in_sigs, sigs WHERE students.studentid = students_in_sigs.studentid AND sigs.sig_name = students_in_sigs.sig_name AND sigs.sig_name = '$sig_name'";
									
									//echo $sql;
								$result = mysqli_query( $connection, $sql );
								

								while ( $siginfo = $result->fetch_assoc() ):	?>
									

								<?php echo $siginfo['name'];?>
								<span>, Role: </span>
						
								<?php echo $siginfo['sig_position'];?>
								<br>
						
								<?php
								endwhile;
									
							 ?>
			
			
			
			<br>
	
			
		</div>
	</div>
	
</div>






<div class="col-xl-12">
	<div class="card">
		<div class="card-header">

			<h2> Certify Equipment for Students in this SIG</h2>
		</div>
		<div class="" style="padding-left:20px; padding-top:10px ; padding-right:20px;">
			
<!--			<p>You can certify out of this list of equipment:</p>-->
			
			<?php 
			/*
			$sql = "SELECT eq_in_sigs.*, eqcatalog.* FROM eq_in_sigs, eqcatalog WHERE eq_in_sigs.sig_name = '$sig_name' AND eq_in_sigs.eq_id = eqcatalog.eq_id";
			
			$result = mysqli_query($connection, $sql);
			
			while($row = mysqli_fetch_assoc($result)) {
				
				echo $row['eq_name'];
				echo "<br>";
				
				
			}
			*/
			?>
			<br>
			
			<h3>People in this SIG</h3>
			<br>
			
						
						<form method="POST">
						<button type="submit" name="addeq" class = 'btn btn-warning'>...Add students into this sig</button>
						</form>
						<br>
						<?php 
						
						if(isset($_POST['addeq']) & !empty(isset($_POST['addeq']))){
							
								echo "<script>window.location.href =  'sig_add_student.php?sig_name=" . $sig_name . "';</script>;";
								
								//echo '<script>window.location.href = "addselfproject2.php?success=Entry added";</script>';	
	
							}

						
						
						
						?>
			
			
			<hr>
			
			
			<?php
			
	
			
								$sql = "SELECT sigs.*, students_in_sigs.*, students.* FROM sigs, students_in_sigs , students WHERE sigs.sig_name = students_in_sigs.sig_name AND sigs.sig_name = '$sig_name' AND students.studentid = students_in_sigs.studentid";
			
//			echo $sql;
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										
										
										
										echo "
				<div>
					<h3>" . $row[ 'name' ] . "</h3>
					<p>" . $row[ 'position' ] . "</p>
				</div>
				<a class = 'btn btn-success' href = 'sig_eq_certification.php?studentid=" . $row[ 'studentid' ] . "&signame=" . $sig_name ."'>Certify Equipment + Student Info</a>
				<hr>";
									}


								} else {
									
									echo "nothing here";
								}

								?>
			
			<br>
			
			
			
		</div>
	</div>
	
</div>
















</body>
</html>