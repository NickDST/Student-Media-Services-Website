<?php include 'hubheader.php' ;
include ( 'emailheader.php' );
?>

     <div class="col-xl-10" >
                <div class="card" >
                    <div class="card-header">
                        <h4>This is the search result boi. I tried my best hopefully you found it.  </h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
							<?php
								if ( isset( $_POST[ 'submit-search' ] ) ) {
									$search = mysqli_real_escape_string( $connection, $_POST[ 'search' ] );
									$sql = "SELECT * FROM project_list WHERE project_name LIKE '%$search%' OR requestor_name LIKE '%$search%' OR description LIKE '%$search%' OR datetime_end LIKE '%$search%'";
									
									//echo $search;

									$result = mysqli_query( $connection, $sql );
									$queryResult = mysqli_num_rows( $result );

									//SELECT * FROM project_list WHERE type != 'tutor' AND (project_name LIKE '%nhs%' OR requestee LIKE '%nhs%' OR project_description LIKE '%nhs%' OR affiliated_group LIKE '%nhs%' OR datetime_start LIKE '%nhs%')


									echo "There are " . $queryResult . " results for '$search' <hr>";


									if ( $queryResult > 0 ) {
										while ( $row = mysqli_fetch_assoc( $result ) ) {
											echo "
				
					<div>
					<h3>" . $row[ 'project_name' ] . "</h3>
					<p>" . $row[ 'description' ] . "</p>
					<p>" . $row[ 'datetime_end' ] . "</p>
					<p> Requestor: " . $row[ 'requestor_name' ] . "</p>
					</div>
					<a class = 'btn btn-success' href = 'searchprojectdesc.php?name=" . $row[ 'project_name' ] . "&id=" . $row[ 'projectid' ] . "'>View Project Details</a>
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