<?php
include 'includes/dbh.inc.php';
include 'emailheader.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

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


		$to = $project_manager_email;
		$subject = "Someone has submitted a request";
		$message = "Hi";

		$headers = 'From: SMS Network <SMS@database.com>' . PHP_EOL .
		'Reply-To: SMS Network <SMS@database.com>' . PHP_EOL .
		'X-Mailer: PHP/' . phpversion() . "Content-type: text/html";

		//mail( $to, $subject, $message, $headers );
			
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

		//echo "<br>email to requestee  sent";			



		$to = $contact;
		$subject = "Thank you for submitting a request!";
		$message = "We will get back to you shortly";

		$headers = 'From: SMS Network <SMS@database.com>' . PHP_EOL .
		'Reply-To: SMS Network <SMS@database.com>' . PHP_EOL .
		'X-Mailer: PHP/' . phpversion() . "Content-type: text/html";

		//mail( $to, $subject, $message, $headers );
			
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

		//echo "<br>email to requestee  sent";			




	} else {
		$fmsg = "Request failed to send";
	}


}




if ( isset( $_POST[ "visualdesign" ] ) ) {
	$to = $visual_design_email;
	$subject = "Your Request has been Activated!";
	$message = "Hi";

	$headers = 'From: SMS Database <SMS@database.com>' . PHP_EOL .
	'Reply-To: SMS Database <SMS@database.com>' . PHP_EOL .
	'X-Mailer: PHP/' . phpversion() . "Content-type: text/html";

	//mail( $to, $subject, $message, $headers );
		
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

	//echo "<br>email to requestee  sent";					   								   

}



if ( isset( $_POST[ "animation" ] ) ) {
	$to = $principia_email;
	$subject = "Your Request has been Activated!";
	$message = "Hi";

	$headers = 'From: SMS Database <SMS@database.com>' . PHP_EOL .
	'Reply-To: SMS Database <SMS@database.com>' . PHP_EOL .
	'X-Mailer: PHP/' . phpversion() . "Content-type: text/html";

	//mail( $to, $subject, $message, $headers );
		
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

	//echo "<br>email to requestee  sent";		

}

if ( isset( $_POST[ "livestream" ] ) ) {
	$to = $livestream_email;
	$subject = "Your Request has been Activated!";
	$message = "Hi";

	$headers = 'From: SMS Database <SMS@database.com>' . PHP_EOL .
	'Reply-To: SMS Database <SMS@database.com>' . PHP_EOL .
	'X-Mailer: PHP/' . phpversion() . "Content-type: text/html";

	//mail( $to, $subject, $message, $headers );
		
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

	//echo "<br>email to requestee  sent";		

}

if ( isset( $_POST[ "documentation" ] ) ) {
	$to = $united_herald_email;
	$subject = "Your Request has been Activated!";
	$message = "Hi";

	$headers = 'From: SMS Database <SMS@database.com>' . PHP_EOL .
	'Reply-To: SMS Database <SMS@database.com>' . PHP_EOL .
	'X-Mailer: PHP/' . phpversion() . "Content-type: text/html";

	//mail( $to, $subject, $message, $headers );
		
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

	//echo "<br>email to requestee  sent";		

}

if ( isset( $_POST[ "music" ] ) ) {
	$to = $music_composition_email;
	$subject = "Your Request has been Activated!";
	$message = "Hi";

	$headers = 'From: SMS Database <SMS@database.com>' . PHP_EOL .
	'Reply-To: SMS Database <SMS@database.com>' . PHP_EOL .
	'X-Mailer: PHP/' . phpversion() . "Content-type: text/html";

	//mail( $to, $subject, $message, $headers );
		
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

	//echo "<br>email to requestee  sent";		

}

if ( isset( $_POST[ "videogame" ] ) ) {

	$to = $game_development_email;
	$subject = "Your Request has been Activated!";
	$message = "Hi";

	$headers = 'From: Student Media Services <SMS@database.com>' . PHP_EOL .
	'Reply-To: SMS Database <SMS@database.com>' . PHP_EOL .
	'X-Mailer: PHP/' . phpversion() . "Content-type: text/html";

	//mail( $to, $subject, $message, $headers );
		
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
							<input type="checkbox" name="livestream" value="livestream"> Livestream Video Capture<br><br>
							<input type="checkbox" name="document" value="livestream"> Video/Photographic Event Documentation<br><br>
							<input type="checkbox" name="music" value="music"> Music Composition<br><br>
							<input type="checkbox" name="videogame" value="videogame"> Video Game Development<br><br>

						</div>

					</div>

					<!--Goal?					-->
					<div class="row">
						<div class="col-sm-7">
							<label for="">Keep Raw Files?</label>
							<!--							<div class = "form-control">-->
							<select name="keep_raw" class="form-control">
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