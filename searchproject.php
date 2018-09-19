<?php include 'hubheader.php'?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Search Project</title>
</head>

<body>
	
	
	      <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Search for a Project</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
	<form action="searchprojectresult.php" method="POST">
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
                        <h4>All Projects</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
							<?php
								$sql = "SELECT * FROM project_list";
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										
										
										
										echo "
				<div>
					<h3>" . $row[ 'project_name' ] . "</h3>
					<p>" . $row[ 'project_description' ] . "</p>
				</div>
				<a class = 'btn btn-success' href = 'searchprojectdesc.php?name=" . $row[ 'project_name' ] . "&id=" . $row[ 'projectid' ] . "'>View Project Details</a>
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