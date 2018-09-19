<?php include 'hubheader.php' ?>


<div class="col-xl-12">
	<div class="card">
		<div class="card-header">

			<h2> All Projects Table </h2>
		</div>
		<div class="col-xl-10" style="padding-left:20px; padding-top:10px ; padding-right:20px;">
			
			
								<table class="table table-light project-table table-hover">
									<tr style="background-color:ghostwhite;">
										<th>Project ID</th>
										<th>Project Name</th>
										<th>Student Rep</th>
										<th>Adult Name</th>
										<th>Adult Contact</th>
										<th>Datetime Start</th>
										<th>Datetime End</th>
										<th>Status</th>
										<th>keep raw</th>
										<th>Requestor Name</th>
										<th>Requestor Contact</th>
										
										
										


									</tr>
									<?php

		
									$sql = "SELECT project_list.*, students.* from project_list, students WHERE project_list.student_rep = students.studentid";
		
		
		
									$result = mysqli_query( $connection, $sql );

//
									$resultCheck = mysqli_num_rows( $result );
									if ( $resultCheck > 0 ) {
										while ( $row = mysqli_fetch_assoc( $result ) ) {

										





											echo "<tr>
    <td>" . $row[ "projectid" ] . "</td>
    <td>" . $row[ "project_name" ] . "</td>
    <td>" . $row[ 'name' ] . "</td>
    <td>" . $row[ "adult_name" ] . "</td>
    <td>" . $row[ "adult_contact" ] . "</td>
	<td>" . $row[ "datetime_start" ] . "</td>
	<td>" . $row[ "datetime_end" ] . "</td>
	<td>" . $row[ "status" ] . "</td>
	<td>" . $row[ "keep_raw" ] . "</td>
	<td>" . $row[ "requestor_name" ] . "</td>
	<td>" . $row[ "requestor_contact" ] . "</td>

    </tr>";

										}

										echo "</table>";
									} else {
										echo "0 results";
									}
									//$hours = "0";
	
									?>


			
			

		</div>
	</div>
	
</div>








</body>
</html>