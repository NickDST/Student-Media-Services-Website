<?php include 'hubheader.php'?>



			
      <div class="col-xl-12" >
                <div class="card" >
                    <div class="card-header">
						
                        <h2>HUHHHHHHHHH PAAIIIIIINNNN</h2>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
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
					<h3>" . $row[ 'request_name' ] . "</h3>
					<p>" . $row[ 'request_description' ] . "</p>
					<p>" . $row[ 'datetime_due' ] . "</p>
					<p>" . $row[ 'requestee_name' ] . "</p>
					<p>" . $row[ 'request_goal' ] . "</p>
					
				</div>
				<hr>";
									}


								}

								?>
						
						<h2>Create Project</h2>
 

	<form class="" method="POST">

											<br>

											<label for="">Name of Project</label>
											<br>
											<input type="text" name="project_name" class="form-control" placeholder="Name of Project" required maxlength=100>

											<br>
											<label for="">Name of Student Representative for this</label>
											<br>
											<input type="text" name="student_rep" id="" class="form-control" placeholder="ID of Student Rep" required maxlength=7>

											<br>

											<br>
											<label for="">Name of Responsible Adult</label>
											<br>
											<input type="text" name="teacher_name" id="" class="form-control" placeholder="ie. Darren Jones" required maxlength=100>
											<br>
											<label for="">Email of Responsible Adult</label>
											<br>
											<input type="email" name="teacher_contact" id="" class="form-control" placeholder="nick@concordiashanghai.org" required maxlength=100>

											
											<br>
											<br>
											<label for="">Detailed Description</label>
											<div class="form-group">
												<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="project_description" placeholder="A Detailed Description" required maxlength=500 style = "resize:none;" ></textarea>
											</div>
											<br>
											<label for="">Enter in the Start date</label>
											<br>
											<input type="datetime-local" name="datetime_start" id="" class="form-control" placeholder="Start Date" required>
											<br>
											<label for="">Enter in the end date (if completed)</label>
											<br>
											<input type="datetime-local" name="datetime_end" id="" class="form-control" placeholder="End Date">

											<br>



											<label for="">Affiliated Group</label>
											<br>
											<input type="text" name="affiliated_group" id="" class="form-control" placeholder="i.e SMS, NHS, SNHS" maxlength=100>

											<br>

											<label for="">Status?</label>
										
		<br>
											<select name="status" id="">
												<option value="completed">completed</option>
												<option value="ongoing">ongoing</option>
											</select>



											<br>
											
											<br>


											<button class="btn btn-success" type="submit">submit</button>
		<br>
		<br>



										</form>


						
						
                    </div>
                </div>
                <!-- /# card -->
            </div>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->










</body>
</html>