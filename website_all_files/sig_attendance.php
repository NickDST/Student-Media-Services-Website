<?php include 'hubheader.php'?>


	      <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Currently Open Attendance List</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
							<?php
								$sql = "SELECT attendance_status.*, open_attendance.* FROM attendance_status, open_attendance WHERE attendance_status.open_session_id = open_attendance.open_attendance_id AND
								attendance_status.studentid = '$id' AND 
								open_attendance.open_attendance_status = 'open' AND attendance_status.status = 'absent'
								";


								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										
										
										
										echo "
				<div>
					<h3>" . $row[ 'sig_name' ] . "</h3>
					<p>" . $row[ 'datetime_open_attendance' ] . "</p>
				</div>
				<a class = 'btn btn-success' href = 'sig_attendance_confirm.php?sig_name=" . $row[ 'sig_name' ] . "&open_attendance_id=". $row[ 'open_attendance_id' ]."'>Sign Up For Attendance</a>
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

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

</body>
</html>