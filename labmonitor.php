<?php include 'hubheader.php'; ?>




<div class="col-xl-12">
	<div class="card">
		<div class="card-header">

			<h2> List of Equipment I am certified to use.</h2>
		</div>
		<div class="" style="padding-left:20px; padding-top:10px ; padding-right:20px;">
			
			<table class="table table-light project-table table-hover">
									<tr style="background-color:ghostwhite;">
										<th>EQ Name</th>
										<th>EQ Code</th>
										<th>SIG Certified In</th>
										<th>Certified By</th>
									
										
										
										


									</tr>
									<?php

		
									//$sql = "SELECT project_list.*, students.* from project_list, students WHERE project_list.student_rep = students.studentid";
				
									$sql = "SELECT students_in_eq.*, students.*, eqcatalog.* FROM students_in_eq, students, eqcatalog WHERE students_in_eq.studentid = students.studentid AND eqcatalog.eq_id = students_in_eq.eq_id AND students_in_eq.studentid = '$id'";
		
		
		
									$result = mysqli_query( $connection, $sql );

//
									$resultCheck = mysqli_num_rows( $result );
									if ( $resultCheck > 0 ) {
										while ( $row = mysqli_fetch_assoc( $result ) ) {

										





											echo "<tr>
    <td>" . $row[ "eq_name" ] . "</td>
    <td>" . $row[ "eq_code" ] . "</td>
    <td>" . $row[ 'sig_certified' ] . "</td>
    <td>" . $row[ "certified_by" ] . "</td>
 

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
