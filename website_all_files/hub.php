<?php include 'hubheader.php'?>
	
<!--
        <div class="content mt-3">

            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Success</span> Welcome Back!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
-->


<!--hii-->

<!--Projects-->

<?php 

//This is just to see at what times people access this page.... don't worry about it :D
	$sql = "INSERT INTO access_times (student) VALUES ('$username_fullname');";
	$result = mysqli_query( $connection, $sql );
	if ( $result ) {}

?>





 <div class="col-sm-11 col-lg-11" style = "padding-left:30px;">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
							
							<?php 
							
							$sql = "SELECT COUNT(studentid) FROM students;";
							$resultsql = mysqli_query( $connection, $sql );
							
							while ( $row = $resultsql->fetch_assoc() ):
							
							$count = $row['COUNT(studentid)'];
							
							
							endwhile;
							
							?>
							
							
							
                            <span class="count"><?php echo $count;?></span>
                        </h4>
                        <p class="text-light">SMS Members</p>


                    </div>

                </div>
            </div>


      <!--/.col-->
			<div class="col-sm-7 col-lg-7">
               
				

   <div class="col-xl-12" style = "">
                <div class="card" >
                    <div class="card-header">
                        <h4>My Projects</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px; padding-right:20px;">
						
<!--This is a comment						-->
							
						<?php
							$studentsql = "SELECT project_list.*, students_in_projects.*, students.* FROM project_list, students_in_projects, students WHERE students.studentid = students_in_projects.studentid AND students_in_projects.projectid = project_list.projectid AND students.studentid = '$id'";
								$resultsql = mysqli_query( $connection, $studentsql );



								$resultCheck = mysqli_num_rows( $resultsql );


								if ( $resultCheck > 0 ) {

									while ( $projectinfo = $resultsql->fetch_assoc() ):


										?>

						<strong><?php echo $projectinfo['project_name'];?></strong> <br>
								<?php echo "Requestor: ".$projectinfo['requestor_name'];?> <br>

								<?php echo "Service hours: ".$projectinfo['service_hours'];?> hours -
								<?php echo nl2br($projectinfo['role']."\r\n");?>
								<br>



								<!-- End While for project ID -->
								<?php endwhile; 
				} else {
					echo "No Projects Entered Yet";
				}
				?>
						
						
						
                        
                    </div>
                </div>
                <!-- /# card -->
            </div>
		
				
      <div class="col-xl-12"  >
                <div class="card" >
                    <div class="card-header">
                        <h4>World Domination Map</h4>
                    </div>
					
                    <div class="Vector-map-js">
                        <div id="vmap" class="vmap" style="height: 300px;"></div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
				
		
				

        </div> <!-- .content -->







  <div class="col-xl-4" style = "margin-left:15px;">
                <div class="card" >
                    <div class="card-header">
                        <h4>Extra Notes</h4>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px; padding-right:20px;">
						
						<p>Welcome to the SMS database hub. Here you can gain service hours, start projects, be certified to use equipment, look at equipment handouts, look at a pointless world domination map and whatever else Nick programmed into the system. </p>
						<p>Welcome to the SMS database hub. Here you can gain service hours, start projects, be certified to use equipment, look at equipment handouts, look at a pointless world domination map and whatever else Nick programmed into the system. </p>
						
<!--This is a comment						-->
</div>
                </div>
                <!-- /# card -->
            </div>





      
				
				
		
		
    
				
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

</body>
</html>
