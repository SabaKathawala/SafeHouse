<?php 
// session_start();
//   if(!isset($_SESSION['login'])):
//   header("Location: HomePage.php");
//   else:
?>

<html>

<head>

  <style type='text/css'>
    
    fieldset,form
    {
      padding:0;
      border:0
    }
    
    *
    {
      line-height:1;
      outline:0
    }

    .container
    {
      width:90%;
      margin:0 auto
    }

    #main-header
    {
      background:white;
      padding:10px;
    }

    #main-header.header-slim
    {
      border-bottom:0;
      -webkit-box-shadow:0 2px 4px rgba(0,0,0,0.12);
      -moz-box-shadow:0 2px 4px rgba(0,0,0,0.12);
      box-shadow:0 2px 4px rgba(0,0,0,0.12)
    }
    #main-header.header-fixed
    {
      position:fixed;
      width:100%;
      top:0;
      left:0;
      z-index:10;
    }

    .main-menu
    {
      font-size: 18px;
      letter-spacing: 2px;
      word-spacing: 2px;
      line-height:1;
      list-style:none;
      margin:0;
      text-align: justify;
    }

    .main-menu li
    {
      border-left:3px solid #72c02c;
      float:left;
      padding: 0 12px 0 12px;
      line-height:1;
      font-weight:bold;

    }

    .main-menu a
    {
      color:#323232;
      text-decoration:none;
      text-transform:uppercase;
    }
    
    .main-menu a:hover
    {
      color:#72c02c;
      text-decoration:underline;
    }
    
    .main-menu li.active
    {
      color:#72c02c;
    }

    i
    {
        color:#72c02c;
        padding: 4px 4px 4px 4px;
    }

    .line
    {
         border-top:dotted 2px #72c02c;
    }


    #overlay
    {
      display: none;
      position:fixed;
      left:0;
      top:0;
      width:100%;
      height:100%;
      background-color: rgba(0,0,0,0.1);
      z-index: 10;
    }

    .pop-upbox{
      padding: 20px;
      position:absolute;
      display: none;
      left:39%;
      top:18%;
      width:1000px;
      z-index: 10;
      background-color: white;
      margin-left:-350px;
      margin-top: -100px;
      border:solid 10px #5cb85c;
      border-radius: 5px;
      
    } 
    .pop-upbox table{
      float: left;
      margin-top: 20px;
    }
    .pop-upbox h2{
      color: #72c02c;
      word-spacing: 3px;
      letter-spacing: 2px;
    }

   
    .pop-upbox table td{
      padding:5px;
      font-family: 'Oregon LDO';
      color:#666;
      font-size: 22px;
      font-weight: bold;
    }

    .form-control{
      width:300px;
      height:40px;
      border: 1px solid #A79F9F;
      background: transparent;
      font-size: 22px;
      font-weight: bold;
    }

    .pop-upbox .btn{
      background: transparent;
      color:#222;
      border-color: #5cb85c;
      width:120px;
      height:40px;
      font-size: 22px;
    }

    .pop-upbox .btn:hover{
      background:#72c02c;
      color:white;
      /*border-color: #A79F9F;*/
    }

    .pop-upbox .fa-times{
      color:#5cb85c;
      font-size: 22px;
    }

</style>
</head>

<body>

 <header id="main-header" class="header-fixed">
    <div class="container">
     <center> <img id='logo'src = "images/logo_new.jpg"/> </center>

      <nav class="main-menu">
      <ul>
        <li>
          <i class='fa fa-home'></i><a id='U' href="UserPage.php">Home</a>
        </li>
        <li>
          <i class='fa fa-key'></i><a href="#" id='passgen'>Password Generator</a>
        </li>
        <li>
        <i class='fa fa-lock'></i><a id = 'S' href="Security.php" >Security</a>
        </li>
        <li>
          <i class='fa fa-pencil'></i><a id = 'C' href="Change_Master.php">Change Master Password</a>
        </li>
        <li class="">
          <i class='fa fa-sign-out'></i><a href="#" id='logout'>Logout</a>
        </li>
        <li  style='border-right:3px solid #72c02c;'>
          <i class='fa fa-phone'></i><a href="Contact.php" target="_blank">Contact Us</a>
        </li>
      </ul>
    </nav>

    </div>
  </header>

  <div class='container'>
    <div class='row'>
      <div class='col-md-12'>
        <div id ='overlay'>
          <div id = '1' class='pop-upbox'>
            <i class = 'fa fa-times pull-right one'></i>            
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
        </div>
      </div>
    </div>
  </div>
  
</body>
<script src="js/jquery.js"></script>
<script type="text/javascript">

$(document).ready(function(){
  // alert(window.location.href);
  if(window.location.href == "http://localhost/SafeHouse/UserPage.php")
  {
    $("#U").css('color','#72c02c');
  }
  else if(window.location.href == "http://localhost/SafeHouse/Security.php")
  {
    $("#S").css('color','#72c02c');
  }
  else if(window.location.href == "http://localhost/SafeHouse/Contact.php")
  {
    $("#Co").css('color','#72c02c');
  }
  else if(window.location.href == "http://localhost/SafeHouse/Change_Master.php")
  {
    $("#C").css('color','#72c02c');
  }
  

$("#passgen").click(function()
{
  $("#overlay").show();
  // $(".pop-upbox").show();
  $("#2").show();
});

$("#logout").click(function()
{
  $.get("http://localhost/SafeHouse/loginchecker.php",{arg1:'logout'},function(data,status)
  {
    if(data.trim() == "success")
    {
      location.reload(true);
    }
  });
});

$(".one").click(function()
{
  $("#overlay").hide();
  $("#1").hide();
  $("#2").hide();
});//pop-up

$("#pwdgen").click(function()
{
  var length = $("#2 select").find("option:selected").val();
  $.getJSON("http://localhost/SafeHouse/pwd_gen.php",{length:length},function(data,status)   
  {
    console.log("Pass "+data.msg);
    $("#genpwd").val(data.msg);
  });
});
   
});
</script>
</html>

<?php 
// endif;
?>