<?php include 'hubheader.php';

$name = mysqli_real_escape_string( $connection, $_GET[ 'name' ] );
?>


	      <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Sig Details</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px; padding-right:20px;">
						
						
							<?php
						//echo $name;
							
								//$sql = "SELECT sigs.*, students_in_sigs.*, students.*, FROM students, students_in_sigs, sigs WHERE students.studentid = students_in_sigs.studentid AND sigs.sig_name = students_in_sigs.sig_name, sigs.sig_name = '$name'";
								$sql = "SELECT * FROM sigs where sig_name = '$name'";
									
									//echo $sql;
								$result = mysqli_query( $connection, $sql );
								

								while ( $siginfo = $result->fetch_assoc() ):	?>
									

								<?php echo "<h3>". $siginfo['sig_name'] ."</h3>";?>
								
						
								<?php echo "Description: ".$siginfo['sig_desc'];?>
								<br>
								
						
								<?php
								endwhile;
									
							 ?>
						<br>
							
						<?php
						//echo $name;
							
								//$sql = "SELECT sigs.*, students_in_sigs.*, students.*, FROM students, students_in_sigs, sigs WHERE students.studentid = students_in_sigs.studentid AND sigs.sig_name = students_in_sigs.sig_name, sigs.sig_name = '$name'";
								$sql = "SELECT sigs.*, students_in_sigs.*, students.* FROM students, students_in_sigs, sigs WHERE students.studentid = students_in_sigs.studentid AND sigs.sig_name = students_in_sigs.sig_name AND sigs.sig_name = '$name' AND students_in_sigs.sig_position = 'Leader'";
									
									//echo $sql;
								$result = mysqli_query( $connection, $sql );
								

								while ( $siginfo = $result->fetch_assoc() ):	?>
									

								<?php echo "Leader: ". $siginfo['name'];?>
								
								<?php
								endwhile;
									
							 ?>
						<br>
						<br>
						
						
						
						
						
						
						<?php
						//echo $name;
							
								//$sql = "SELECT sigs.*, students_in_sigs.*, students.*, FROM students, students_in_sigs, sigs WHERE students.studentid = students_in_sigs.studentid AND sigs.sig_name = students_in_sigs.sig_name, sigs.sig_name = '$name'";
								$sql = "SELECT sigs.*, students_in_sigs.*, students.* FROM students, students_in_sigs, sigs WHERE students.studentid = students_in_sigs.studentid AND sigs.sig_name = students_in_sigs.sig_name AND sigs.sig_name = '$name'";
									
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
                <!-- /# card -->
            </div>

</body>
</html>