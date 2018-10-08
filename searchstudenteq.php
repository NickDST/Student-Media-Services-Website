<?php
include 'hubheader.php';


if ( !isset( $_SESSION[ 'exec_rights' ] ) ) {
	echo '<script>window.location.href = "hub.php?error=You are not the leader of this sig";</script>';
	exit;
}

$studentid = $id;


$certify_student = mysqli_real_escape_string( $connection, $_GET[ 'studentid' ] );
$sig_name = mysqli_real_escape_string( $connection, $_GET[ 'signame' ] );
?>



<div class="col-xl-12">
	<div class="card">
		<div class="card-header">

			<h2> Search Student Equipment </h2>
		</div>
		<div class="" style="padding-left:20px; padding-top:10px ; padding-right:20px;">

			<div class="select-form">
				<form method="GET">
					<div class="Entry-Form">

						<h3>Select Subject</h3> Type in Student ID: <input type="number" name="studentid" class="form-control" required max=""><br>
						<br>
						<br>

						<button class="btn btn-secondary" type="submit" name="submitbtn">submit</button>
					</div>

				</form>
			</div>
			<br>

			<?php


			if ( isset( $_GET[ 'submitbtn' ] ) ) {
				$studentid_search = mysqli_real_escape_string( $connection, $_GET[ 'studentid' ] );


				$sql = "SELECT * FROM students where studentid = '$studentid_search'";



				$result = mysqli_query( $connection, $sql );


				$resultCheck = mysqli_num_rows( $result );
				if ( $resultCheck > 0 ) {
					while ( $row = mysqli_fetch_assoc( $result ) ) {


						$studentname = $row[ "name" ];



					}

				}

				?>


			<div class="row">
				<h3>Generated List for <?php echo $studentname; ?></h3>



				<table class="table table-light project-table table-hover">
					<tr style="background-color:ghostwhite;">
						<th>EQ Name</th>
						<th>EQ Code</th>
						<th>SIG Certified In</th>
						<th>Certified By</th>






					</tr>
					<?php


					//$sql = "SELECT project_list.*, students.* from project_list, students WHERE project_list.student_rep = students.studentid";

					$sql = "SELECT students_in_eq.*, students.*, eqcatalog.* FROM students_in_eq, students, eqcatalog WHERE students_in_eq.studentid = students.studentid AND eqcatalog.eq_id = students_in_eq.eq_id AND students_in_eq.studentid = '$studentid_search'";



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
						echo "<h3> 0 results</h3>";
					}
					//$hours = "0";
					}
					?>



			</div>
		</div>

	</div>










	</body>
	</html>