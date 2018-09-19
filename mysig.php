<?php include 'hubheader.php';


if ( !isset( $_SESSION[ 'is_leadership' ] ) ) {
	header( 'Location: hub.php' );
	exit;
}

$studentid = $id;

	
?>



<div class="col-xl-12">
	<div class="card">
		<div class="card-header">

			<h2> My Sigs </h2>
		</div>
		<div class="" style="padding-left:20px; padding-top:10px ; padding-right:20px;">

			<?php
								$sql = "SELECT sigs.*, students_in_sigs.* FROM sigs, students_in_sigs WHERE sigs.sig_name = students_in_sigs.sig_name AND students_in_sigs.studentid = '$studentid' AND students_in_sigs.sig_position = 'Leader'";
			
//			echo $sql;
								$result = mysqli_query( $connection, $sql );
								$queryResults = mysqli_num_rows( $result );
								if ( $queryResults > 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										
										
										
										echo "
				<div>
					<h3>" . $row[ 'sig_name' ] . "</h3>
					<p>" . $row[ 'sig_desc' ] . "</p>
				</div>
				<a class = 'btn btn-success' href = 'altersiginfo.php?name=" . $row[ 'sig_name' ] . "'>Alter SIG Info</a>
				<hr>";
									}


								} else {
									
									echo "nothing here";
								}

								?>
			
			
			
			
			
		</div>
	</div>
	
</div>



</body>
</html>