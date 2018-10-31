
<?php
include 'hubheader.php';


if ( !isset( $_SESSION[ 'exec_rights' ] ) ) {
	echo '<script>window.location.href = "hub.php?error=You are not the leader of this sig";</script>';
	exit;
}

$studentid = $id;

?>




<div class="col-xl-12">
	<div class="card">
		<div class="card-header">

			<h2>List of all equipment</h2>
		</div>
		<div class="" style="padding-left:20px; padding-top:10px ; padding-right:20px;">
			
			<table class="table table-light project-table table-hover">
									<tr style="background-color:ghostwhite;">
										<th>EQ Name</th>
										<th>EQ Code</th>
										<th>EQ Type</th>
										<th>View</th>
									
										
										
										


									</tr>
									<?php

		
									//$sql = "SELECT project_list.*, students.* from project_list, students WHERE project_list.student_rep = students.studentid";
				
									$sql = "SELECT * from eqcatalog";
		
		
		
									$result = mysqli_query( $connection, $sql );

//
									$resultCheck = mysqli_num_rows( $result );
									if ( $resultCheck > 0 ) {
										while ( $row = mysqli_fetch_assoc( $result ) ) {

										





											echo "<tr>
    <td>" . $row[ "eq_name" ] . "</td>
    <td>" . $row[ "eq_code" ] . "</td>
    <td>" . $row[ 'eq_type' ] . "</td>
    <td>" . "<a class = 'btn btn-success' href = 'tech_list_equipment_item.php?code=" . $row[ 'eq_code' ] . "&name=" . $row[ 'eq_name' ] . "'>View Equipment</a>" . "</td>
 

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