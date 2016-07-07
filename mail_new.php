<?php

	if(isset($_GET['change']))
	{

		require_once("dbconnection.php");
		$obj = new DBConnect();

		require 'PHPMailer/PHPMailerAutoload.php';
			 
			$mail = new PHPMailer;
			 
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 465;
			$mail->SMTPAuth = true;
			$mail->Username = 'projectrssomk@gmail.com';
			$mail->Password = 'safehouse';
			$mail->SMTPSecure = 'ssl';
			 
			$mail->From = 'projectrssomk@gmail.com';
			$mail->FromName = 'SafeHouse';
			$mail->addReplyTo('projectrssomk@gmail.com');
			$mail->WordWrap = 50;
			$mail->isHTML(true);
			if(isset($_GET['sign_c']))
			{
				$email = $_GET['email'];
				$subject = "Welcome to SafeHouse :)";
				$body = "Hi :D <br/><br/>
				Your account is ready :)<br/><br/>
				Your username is ".$email. ". Your password is the Master Password you created during the registration process,
				<br/><br/>
				Say goodbye to multiple usernames and passwords. From now on, your Master Password is all you'll need.
				<br/>
				DO NOT forget your Master Password ever as it can never be retrieved !!!
				<br/><br/>
				In case you forget your password, please contact us - projectrssomk@gmail.com as soon as possible :)<br/><br/>
				Finally, you can get passwords off your mind!
				<br/><br/>
				Welcome to SafeHouse!<br/><br/>
				The SafeHouse Team";
				
			}
			else{
				session_start();
				$query = "SELECT `username` FROM `customer` where `customer_id`='$_SESSION[cid]'";


				if($result = $obj->sql_select($query))
				{
					$row = mysqli_fetch_assoc($result);
					// echo (array("msg"=>"success"));
					$email = $row['username'];
					$subject = "SafeHouse Password Change !!";
					$body = "Hi :D <br/><br/>Your Master Password for username - ".$email. " has been changed.<br/><br/>If you made this change, you don't need to do anything more.<br/><br/>If you didn't change your password, your account might have been hijacked. Please  mail us at - projectrssomk@gmail.com <br/>DO NOT forget your Master Password ever as it can never be retrieved !!!<br/><br/>Sincerely,The SafeHouse Team";
				}
			}	


			$mail->addAddress($email);
			 
			$mail->Subject = $subject;
			$mail->Body    = $body;
			
			// echo "success";
			if(!$mail->send()) {
			   // echo 'Message could not be sent.';
			   echo 'Mailer Error: ' . $mail->ErrorInfo;
				// echo "Not successful";
			   exit;
			}

			if(isset($_SESSION))			
			{
				session_unset();
				session_destroy();
				echo "success";
			}
			 
			// echo 'Me
			//echo (array("msg"=>"success"));	
}

?>

<!-- //netprogramfinal@yahoo.com -->