<?php include 'hubheader.php';

if ( !isset( $_SESSION[ 'is_leadership' ] ) ) {
	header( 'Location: hub.php' );
	exit;
}




?>


	      <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Search for a student</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
	<form action="studentsearch2.php" method="POST">
								<input type="text" name="search" placeholder="Search" maxlength=50>
								<button type="submit" name="submit-search">Submit</button>
							</form>
						
						<br>
	
	      
                    </div>
                </div>
                <!-- /# card -->
            </div>

	
	
	      <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h4>All Students</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
							<?php
								$sql = "SELECT * FROM students";
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										
										
										
										echo "
				<div>
					<h3>" . $row[ 'name' ] . "</h3>
					<p>" . $row[ 'position' ] . "</p>
				</div>
				<a class = 'btn btn-success' href = 'searchstudentdesc.php?name=" . $row[ 'name' ] . "&id=" . $row[ 'studentid' ] . "'>View Student</a>
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
