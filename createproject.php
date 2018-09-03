<?php include 'hubheader.php'?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Create a New Project</title>
</head>

<body>
	
	
	      <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Search for a Request</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
	<form action="createprojectsearch.php" method="POST">
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
                        <h4>All Pending Requests</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
							<?php
								$sql = "SELECT * FROM requests where activate = 'inactive' order by request_id desc";
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										
										
										
										echo "
				<div>
					<h3>" . $row[ 'request_name' ] . "</h3>
					<p>" . $row[ 'request_description' ] . "</p>
				</div>
				<a class = 'btn btn-success' href = 'activateproject.php?name=" . $row[ 'request_name' ] . "&id=" . $row[ 'request_id' ] . "'>Initiate this Project</a>
				<hr>";
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