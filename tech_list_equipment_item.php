
<?php
include 'hubheader.php';


if ( !isset( $_SESSION[ 'exec_rights' ] ) ) {
	echo '<script>window.location.href = "hub.php?error=You need exec rights";</script>';
	exit;
}

$studentid = $id;


$eq_code = mysqli_real_escape_string( $connection, $_GET[ 'code' ] );
$eq_name = mysqli_real_escape_string( $connection, $_GET[ 'name' ] );


?>

	
	
	      <div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h2>Information Regarding Equipment</h2>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px; padding-right:20px;">
							<?php
								
							//	echo $projectid;
								$sql = "SELECT * FROM eqcatalog WHERE eq_code = '$eq_code'";
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										echo "
				<div>
					<h3>" . $row[ 'eq_name' ] . "</h3>
					<br>
					<h5>" . $row[ 'eq_description' ] . "</h5>
					<br>
					<h5>" . $row[ 'eq_code' ] . "</h5>
					<br>
					<h5>" . $row[ 'eq_type' ] . "</h5>
					
				</div>
				<hr>";
									}


								}


								?>
						
						<form method="POST">
						<button type="submit" name="modify" class = 'btn btn-success'>Modify Details</button>
						</form>
						
							<?php 
						
						if(isset($_POST['modify']) & !empty(isset($_POST['modify']))){
							
								echo "<script>window.location.href =  'tech_modify_equipment_details.php?eq_code=" . $eq_code .  "';</script>;";
								
									
						
						}
						
						
						?>
						
						
						
						
						<br>
   
                    </div>
                </div>
                <!-- /# card -->
            </div>

        
<div class="col-xl-12">
	<div class="card">
		<div class="card-header">

			<h4> Students who have access to this equipment </h4>
		</div>
		<div class="col-xl-12" style="padding-left:20px; padding-top:10px ; padding-right:20px;">
  
			<table class="table table-light project-table table-hover">
									<tr style="background-color:ghostwhite;">
										<th>Name</th>
										<th>SIG Certified In</th>
										<th>Certified By</th>
										<th>Certified Date</th>
									
										
										
										


									</tr>
									<?php

		
									//$sql = "SELECT project_list.*, students.* from project_list, students WHERE project_list.student_rep = students.studentid";
				
									//$sql = "SELECT * from eqcatalog";
				
					$sql = "SELECT students_in_eq.*, students.*, eqcatalog.* FROM students_in_eq, students, eqcatalog WHERE students_in_eq.studentid = students.studentid AND eqcatalog.eq_id = students_in_eq.eq_id AND eqcatalog.eq_code = '$eq_code'";
		
		
		
									$result = mysqli_query( $connection, $sql );

//
									$resultCheck = mysqli_num_rows( $result );
									if ( $resultCheck > 0 ) {
										while ( $row = mysqli_fetch_assoc( $result ) ) {

										





											echo "<tr>
    <td>" . $row[ "name" ] . "</td>
    <td>" . $row[ "sig_certified" ] . "</td>
    <td>" . $row[ 'certified_by' ] . "</td>
	<td>" . $row[ 'datetime_event' ] . "</td>
    
 

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
                <!-- /# card -->
            </div>
	
	
	
	
						



</body>
</html>