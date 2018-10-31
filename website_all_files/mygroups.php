<?php include 'hubheader.php'?>



 <div class="col-xl-11" style = "margin-left:15px;">
                <div class="card" >
                    <div class="card-header">
                        <h4>My SIGs</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px; padding-right:20px;">
						
						<h2></h2>		
						
						<?php
							$studentsql = "SELECT students.*, students_in_sigs.*, sigs.* FROM students, students_in_sigs, sigs WHERE students.studentid = students_in_sigs.studentid AND students_in_sigs.sig_name = sigs.sig_name AND students.studentid = '$id'";
								$resultsql = mysqli_query( $connection, $studentsql );



								$resultCheck = mysqli_num_rows( $resultsql );


								if ( $resultCheck > 0 ) {

									while ( $siginfo = $resultsql->fetch_assoc() ):


										?>

						<strong><?php echo $siginfo['sig_name'];?></strong> <br>
								<?php echo "Position: ".$siginfo['sig_position'];?> <br>

								
								<br>



								<!-- End While for project ID -->
								<?php endwhile; 
				} else {
					echo "No Projects Entered Yet";
				}
				?>
						
						
						
						
						
                        
                    </div>
                </div>
                <!-- /# card -->
            </div>





 <div class="col-xl-11" style = "margin-left:15px;">
                <div class="card" >
                    <div class="card-header">
                        <h4>The Projects</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px; padding-right:20px;">
						
						<h2></h2>		
						
						
						<?php
							$studentsql = "SELECT project_list.*, students_in_projects.*, students.* FROM project_list, students_in_projects, students WHERE students.studentid = students_in_projects.studentid AND students_in_projects.projectid = project_list.projectid AND students.studentid = '$id'";
								$resultsql = mysqli_query( $connection, $studentsql );



								$resultCheck = mysqli_num_rows( $resultsql );


								if ( $resultCheck > 0 ) {

									while ( $projectinfo = $resultsql->fetch_assoc() ):


										?>

						<strong><?php echo $projectinfo['project_name'];?></strong> <br>
								<?php echo "Requestor: ".$projectinfo['requestor_name'];?> <br>

								<?php echo "Service hours: ".$projectinfo['service_hours'];?> hours -
								<?php echo nl2br($projectinfo['role']."\r\n");?>
								<br>



								<!-- End While for project ID -->
								<?php endwhile; 
				} else {
					echo "No Projects Entered Yet";
				}
				?>
						
						
						
						
						
						
                        
                    </div>
                </div>
                <!-- /# card -->
            </div>





 <div class="col-xl-11" style = "margin-left:15px;">
                <div class="card" >
                    <div class="card-header">
                        <h4>Extra Stuff</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px; padding-right:20px;">
						
						<h2></h2>		
						
						
						
						
						
						
                        
                    </div>
                </div>
                <!-- /# card -->
            </div>






</body>
</html>