<?php
include 'includes/dbh.inc.php';
include 'emailheader.php';


if ( isset( $_POST ) & !empty( $_POST ) ) {
	
	$name = mysqli_real_escape_string( $connection, $_POST[ "name" ] );
	$requestee = mysqli_real_escape_string( $connection, $_POST[ "requestee" ] );
	$contact = mysqli_real_escape_string( $connection, $_POST[ "contact" ] );
	$description = mysqli_real_escape_string( $connection, $_POST[ "description" ] );
	$due_date = mysqli_real_escape_string( $connection, $_POST[ "datetime_due" ] );
	$goal = mysqli_real_escape_string( $connection, $_POST[ "goal" ] );
	$keep_raw = mysqli_real_escape_string( $connection, $_POST[ "keep_raw" ] );

	//Inserting the data into the projects...
	$sql = "INSERT INTO requests (request_name, requestor_name, requestor_contact, request_description, datetime_due, request_goal, keep_raw) VALUES ('$name', '$requestee', '$contact' , '$description' , '$due_date' , '$goal' , '$keep_raw');";

	//echo $sql;

	
	$result = mysqli_query( $connection, $sql );
	
	if ( $result ) {
		$smsg = "Request successfully sent!";


$to = $projectmanager;
$subject = "Your Request has been Activated!";
$message = "Hi";

$headers = 'From: SMS Database <SMS@database.com>' . PHP_EOL .
    'Reply-To: SMS Database <SMS@database.com>' . PHP_EOL .
    'X-Mailer: PHP/' . phpversion() . "Content-type: text/html";
			
mail($to, $subject, $message, $headers);
//echo "<br>email to requestee  sent";			
		



	} else {
		$fmsg = "Request failed to send";
	}


}




if (isset($_POST["visualdesign"])){
								   								   

								 }

if (isset($_POST["animation"])){ 
	$to = $projectmanager;
$subject = "Your Request has been Activated!";
$message = "Hi";

$headers = 'From: SMS Database <SMS@database.com>' . PHP_EOL .
    'Reply-To: SMS Database <SMS@database.com>' . PHP_EOL .
    'X-Mailer: PHP/' . phpversion() . "Content-type: text/html";
			
mail($to, $subject, $message, $headers);
//echo "<br>email to requestee  sent";		

								 }

if (isset($_POST["livestream"])){ 
	$to = $projectmanager;
$subject = "Your Request has been Activated!";
$message = "Hi";

$headers = 'From: SMS Database <SMS@database.com>' . PHP_EOL .
    'Reply-To: SMS Database <SMS@database.com>' . PHP_EOL .
    'X-Mailer: PHP/' . phpversion() . "Content-type: text/html";
			
mail($to, $subject, $message, $headers);
//echo "<br>email to requestee  sent";		

								 }

if (isset($_POST["documentation"])){ 
	$to = $projectmanager;
$subject = "Your Request has been Activated!";
$message = "Hi";

$headers = 'From: SMS Database <SMS@database.com>' . PHP_EOL .
    'Reply-To: SMS Database <SMS@database.com>' . PHP_EOL .
    'X-Mailer: PHP/' . phpversion() . "Content-type: text/html";
			
mail($to, $subject, $message, $headers);
//echo "<br>email to requestee  sent";		

								 }

if (isset($_POST["music"])){ 
$to = $projectmanager;
$subject = "Your Request has been Activated!";
$message = "Hi";

$headers = 'From: SMS Database <SMS@database.com>' . PHP_EOL .
    'Reply-To: SMS Database <SMS@database.com>' . PHP_EOL .
    'X-Mailer: PHP/' . phpversion() . "Content-type: text/html";
			
mail($to, $subject, $message, $headers);
//echo "<br>email to requestee  sent";		

}

if (isset($_POST["videogame"])){ 
	
$to = $projectmanager;
$subject = "Your Request has been Activated!";
$message = "Hi";

$headers = 'From: SMS Database <SMS@database.com>' . PHP_EOL .
    'Reply-To: SMS Database <SMS@database.com>' . PHP_EOL .
    'X-Mailer: PHP/' . phpversion() . "Content-type: text/html";
			
mail($to, $subject, $message, $headers);
//echo "<br>email to requestee  sent";		
								 }





?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Simple HTML5 Contact Form - reusable form</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Optional theme -->
<!--	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">-->
<!--	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
	<link rel="stylesheet" href="form.css">
	<!--        <script src="form.js"></script>-->
</head>
<?php if(isset($smsg)){ ?>
<div class="alert alert-success" role="alert">
	<?php echo $smsg; ?> </div>
<?php } ?>
<?php if(isset($fmsg)){ ?>
<div class="alert alert-danger" role="alert">
	<?php echo $fmsg; ?> </div>
<?php } ?>



<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 " id="form_container">
				<h2>Send in a Request</h2>
				<p> Please send your message below. We will get back to you at the earliest! </p>
				<form role="form" method="post" id="reused_form">


					<!--Your Name						-->
					<div class="row">
						<div class="col-sm-6 form-group">
							<label for="name"> Your Name:</label>
							<input type="text" class="form-control" id="name" name="requestee" required>
						</div>

						<!--Name of the request							-->

						<div class="col-sm-6 form-group">
							<label for="email"> Email:</label>
							<input type="email" class="form-control" id="email" name="contact" required>
						</div>
					</div>
					
						<!--Goal?					-->
					<div class="row">
						<div class="col-sm-12 form-group">
							<label for="name"> Name of Request</label>
							<input type="text" class="form-control" id="name" name="name" required>
						</div>

					</div>
					<br>



					<!--	Detailed Summary					-->
					<div class="row">
						<div class="col-sm-12 form-group">
							<label for="message"> Detailed list/summary of everything you need in this project. If this is a documentation request, what are the high priority things that need be documented?</label>
							<textarea class="form-control" type="textarea" id="message" name="description" maxlength="6000" rows="7"></textarea>
						</div>
					</div>


					<!--Goal?					-->
					<div class="row">
						<div class="col-sm-8 form-group">
							<label for="name"> Goal:</label>
							<input type="text" class="form-control" id="name" name="goal" required>
						</div>

					</div>

					<!--Goal?					-->
					<div class="row">
						<div class="col-sm-8 form-group">
							<label for="name"> Need this by:</label>
							<input type="date" class="form-control" id="name" name="datetime_due" required>
						</div>

					</div>
					<br>

					<!--Goal?					-->
					<div class="row">
						<div class="col-sm-8 form-group">
							<label for="name"> Involves: </label><br>
							<input type="checkbox" name="visualdesign" value="visualdesign"> Visual Design<br><br>
							<input type="checkbox" name="animation" value="animation"> Motion Graphic/Animation<br><br>
							<input type="checkbox" name="livestream" value="livestream" > Livestream Video Capture<br><br>
							<input type="checkbox" name="document" value="livestream" > Video/Photographic Event Documentation<br><br>
							<input type="checkbox" name="music" value="music"> Music Composition<br><br>
							<input type="checkbox" name="videogame" value="videogame"> Video Game Development<br><br>
						
						</div>

					</div>
					
					<!--Goal?					-->
					<div class="row">
						<div class="col-sm-7">
							<label for="">Keep Raw Files?</label>
<!--							<div class = "form-control">-->
							<select name="keep_raw" class = "form-control">
								<option value="no">No, I only want the final video production</option>
								<option value="yes">Yes, Please give me all the raw footage and the final video production.</option>
								<option value="no">This is not a video production request</option>
							

							</select>
<!--							</div>-->
						</div>

					</div>
					
					<br>
					<br>



					<div class="row">
						<div class="col-sm-12 form-group">
							<button type="submit" class="btn btn-lg btn-default pull-right">Send &rarr;</button>
						</div>
					</div>




				</form>
				
			</div>
		</div>
	</div>
</body>
</html>