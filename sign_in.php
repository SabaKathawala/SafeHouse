	<div class='container'>
		<div class='row'>
			<div class='col-md-12 col-xs-12'>
				<div id ='overlay'>
					<div id = '1' class='pop-upbox'>
						<i class = 'fa fa-times pull-right one'></i>
						<h2>Move into your SafeHouse. Log In ;)</h2>
						<form id='login-form'>
							<table class='pull-left'>
								<tr>
									<td><div id='l_error' style='color:red;'></div></td>
								</tr>
								<!-- <br/> -->
							    <tr>
							        <td>Email Id: </td>
							    	<td><input class='form-control' id='l_email' name='email'/></td>
								</tr>
								<tr>
								    <td>Password: </td>
								    <td><input class='form-control' type='password' id='l_password' name='password'/></td>
								</tr>
								<tr>
							      <td valign="top"> Validation code:</td>
							      <td><img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg' style='float:left; width:150px; height:50px;' ><br/>
							        <label for='message'>Enter the code above here :</label>
							        <br/>
							        <input id="captcha_code" name="captcha_code" class='form-control' type="text"/>
							        <br/>
							        Can't read the image? click <a href='javascript: refreshCaptcha();' style='color:#72c02c;font-weight:bold;'>here</a> to refresh.</td>
							    </tr>
							    								
								<tr>
								    <td><button class='btn'>Log In</button></td>
								</tr>
							</table>
						</form>
						<div class="jumbotron pull-right">
							<h3 style='color:#72c02c'>Not Registered yet?</h3>
							<p><a class="btn btn-primary btn-lg cacc" role="button" href="#sign">Sign Up</a></p>
						</div>
					</div>			          
					<div id = '2' class='pop-upbox'>
			            <i class = 'fa fa-times pull-right one'></i>  
			            <table>
			              <tr>
			                <td><h2>Password Generator</center></td>
			              </tr>
			              <tr>
			                <td>Select length : </td>
			                <td><select>
			                  <option value='8'>8</option>
			                  <option value='9'>9</option>
			                  <option value='10'>10</option>
			                  <option value='11'>11</option>
			                  <option value='12'>12</option>
			                </select></td>  
			              </tr>
			              <tr><td><button class='btn btn-success' id="pwdgen">Generate</button></td></tr>
			              <tr><td><input class='form-control' id = 'genpwd'/></td></tr>
			            </table>          
			        </div>  
			        <div id = 'loading' style='display:none;'> 
			        	<i style='position:fixed;left:45%;top:45%;font-size:55px;color:#72c02c;z-index:100;'class="fa fa-spinner fa-spin"></i>
			        </div>              
				</div>
			</div>
		</div>
	</div>

	<script type='text/javascript'>
		function refreshCaptcha(){
			var img = document.images['captchaimg'];
			img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
		}
	</script>