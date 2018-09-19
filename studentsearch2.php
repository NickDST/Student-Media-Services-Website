<?php include 'hubheader.php';
if ( !isset( $_SESSION[ 'is_leadership' ] ) ) {
	header( 'Location: hub.php' );
	exit;
}



?>

     <div class="col-xl-10" >
                <div class="card" >
                    <div class="card-header">
                        <h4>This is the search result boi. I tried my best hopefully you found it. </h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
							<?php
								if ( isset( $_POST[ 'submit-search' ] ) ) {
									$search = mysqli_real_escape_string( $connection, $_POST[ 'search' ] );
									$sql = "SELECT * FROM students WHERE name LIKE '%$search%' OR position LIKE '%$search%'";
									
									//echo $search;

									$result = mysqli_query( $connection, $sql );
									$queryResult = mysqli_num_rows( $result );



									echo "There are " . $queryResult . " results <hr>";


									if ( $queryResult > 0 ) {
										while ( $row = mysqli_fetch_assoc( $result ) ) {
											echo "
				
					<div>
					<h3>" . $row[ 'name' ] . "</h3>
					<p>" . $row[ 'position' ] . "</p>
					
					</div>
					<a class = 'btn btn-success' href = 'searchstudentdesc.php?name=" . $row[ 'name' ] . "&id=" . $row[ 'studentid' ] . "'>View Student</a>
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