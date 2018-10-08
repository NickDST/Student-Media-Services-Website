<?php
include 'hubheader.php';



	if ( !isset( $_SESSION[ 'exec_rights' ] ) ) {
	echo '<script>window.location.href = "hub.php?error=You need exec rights";</script>';
	exit;
}





?>

<div class="col-xl-11" >
                <div class="card" >
                    <div class="card-header">
                        <h2>Add Equipment</h2>
                    </div>
                    <div class="" style = "padding-left:20px; padding-top:10px; padding-right:20px;">


	
						<form method="post">
						<input type="text" name="eq_name" class="form-control" placeholder="Name of the Equipment" maxlength=200 required>
						<br>
							
						<input type="text" name="eq_code" class="form-control" placeholder="Equipment Code I.e. H3, B5, C3" maxlength=2 required>
						<br>
						
							
						<input type="text" name="eq_type" class="form-control" placeholder="Equipment Type" maxlength=200 required>
						<br>

						<textarea class="form-control" type="textarea" id="message" name="eq_description" maxlength="6000" rows="7" placeholder="Description" required></textarea>
							
						<br>
						<button class="btn btn-success" type="submit" value = 'make_changes' name = 'make_changes'>Submit New Equipment</button>
						<br>

						</form>
						
						<br>
						

						<?php
						if ( isset( $_POST[ 'make_changes' ] ) == 'make_changes' & !empty( $_POST[ 'make_changes' ] ) ) {
							//$project_id = mysqli_real_escape_string($connection, $_GET["updateid"]);
						
						$eq_name = mysqli_real_escape_string( $connection, $_POST[ "eq_name" ] );
						$eq_code = mysqli_real_escape_string( $connection, $_POST[ "eq_code" ] );
						$eq_type = mysqli_real_escape_string( $connection, $_POST[ "eq_type" ] );
						$eq_description = mysqli_real_escape_string( $connection, $_POST[ "eq_description" ] );	
							

							
													$alreadysql = "SELECT * FROM eqcatalog WHERE eq_code = '$eq_code'";
													$alreadyresult = mysqli_query( $connection, $alreadysql );
													$alreadyqueryResults = mysqli_num_rows( $alreadyresult );
													if ( $alreadyqueryResults != 0 ) {
														
														$false = 'yes';
														
													}
							
							
													$alreadysql = "SELECT * FROM eqcatalog WHERE eq_name = '$eq_name'";
													$alreadyresult = mysqli_query( $connection, $alreadysql );
													$alreadyqueryResults = mysqli_num_rows( $alreadyresult );
													if ( $alreadyqueryResults != 0 ) {
														
														$false = 'yes';
														
													}
													
													
													
													if ($false != 'yes'){

														$addstudentsql = "INSERT INTO eqcatalog (eq_code, eq_name, eq_type, eq_description, submitted_by) VALUES ('$eq_code', '$eq_name', '$eq_type', '$eq_description', '$username_fullname');";
														


														$addstudentresult = mysqli_query( $connection, $addstudentsql );
														if ( $addstudentresult ) {
															
															
															echo '<script>window.location.href = "tech_add_equipment.php?success=uaodifljkasdf";</script>';	
															


														} else {
															
															echo '<script>window.location.href = "tech_add_equipment.php?error=Entry failed to be added";</script>';	
														}
														
														
													} else {
														echo '<script>window.location.href = "tech_add_equipment.php?error=This isnt ok";</script>';	
														
													}
													
												}
												?>
						
						
						
						
						
						
						
						
						
						
					 </div>
                </div>
                <!-- /# card -->
            </div>







</body>
</html>