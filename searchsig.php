<?php include 'hubheader.php'?>
   
   	
	
	
	      <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h4>All SIGs</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
							<?php
								$sql = "SELECT * FROM sigs";
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										
										
										
										echo "
				<div>
					<h3>" . $row[ 'sig_name' ] . "</h3>
					<p>" . $row[ 'sig_desc' ] . "</p>
				</div>
				<a class = 'btn btn-success' href = 'sigdetails.php?name=" . $row[ 'sig_name' ] . "'>View SIG Details</a>
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