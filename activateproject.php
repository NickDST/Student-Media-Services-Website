<?php include 'hubheader.php'?>




<div class="col-xl-12">
	<div class="card">
		<div class="card-header">

			<h2> Activate the project </h2>
		</div>
		<div class="" style="padding-left:20px; padding-top:10px ; padding-right:20px;">
			<?php
			$name = mysqli_real_escape_string( $connection, $_GET[ 'name' ] );
			$request_id = mysqli_real_escape_string( $connection, $_GET[ 'id' ] );
			//	echo $projectid;
			$sql = "SELECT * FROM requests WHERE request_name = '$name' AND request_id = '$request_id'";
			$result = mysqli_query( $connection, $sql );
			$queryResults = mysqli_num_rows( $result );
			if ( $queryResults > 0 ) {
				while ( $row = mysqli_fetch_assoc( $result ) ) {
					
					
					
					echo "
				<div>
					<h2>" . $row[ 'request_name' ] . "</h2>
					<p>" . $row[ 'request_description' ] . "</p>
					<p>" . $row[ 'datetime_due' ] . "</p>
					<p>" . $row[ 'requestor_name' ] . "</p>
					<p>" . $row[ 'request_goal' ] . "</p>
					<p>" . $row[ 'keep_raw' ] . "</p>
					
				</div>
				<hr>";
					
				 $thing = $row[ 'request_name' ];
				 $keep_raw = $row['keep_raw'];
				 $description = $row['request_description'];
				 $request_name = $row['requestor_name'];
				 $request_goal = $row['request_goal'];
				 $datetime_due = $row['datetime_due'];
					
				
			
				}
				


			}


			?>
			
			


			<h2>Create Project</h2>
			
			


			<form class="" method="POST">
				
				

				

				

				<br>
				<label for="">Name of Student Representative for this</label>
				<br>
				<input type="text" name="student_rep" id="" class="form-control" placeholder="ID of Student Rep" required maxlength=7>

				<br>

				<br>
				<label for="">Name of Responsible Adult</label>
				<br>
				<input type="text" name="adult_name" id="" class="form-control" placeholder="ie. Darren Jones" required maxlength=100>
				<br>
				<label for="">Email of Responsible Adult</label>
				<br>
				<input type="email" name="adult_contact" id="" class="form-control" placeholder="nick@concordiashanghai.org" required maxlength=100>


				<br>
				<br>
				<label for="">Process Outline</label>
				<div class="form-group">
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="procedure_outline" placeholder="A Detailed Description" required maxlength=500 style="resize:none;"></textarea>
				</div>
				<br>
				<label for="">Enter in the Start date</label>
				<br>
				<input type="datetime-local" name="datetime_start" id="" class="form-control" placeholder="Start Date" required>
				<br>
				<label for="">Enter in the end date (if completed)</label>
				<br>
				<input type="date" name="datetime_end" id="" class="form-control" placeholder="End Date">

				<br>

				<br>

				<label for="">Status?</label>

				<br>
				<select name="status" id="">
					<option value="completed">completed</option>
					<option value="ongoing">ongoing</option>
				</select>



				<br>

				<br>


				<button class="btn btn-success" type="submit" value = "submit" name = "submit">submit</button>
				<br>
				<br>
				
			



			</form>
			
			


			<?php 
			//echo $thing;
			
			
			
			
						if ( isset( $_POST[ 'submit' ] ) == 'submit' & !empty( $_POST[ 'submit' ] ) ) {
							
							$project_name = mysqli_real_escape_string( $connection, $_POST[ 'project_name' ] );
							$student_rep = mysqli_real_escape_string( $connection, $_POST[ 'student_rep' ] );
							$adult_name = mysqli_real_escape_string( $connection, $_POST[ 'adult_name' ] );
							$adult_contact = mysqli_real_escape_string( $connection, $_POST[ 'adult_contact' ] );
							$procedure_outline = mysqli_real_escape_string( $connection, $_POST[ 'procedure_outline' ] );
							$datetime_start = mysqli_real_escape_string( $connection, $_POST[ 'datetime_start' ] );
							$datetime_end = mysqli_real_escape_string( $connection, $_POST[ 'datetime_end' ] );
							$status = mysqli_real_escape_string( $connection, $_POST[ 'status' ] );
							
							
							
								$sql = "INSERT INTO project_list (project_name, student_rep, adult_name, adult_contact, datetime_start, datetime_end, status, entered_by, procedure_outline) VALUES ('$project_name', '$student_rep', '$adult_name', '$adult_contact' , '$datetime_start' , '$datetime_end', '$status', '$id', '$procedure_outline');";

								echo $sql;

								$result = mysqli_query( $connection, $sql );
								if ( $result ) {
											//$smsg = "Entry successfully added";
									//echo '<script>window.location.href = "activateproject.php?success=Entry added";</script>';	
									echo "it works";
									
										$sql2 = "DELETE FROM requests WHERE request_id = '$request_id'";
									
									$result2 = mysqli_query( $connection, $sql2 );
									if ( $result2 ) {
										echo "success in removing the request";
										
										
										
										
									} else {
										echo "failed to remove request";
		
									}

		


								} else {
		//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
										//$fmsg .= "Entry failed to be added";
									
									echo "it failed somewhere";
									//echo '<script>window.location.href = "activateproject.php?error=Entry failed to be added";</script>';	
								}
							
							
							
							
							
							
							
							
						}
						
						
						?>







		</div>
	</div>
	<!-- /# card -->
</div>

</div> <!-- .content -->
</div> <!-- /#right-panel -->









</body>
</html>