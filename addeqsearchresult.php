<?php include 'hubheader.php';


$eq_name = mysqli_real_escape_string( $connection, $_GET[ 'name' ] );
								
$projectid = mysqli_real_escape_string( $connection, $_GET[ 'id' ] );

$eq_id = mysqli_real_escape_string( $connection, $_GET[ 'eq_id' ] );



?>



     <div class="col-xl-10" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Equipment Results</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
							<?php
								if ( isset( $_POST[ 'submit-search' ] ) ) {
									$search = mysqli_real_escape_string( $connection, $_POST[ 'search' ] );
									$sql = "SELECT * FROM eqcatalog WHERE eq_id LIKE '%$search%' OR eq_code LIKE '%$search%' OR eq_name LIKE '%$search%' OR eq_description LIKE '%$search%'";
									
									//echo $search;

									$result = mysqli_query( $connection, $sql );
									$queryResult = mysqli_num_rows( $result );

									//SELECT * FROM project_list WHERE type != 'tutor' AND (project_name LIKE '%nhs%' OR requestee LIKE '%nhs%' OR project_description LIKE '%nhs%' OR affiliated_group LIKE '%nhs%' OR datetime_start LIKE '%nhs%')


									echo "There are " . $queryResult . " results <hr>";


									if ( $queryResult > 0 ) {
										while ( $row = mysqli_fetch_assoc( $result ) ) {
											echo "
				
					<div>
					<h3>" . $row[ 'eq_name' ] . "</h3>
					<p>" . $row[ 'eq_description' ] . "</p>
					<p>" . $row[ 'eq_code' ] . "</p>
				
					</div>
					<a class = 'btn btn-success' href = 'addeq.php?name=" . $row[ 'eq_name' ] . "&eq_id=" . $row[ 'eq_id' ] . "&projectid=" . $projectid . "'>Add This equipment</a>
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