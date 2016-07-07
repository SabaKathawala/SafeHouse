<?php 
session_start();
  if(isset($_SESSION['login'])):
  header("Location: UserPage.php");
  else:
?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/css/font-awesome.css"/>
	<link rel="stylesheet" type="text/css" href="css/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/Home.css">
	<link rel="stylesheet" type="text/css" href="css/FluidHome.css">

	<title>SafeHouse|Welcome...</title>
</head>

<body>
	
	<div class='container-fluid'>

		<img src = 'images/logo_new.jpg' class='logo'>
		<!--First Container-->
		<div class = 'container'>
			<div class = 'row'>
			 	<div class = 'col-md-12 col-xs-12'>
			 	</div>
			</div>

			<!--header starts-->
			<div class = 'header'>			
				<div class = 'row'>
					<div class = 'col-md-9 col-xs-10'>
						<label id='caption'><span>One Stop Solution For</span> All Your Passwords</label>
					</div>
				 	<div class = 'col-md-3 col-xs-2'>
				 		<table class = 'pull-right'>
							<tr>
							<td><button class ="btn btn-success" id="login"><i class="fa fa-sign-in cloud"></i> Log In</a></td>
						</tr>
						</table>	
					</div>
				</div>	
			</div>
			<!--header ends-->
		</div>
		<!-- First container ends -->
		
		<!-- Main Image-->
		<div class ='image'>		
			<center><img src = 'images/pwd1.png'/></center>
		</div>
		
		<!-- Second container starts -->	

		<div class='container sign'>		
			<div class = 'row'>
				<div class = 'col-md-12 col-xs-12'>
					<center><p class='small'>Start building your SafeHouse.</p></center><!-- line-height:spacing between sentences-->
				</div>
			</div>
			<div class = 'row' style='margin-top:25px;'>
				<div class = 'col-md-2 col-xs-12'></div>
				<div class = 'col-md-6 col-xs-12'>
					<form id='sign-form'>
						<table>
							<tr><td colspan='8'><div id='error' style='color:red;'></div></td></tr>
							<!-- <br/> -->
						    <tr>
						        <td>Email Id: </td>
						    	<td><input class='form-control' id='email' name='email'/></td>
							</tr>
							<tr>
							    <td>Password: </td>
							    <td><input class='form-control' type='password' id='password' name='password'/></td>
							</tr>
							<tr>
								<td>Confirm Password: </td>
					            <td><input class='form-control' type='password' id='confirm'/></td>
							</tr>
						</table>
				</div>
					<div class ='col-md-4 col-xs-12'>
						<button class = 'btn btn-success' id='click1'><i class = 'fa fa-home cloud'></i> Start Building</button>
					</div>	
					</form>
					<button class = 'btn btn-success' id='passgen'><i class = 'fa fa-key'></i> Generate a Password</button>	
			</div>	
			<div class = 'row'>
				<div class = 'col-md-12 col-xs-12'>
					<center><p class='small'>DO NOT forget your Master Password. It can never be retrieved !!!</p></center>
				</div>
			</div>
		</div>
		<!-- Second container ends -->	
			
		
			<div><hr/></div>
		
			
		<!-- Third container starts -->			
		<div class = 'container'>
			<div class='row'>
				<ul class = 'set space'>
					<div class = 'col-md-4 col-xs-12'>
						<li>
							<div class = 'block'>
								<h2><i class="fa fa-question-circle icons"></i>What is SafeHouse ?</h2>
								<p>SafeHouse is a locker for your passwords. Store all your passwords securely :)</p>
							</div>
						</li>
					</div>
					<div class = 'col-md-4 col-xs-12'>
						<li>
							<div class = 'block'>
								<h2><i class="fa fa-cogs icons"></i>How does SafeHouse work ?</h2>
								<p>To Sign-up for SafeHouse, you need to give an Email ID as Username and a Master Password.</p>
							</div>
						</li>
					</div>
					<div class = 'col-md-4 col-xs-12'>
						<li>
							<div class = 'block'>
								<h2><i class="fa fa-info-circle icons"></i>How is SafeHouse going to help me? </h3>
								<p>It will eliminate the need of remembering many passwords. SafeHouse will provide secure access to all your passwords by remembering just One.</p>
							</div>
						</li>
					</div>
				</ul>
			</div>
		</div>
		
		<br/><br/>
		<div class='gap'></div>
		<br/><br/>
			
		<div class = 'container'>
			<div class ='row'>
				<div class = 'col-md-12 col-xs-12'>
					<ul class = 'line set'>
						<li><h2>Accounts</h2></li>
					</ul>
				</div>
			</div>
			<div class = 'row'>
				<div class = 'col-md-2 col-xs-12'></div>
				<div class = 'col-md-9 col-xs-12'>
				    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="item active">
						        <ul class = 'set change'>
									<li><img src='images/google+_grey.jpg' data-id='google+' class='img img-responsive'></li>
									<li><img src='images/facebook_grey.jpg' data-id='facebook' class='img img-responsive'></li>
									<li><img src='images/yahoo_grey.jpg'  data-id='yahoo'class='img img-responsive'></li>
									<li><img src='images/twitter_grey.jpg' data-id='twitter' class='img img-responsive'></li>
									<li><img src='images/linkedin_grey.jpg' data-id='linkedin' class='img img-responsive'></li>
									<li><img src='images/skype_grey.jpg' data-id='skype' class='img img-responsive'></li>
								</ul>
							</div>
							<div class="item">
							    <ul class = 'set change'>
							    	<li><img src='images/flipkart_grey.jpg' data-id='flipkart' class='img img-responsive'></li>
									<li><img src='images/snapdeal_grey.jpg' data-id='snapdeal' class='img img-responsive'></li>
									<li><img src='images/amazon_grey.jpg' data-id='amazon' class='img img-responsive'></li>
							    	<li><img src='images/visa_grey.jpg' data-id='visa' class='img img-responsive'></li>
									<li><img src='images/mastercard_grey.jpg' data-id='mastercard' class='img img-responsive'></li>
									<li><img src='images/paytm_grey.jpg' data-id='paytm' class='img img-responsive'></li>
									<!-- <li><img src='images/freecharge_grey.jpg' data-id='freecharge' class='img img-responsive'></li> -->
							    </ul>
			        		</div>
				    	</div>
					</div>
				</div>
			</div>
		</div>	
		<!-- Third container ends -->
		
		<br/><br/>
		
		<br/><br/>
		
		<div class = 'footer'>
		<!-- Fourth container starts -->
			<div class='container'>
				<div class ='row'>
					<!-- First column-->
					<div class = 'col-md-6 col-xs-12'>
						<ul class = 'line set'>
							<li><h2>Help Others</h2></li>
						</ul>
						<ul class ='set'>
							<li><p>SafeHouse is an extremely useful utility in today's world full of passwords.<br/>Promote us and help others.</p>
							</li>
						</ul>
						<ul class = 'line set'>
							<li><h2>Contact Us</h2></li>
						</ul>
						<ul class ='set'>
							<li><p>Mail us at: <span>projectrssomk@gmail.com<span></p>
							</li>
						</ul>
					</div>
						
					<!-- Second column-->
					<div class = 'col-md-6 col-xs-12'>
						<ul class = 'line set'>
							<li><h2>Developers</h2></li>
						</ul>
						<table>
							<tr class = 'blockss'>
								<td><img src="images/minion_happy.jpg" class='img img-responsive pull-left'/></td>
								<td><p class='pull-left'>Rashmi Ojha</p></td>
							</tr>
							<tr class='blockss'>
								<td><img src="images/minion_happy.jpg" class='img img-responsive pull-left'/></td>
								<td><p style='pull-left'>Sonali Murdia</p></td>
							</tr>
							<tr class = 'blockss'>
								<td><img src="images/minion_confused.png" class='img img-responsive pull-left'/></td>
								<td><p class='pull-left'>Saba S. Kathawala</p></td>
							</tr>
						</table>
					</div>
				</div>

				<div class='row'>
					<div class = 'col-md-7 col-xs-12'>
						<p style='font-size:14px;'>2015 SafeHouse. ALL Rights Reserved.
						<a href="www.sdhfks.com"><span> Privacy Policy</span></a>
						|
						<a href="www.sdhfks.com"><span> Terms of Service</span></a></p>
					</div>
				</div>
			</div>
		<!-- Fourth container ends -->	
		</div>
		<!-- Footer ends -->	
	</div>
	<!-- Main container ends -->	
	<?php
 		include_once("sign_in.php");
 	?>
</body>
</html>

<script src='js/jquery.js'></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/aes.js"></script>
<script src="js/sha3.js"></script>
<script src="js/crypt.js"></script>
<script src="js/ValidateLogin.js"></script>

<script>

$(document).ready(function()
{

	$( ".change>li>img" ).hover(
		function() {
	    	var name = $(this).attr("data-id");
	    	$(this).attr("src","images/"+name+".jpg");
	  	},
	  	function() {
	    	var name = $(this).attr("data-id");
	    	$(this).attr("src","images/"+name+"_grey.jpg");
	  	}
	);

	 
	$("#confirm").blur(function(){
		$("#error").html("");
		if($("#password").val() != $("#confirm").val())
		{
			$("#error").html("Passwords do not match");
			$("#click1").attr('disabled','disabled');
		}
		else
		{
			$("#check").html("");
			$("#click1").removeAttr('disabled');
		}
	});

	$("#login").click(function(){
	  	$("#overlay").show();
	   	$("#1").show();
	});

	$(".one").click(function()
	{
		$("#overlay").hide();
		$("#1").hide();
	});//pop-up

	$(".cacc").click(function()
	{
		$("#overlay").hide();
		$("#1").hide();
	    $('html, body').animate({
	        scrollTop: $(".sign").offset().top
	    }, 1000);
	});

});

$("#passgen").click(function()
{
  $("#overlay").show();
  // $(".pop-upbox").show();
  $("#2").show();
});

$("#pwdgen").click(function()
{
  var length = $("#2 select").find("option:selected").val();
  $.getJSON("http://localhost/SafeHouse/pwd_gen.php",{length:length},function(data,status)   
  {
    console.log("Pass "+data.msg);
    $("#genpwd").val(data.msg);
  });
});

</script>


<?php
	endif;
?>