<?php include 'hubheader.php';?>


	
	      <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h4>Remove self from a project</h4>
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
								$sql = "SELECT project_list.*, students_in_projects.*, students.* FROM project_list, students_in_projects, students WHERE students.studentid = students_in_projects.studentid AND students_in_projects.projectid = project_list.projectid AND students.studentid = '$id'";
						
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										
										
										
										echo "
				<div>
					<h3>" . $row[ 'project_name' ] . "</h3>
					<p>" . $row[ 'project_description' ] . "</p>
				</div>
				<a class = 'btn btn-success' href = 'remove_self_project_function.php?name=" . $row[ 'project_name' ] . "&id=" . $row[ 'projectid' ] . "'>View Project Details</a>
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