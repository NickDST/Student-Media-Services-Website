<?php include 'hubheader.php';



$student_rep = mysqli_real_escape_string( $connection, $_GET[ 'name' ] );
								
$projectid = mysqli_real_escape_string( $connection, $_GET[ 'id' ] );


								
							//	echo $projectid;
								$sql = "SELECT * FROM project_list WHERE projectid = '$projectid'";
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										
										$project_name = $row[ 'project_name' ];
										
				
									}


								}


								?>









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
<!--                        <h4>Search for Equipment</h4>-->
						<?php echo "<h3> Searching equipment for: $project_name</h3>";?>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
	<form action="addeqsearchresult.php" method="POST">
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
                        <h4>All equipment</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
							<?php
								$sql = "SELECT * FROM eqcatalog";
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										
										
										
										echo "
				<div>
					<h3>" . $row[ 'eq_name' ] . "</h3>
					<p>" . $row[ 'eq_description' ] . "</p>
				</div>
				<a class = 'btn btn-success' href = 'addeq.php?name=" . $row[ 'eq_name' ] . "&eq_id=" . $row[ 'eq_id' ] . "&projectid=" . $projectid . "'>Add This equipment</a>
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