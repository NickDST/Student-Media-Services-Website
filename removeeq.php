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




	      <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Remove Equipment for  <?php echo $project_name;?></h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px ;">
							<?php
								//$sql = "SELECT * FROM eqcatalog";
						$sql = "SELECT project_list.*, eq_in_projects.*, eqcatalog.* FROM project_list, eq_in_projects, eqcatalog WHERE project_list.projectid = eq_in_projects.projectid AND project_list.projectid = '$projectid' AND eq_in_projects.eq_id = eqcatalog.eq_id";
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										
										
										
										echo "
				<div>
					<h3>" . $row[ 'eq_name' ] . "</h3>
					<p>" . $row[ 'eq_description' ] . "</p>
				</div>
				<a class = 'btn btn-success' href = 'removeeq2.php?name=" . $row[ 'eq_name' ] . "&eq_id=" . $row[ 'eq_id' ] . "&projectid=" . $projectid . "'>Remove this piece of equipment</a>
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

</body>
</html>