<?php include 'hubheader.php';
//include ( 'emailheader.php' );
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
?>




<div class="col-xl-12">
	<div class="card">
		<div class="card-header">

			<h2> Activate the project </h2>
		</div>
		<div class="" style="padding-left:20px; padding-top:10px ; padding-right:20px;">
			<?php
			//$name = mysqli_real_escape_string( $connection, $_GET[ 'name' ] );
			$request_id = mysqli_real_escape_string( $connection, $_GET[ 'id' ] );
			//	echo $projectid;
			$sql = "SELECT * FROM requests WHERE request_id = '$request_id'";
			$result = mysqli_query( $connection, $sql );
			$queryResults = mysqli_num_rows( $result );
			if ( $queryResults > 0 ) {
				while ( $row = mysqli_fetch_assoc( $result ) ) {
					
					
					
					echo "
				<div>
					<h2> Request Name: " . $row[ 'request_name' ] . "</h2>
					<p>Description: " . $row[ 'request_description' ] . "</p>
					<p>Due Date: " . $row[ 'datetime_due' ] . "</p>
					<p>Requestor Name: " . $row[ 'requestor_name' ] . "</p>
					<p>Goal: " . $row[ 'request_goal' ] . "</p>
					<p>Keep Raw footages? " . $row[ 'keep_raw' ] . "</p>
					
				</div>
				<hr>";
					
				 $name_of_project = $row[ 'request_name' ];
				 $keep_raw = $row['keep_raw'];
				 $description = $row['request_description'];
				 $requestor_name = $row['requestor_name'];
				 $requestor_contact = $row['requestor_contact'];
				 $request_goal = $row['request_goal'];
				 $datetime_due = $row['datetime_due'];
					
				
			
				}
				


			}


			?>
			
			


			<h2>Create Project</h2>
			
			<br>
			


			<form class="" method="POST">
				
				

				<h3>Project Name: <?php echo "$name_of_project" ?></h3>

				

				<br>
				<label for="">ID of Student Representative for this</label>
				<br>
				<input type="number" name="student_rep" id="" class="form-control" placeholder="ID of Student Rep" required max=3000000>

				<br>

				<br>
				<label for="">Name of Responsible Adult</label>
				<br>
				<input type="text" name="adult_name" id="" class="form-control" placeholder="ie. Darren Jones" required maxlength=100>
				<br>
				<label for="">Email of Responsible Adult</label>
				<br>
				<input type="email" name="adult_contact" id="" class="form-control" placeholder="nick@concordiashanghai.org" required maxlength=100>


				<br>
				<br>
				<label for="">Process Outline</label>
				<div class="form-group">
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="procedure_outline" placeholder="A Detailed Description" required maxlength=500 style="resize:none;"></textarea>
				</div>
				<br>
				<label for="">Enter in the Start date</label>
				<br>
				<input type="datetime-local" name="datetime_start" id="" class="form-control" placeholder="Start Date" required>
				<br>
				
				<h4>Due Date: <?php echo "$datetime_due" ?></h4>
				

				<br>

				<label for="">Status?</label>

				<br>
				<select name="status" id="">
					<option value="completed">completed</option>
					<option value="ongoing">ongoing</option>
				</select>



				<br>

				<br>


				<button class="btn btn-success" type="submit" value = "submit" name = "submit">submit</button>
				<br>
				<br>
				
			



			</form>
			
			
			<hr>
			
					
					<?php if ( isset( $_SESSION[ 'exec_rights' ] ) ) { ?>
					
						<label for="">Delete the Request</label>
						<br>
						
						<form method="POST">
						<button type="submit" name="delete" class = 'btn btn-danger'>Delete Request! :(</button>
						</form>
					<br>
					<?php
					if(isset($_POST['delete']) & !empty(isset($_POST['delete']))){
					    
					    $delete_request_sql = "DELETE FROM requests WHERE request_name = '$name_of_project'";
					    
					    $reject_request_result = mysqli_query( $connection, $delete_request_sql );
					    
					    if ( $reject_request_result){
					        echo '<script>window.location.href = "hub.php?success=Success!";</script>';
					    }else{
					        echo '<script>window.location.href = "hub.php?error=did not delete";</script>';
					    }
					    
					}
					
					
					?>
					
					
					
				<?php	}
					?>
					


			<?php 
			//echo $thing;
			
			
			
			
						if ( isset( $_POST[ 'submit' ] ) == 'submit' & !empty( $_POST[ 'submit' ] ) ) {
							
							//$project_name = mysqli_real_escape_string( $connection, $_POST[ 'project_name' ] );
							$student_rep = mysqli_real_escape_string( $connection, $_POST[ 'student_rep' ] );
							$adult_name = mysqli_real_escape_string( $connection, $_POST[ 'adult_name' ] );
							$adult_contact = mysqli_real_escape_string( $connection, $_POST[ 'adult_contact' ] );
							$procedure_outline = mysqli_real_escape_string( $connection, $_POST[ 'procedure_outline' ] );
							$datetime_start = mysqli_real_escape_string( $connection, $_POST[ 'datetime_start' ] );
							//$datetime_end = mysqli_real_escape_string( $connection, $_POST[ 'datetime_end' ] );
							$status = mysqli_real_escape_string( $connection, $_POST[ 'status' ] );
							
							
							
								$sql = "INSERT INTO project_list (project_name, student_rep, adult_name, adult_contact, datetime_start, datetime_end, status, entered_by, procedure_outline, keep_raw, requestor_name, description, requestor_goal, requestor_contact, requestid) VALUES ('$name_of_project', '$student_rep', '$adult_name', '$adult_contact' , '$datetime_start' , '$datetime_due', '$status', '$id', '$procedure_outline', '$keep_raw', '$requestor_name', '$description', '$request_goal', '$requestor_contact', '$request_id' );";

								//echo $sql;

								$result = mysqli_query( $connection, $sql );
								if ( $result ) {
											//$smsg = "Entry successfully added";
									//echo '<script>window.location.href = "activateproject.php?success=Entry added";</script>';	
									echo "it works";
									
										$sql2 = "DELETE FROM requests WHERE request_id = '$request_id'";
									
									$result2 = mysqli_query( $connection, $sql2 );
									if ( $result2 ) {
										echo "success in removing the request";
										
										$sql = "SELECT * FROM project_list WHERE project_name = '$name_of_project'";

$result = mysqli_query( $connection, $sql );
while ( $project = $result->fetch_assoc() ):
$projectid = $project['projectid'];	

endwhile;
										
										
								$to = $project_manager_email;
									$subject = "Project has been initiated";
									$message = "sms.concordiashanghai.org/login.php?projectid=$projectid";
										
									$headers = 'From: SMS Network <SMS@database.com>' . PHP_EOL .
										'Reply-To: SMS Network <SMS@database.com>' . PHP_EOL .
										'X-Mailer: PHP/' . phpversion() . "Content-type: text/html";
									//mail($to, $subject, $message, $headers);
									//echo "<br>email to person sent";
										$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
   // $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $very_secure_email_username;                 // SMTP username
    $mail->Password = $very_secure_email_password;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom($very_secure_email_username, 'Nick');
    $mail->addAddress($to, 'Recipient');     // Add a recipient
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = $message;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

$sql = "SELECT * FROM project_list WHERE project_name = '$name_of_project'";

$result = mysqli_query( $connection, $sql );
while ( $project = $result->fetch_assoc() ):
$projectid = $project['projectid'];	

endwhile;



										
										
										
								//$to = $literally_everyone_email;
									$subject = "Project has been initiated";
								//	$message = "sms.concordiashanghai.org/login.php?name=$name_of_project";
									
											$message = "<h3>A project request has been activated.</h3>
		<p>The name of this project is '$name_of_project' requested from '$requestor_name'.</p>
	<p>If you are interested in joining this project or know someone who is interested, send them this link: sms.concordiashanghai.org/login.php?projectid=$projectid	<br><br> Ok that was all have a good day.</p>
		";
										
									$headers = 'From: SMS Network <SMS@database.com>' . PHP_EOL .
										'Reply-To: SMS Network <SMS@database.com>' . PHP_EOL .
										'X-Mailer: PHP/' . phpversion() . "Content-type: text/html";
									//mail($to, $subject, $message, $headers);
										
										$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
   // $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $very_secure_email_username;                 // SMTP username
    $mail->Password = $very_secure_email_password;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
       //Recipients
    $mail->setFrom($very_secure_email_username, 'Nick');
    $mail->addAddress($project_manager_email, 'Recipient');  
    $mail->addAddress($project_manager_email2, 'Recipient');   
    
    $mail->addAddress($organizer_email, 'Recipient');   
    $mail->addAddress($organizer_email2, 'Recipient'); 
   
    $mail->addAddress($principia_email, 'Recipient');    
    $mail->addAddress($principia_email2, 'Recipient');   
    
    $mail->addAddress($livestream_email, 'Recipient');    
    $mail->addAddress($livestream_email2, 'Recipient');    
    
    $mail->addAddress($visual_design_email, 'Recipient');    
    $mail->addAddress($visual_design_email2, 'Recipient');    
    $mail->addAddress($visual_design_email3, 'Recipient'); 
    
    $mail->addAddress($united_herald_email, 'Recipient');  
    $mail->addAddress($united_herald_email2, 'Recipient'); 
    
    $mail->addAddress($lab_monitors_email, 'Recipient');  
    $mail->addAddress($lab_monitors_email2, 'Recipient');  
    
    
    $mail->addAddress($game_development_email, 'Recipient');  
    $mail->addAddress($game_development_email2, 'Recipient');  
    
    $mail->addAddress($producers_email, 'Recipient');  
    $mail->addAddress($producers_email2, 'Recipient');  
    
    
    $mail->addAddress($music_composition_email, 'Recipient');  
    $mail->addAddress($music_composition_email2, 'Recipient');  
    
    
       
    
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = $message;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


 echo '<script>window.location.href = "hub.php?success=Success!";</script>'; 
									//echo "<br>email to person sent";
	
										
										
										
										
										
										
										
										
										
										
										
										
										
									} else {
										echo "failed to remove request";
		
									}

		


								} else {
		//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
										//$fmsg .= "Entry failed to be added";
									
									//echo "it failed somewhere";
									echo '<script>window.location.href = "activateproject.php?error=Entry failed to be added";</script>';	
								}
							
							
							
							
							
							
							
							
						}
						
						
						?>







		</div>
	</div>
	<!-- /# card -->
</div>

</div> <!-- .content -->
</div> <!-- /#right-panel -->









</body>
</html>