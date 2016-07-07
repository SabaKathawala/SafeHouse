
<?php
	// $user = $_POST['username'];
	// $pass = $_POST['userpass'];
	// if($user=='QQ'&& $pass=='WW'){
	// 	setcookie('login','true',time()+60*60*24*10);
	// 	setcookie('user','QQ');
	// 	header('location:Home.php');
	// }
		
	require_once("dbconnection.php");
	$obj = new DBConnect();
	
	if(isset($_GET['session']))
	{
		$username = $_GET['username'];
		$query = "SELECT * from `customer` where `username` = '$username'";
		if($result = $obj->sql_select($query))
		{
			$row=mysqli_fetch_assoc($result);
			session_start();
			$_SESSION['login']= $row['username'];
			$_SESSION['cid']= $row['customer_id'];
			$_SESSION['aid']= $row['authentication_id'];
			
			$response = array("status"=>"success");
			echo json_encode($response);
		}
		else
		{
			$response = array("status"=>"failed","msg"=>"Please try again later :(");	
			echo json_encode($response);
		}
	}
	if(isset($_GET['sign']))
	{
		$username = $_GET['username'];
		
		$query = "INSERT INTO `customer` (`username`) VALUES ('$username')";
		if($obj->sql_update($query))
		{
			$query = "select `customer_id` from `customer` where  `username` = '$username' ";			
			if($result = $obj->sql_select($query))
			{
				$row=mysqli_fetch_assoc($result);
				$response = array("status"=>"success","msg"=>$row['customer_id']);
				echo json_encode($response);
			}
			else{
			$response = array("status"=>"failed","msg"=>"There was some problem processing your request :(");	
			echo json_encode($response);
			}
		}
		else{
			$response = array("status"=>"failed","msg"=>"Username already exists (>_<)");	
			echo json_encode($response);
		}
		
	}
	
	if(isset($_GET['set_auth']))
	{
		$id = $_GET['customer_id'];
		$aid = $_GET['auth_id'];
		$emailid = $_GET['username'];
		$query = "UPDATE `customer` SET `authentication_id` = '$aid' where `customer_id`='$id'";
		if($obj->sql_update($query))
		{
			$response = array("status"=>"success","msg"=>"Congratulations!! Now you own a SafeHouse :D");
			echo json_encode($response);
		}
		else{
			$response = array("status"=>"failed","msg"=>"There was a problem. We are sorry for the inconvenience.");	
			echo json_encode($response);
		}
		
	}
	
	if(isset($_GET['login']))
	{
		session_start();
		// code for check server side validation
		if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_GET['captcha']) != 0) 
		{
			$response = array("status"=>"failed_c","msg"=>"The Validation code does not match!");	
			echo json_encode($response);		
		}
		else
		{
			$username = $_GET['username'];
			
			$query = "SELECT * from `customer` where `username` = '$username'";
			if($result = $obj->sql_select($query))
			{
				$row=mysqli_fetch_assoc($result);
				if($row!=null)
				{
					$response = array("status"=>"success","cid"=>$row['customer_id'],"aid"=>$row['authentication_id']);
					echo json_encode($response);
				}
				else{
					$response = array("status"=>"failed_u","msg"=>"Username does not exist. Please sign up (-_-)");	
					echo json_encode($response);
				}
			}
			else{

					$response = array("status"=>"failed","msg"=>"Please try again later :(");	
					echo json_encode($response);
				}

			
		}
	}		




	if(isset($_GET['add']))
	{
		session_start();
		$response = array("cid"=>$_SESSION['cid'],"aid"=>$_SESSION['aid']);
		echo json_encode($response);

	}
			
		
	if(isset($_GET['new_acc']))
	{
		$username = $_GET['email'];
		$userpass = $_GET['pass'];
		session_start();
		if($_GET['category']=='google')
			$query = "INSERT INTO `google` (`customer_id`,`customer_email_id`, `customer_password`) VALUES ('$_SESSION[cid]','$username','$userpass')";
		else
			$query = "INSERT INTO `facebook` (`customer_id`,`customer_email_id`, `customer_password`) VALUES ('$_SESSION[cid]','$username','$userpass')";
		if($obj->sql_update($query))
		{
			$response = array("status"=>"success");
				echo json_encode($response);
		}
		else{
			$response = array("status"=>"failed");	
			echo json_encode($response);
		}
		
	}

	if(isset($_GET['retrieve']))
	{
		session_start();
		if($_GET['category']=='google')
			$query = "SELECT * from `google` where `customer_id` = '$_SESSION[cid]'";
		else
			$query = "SELECT * from `facebook` where `customer_id` = '$_SESSION[cid]'";
		
		if($result = $obj->sql_select($query))
		{	
			$row=mysqli_fetch_assoc($result);
			if($row!=null){	
		  		$response = array("status"=>"success", "username" => $row['customer_email_id'],"ep" => $row['customer_password'] );	
				echo json_encode($response);
			}
			else{
				$response = array("status"=>"failed", "msg" => "Please add your account first (-_-)" );	
				echo json_encode($response);	
			}
		}
		else{
				$response = array("status"=>"failed", "msg" => "Please try after sometime" );	
				echo json_encode($response);	
		}

	}

	if(isset($_GET['update_acc']))
	
	{	$newpass = $_GET['pass'];
		session_start();
		if($_GET['category']=='google')
			$query = "UPDATE `google` set `customer_password` = '$newpass' where `customer_id` = '$_SESSION[cid]'";
		else
			$query = "UPDATE `facebook` set `customer_password` = '$newpass' where `customer_id` = '$_SESSION[cid]'";
		if($obj->sql_update($query))
		{
			$response = array("status"=>"success");
				echo json_encode($response);
		}
		else{
			$response = array("status"=>"failed");	
			echo json_encode($response);
		}
		
	}

	if(isset($_GET['delete_acc']))
	{
		session_start();
		if($_GET['category']=='google')
			$query = "DELETE from `google` where `customer_id` = '$_SESSION[cid]'";
		else
			$query = "DELETE from `facebook` where `customer_id` = '$_SESSION[cid]'";
		if($result = $obj->sql_update($query))
		{	
			if($result){	
		  		$response = array("status"=>"success");	
				echo json_encode($response);
			}
			else{
				$response = array("status"=>"failed", "msg" => "You do not have an account (>_<)" );	
				echo json_encode($response);	
			}
		}
		else{
				$response = array("status"=>"failed", "msg" => "Please try after sometime :(" );	
				echo json_encode($response);	
		}
	}

	if(isset($_GET['delete_master']))
	{
		session_start();
		$query = "DELETE from `customer` where `customer_id` = '$_SESSION[cid]'";
		
		if($result = $obj->sql_update($query))
		{	
			session_destroy();
			$response = array("status"=>"success");	
			echo json_encode($response);	
		}
		else
		{
				$response = array("status"=>"failed");	
				echo json_encode($response);	
		}

	}
	
	if(isset($_GET['arg1']))
	{
		session_start();
		session_unset();
		session_destroy();
		echo "success";
	}

	if(isset($_GET['change']))
	{
		session_start();
		$query = "SELECT `username` FROM `customer` where `customer_id`='$_SESSION[cid]'";
		if($result = $obj->sql_select($query))
		{
			$row = mysqli_fetch_assoc($result);
			echo json_encode(array("msg"=>"success"));
			include_once("mail1.php");
			$subject = "SafeHouse Password Change !!";
			$body = "Hi :D <br/><br>
			Your Master Password for username - "+$row['username']+ " has been changed.
			<br/><br>
			If you made this change, you don't need to do anything more. 
			<br/><br/>
			If you didn't change your password, your account might have been hijacked. Please  mail us at - projectrssomk@gmail.com 
			<br/>
			DO NOT forget your Master Password ever as it can never be retrieved !!!
			<br/><br/>
			Sincerely,
			The SafeHouse Team";
			echo json_encode(array("msg"=>"success"));	
			send_mail($row['username'],$subject,$body);
			echo json_encode(array("msg"=>"success"));
		}
		session_unset();
		session_destroy();
		echo json_encode(array("msg"=>"success"));
	}

	if(isset($_GET['contact']))
	{
		$category = $_GET['category'];
		$fname = $_GET['fname'];
		$lname = $_GET['lname'];
		$c_email = $_GET['c_email'];
		$a_email = $_GET['a_email'];
		$phone = $_GET['phone'];
		$desc = $_GET['desc'];

		if($category==1)
		{	
			$query = "INSERT INTO `feedback`
		(`first_name`,`last_name`, `contact_no`, `account_email`,`contact_email`,`description`) 
		VALUES ('$fname','$lname','$phone','$a_email','$c_email','$desc')";
		}
		else{
			$query = "INSERT INTO `query`
		(`first_name`,`last_name`, `contact_no`, `account_email`,`contact_email`,`description`) 
		VALUES ('$fname','$lname','$phone','$a_email','$c_email','$desc')";
		}

		if($obj->sql_update($query))
		{
			$response = array("status"=>"success");
				echo json_encode($response);
		}
		else{
			$response = array("status"=>"failed");	
			echo json_encode($response);
		}


	}
	$obj->sql_close();

?>	

