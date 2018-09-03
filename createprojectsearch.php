<?php include 'hubheader.php' ?>

     <div class="col-xl-10" >
                <div class="card" >
                    <div class="card-header">
                        <h4>This is the search result boi. I tried my best hopefully you found it. </h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
							<?php
								if ( isset( $_POST[ 'submit-search' ] ) ) {
									$search = mysqli_real_escape_string( $connection, $_POST[ 'search' ] );
									$sql = "SELECT * FROM requests WHERE request_name LIKE '%$search%' OR requestee_name LIKE '%$search%' OR request_description LIKE '%$search%' OR datetime_due LIKE '%$search%'";
									
									//echo $search;

									$result = mysqli_query( $connection, $sql );
									$queryResult = mysqli_num_rows( $result );

									//SELECT * FROM project_list WHERE type != 'tutor' AND (project_name LIKE '%nhs%' OR requestee LIKE '%nhs%' OR project_description LIKE '%nhs%' OR affiliated_group LIKE '%nhs%' OR datetime_start LIKE '%nhs%')


									echo "There are " . $queryResult . " results <hr>";


									if ( $queryResult > 0 ) {
										while ( $row = mysqli_fetch_assoc( $result ) ) {
											echo "
				
					<div>
					<h3>" . $row[ 'request_name' ] . "</h3>
					<p>" . $row[ 'request_description' ] . "</p>
					<p>" . $row[ 'datetime_due' ] . "</p>
					</div>
					<a class = 'btn btn-success' href = 'activateproject.php?name=" . $row[ 'request_name' ] . "&id=" . $row[ 'request_id' ] . "'>Initiate this Project</a>
				<hr>";
											/*	<a href = 'confirmpending.php?name=".$row['requestee']."&startdate=".$row['datetime_start']."&id=".$row['requestid']."'>More Info
												</a> */

										}

									} else {
										echo "There are no results matching your search.";
									}
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