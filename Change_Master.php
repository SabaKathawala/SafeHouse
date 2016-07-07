<?php 
session_start();
  if(!isset($_SESSION['login'])):
  header("Location: HomePage.php");
  else:
?>

<html>

<head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="css/css/font-awesome.min.css"/>

  <style type="text/css">

    body
    {
      font-family: 'Oregon LDO';
    }

    h2{
      color: #72c02c;
    }

    .edit_blocks{
      border-top:solid 4px #72c02c;
      margin-top:158px;
        
    }

    .edit_blocks table
    {
      margin-top: 30px;
    }


    .edit_blocks table td
    {
      padding-bottom: 20px;
      padding-right: 20px;
      color:#222;
      word-spacing: 1px;
      text-align: left;
      /*text-transform: capitalize;*/
    }

    #over
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

    .pop-upbox
    {
      padding: 10px;
      position:absolute;
      display: none;
      left:39%;
      top:18%;
      width:1000px;
      z-index: 10;
      background-color: white;
      /*background-image: url("../images/shoes/background.jpg");*/
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
      /*font-family: 'Quikhand';*/
      color: #72c02c;
      word-spacing: 3px;
      letter-spacing: 2px;
    }

    .pop-upbox img{
      float: right;
      margin-right: 20px;
      height: 550px;
    }

    .pop-upbox table td{
      padding:10px;
      font-family: 'Oregon LDO';
      color:#666;
      font-size: 22px;
      /*font-weight: bold;*/
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
  
    .container
    {
      width:80%;
      margin:0 auto
    }

    i
    {
      color:#72c02c;
      padding: 4px 4px 4px 4px;
    }

    .line{
       border-top:dotted 2px #72c02c;
    }
    .btn{
      width: 120px;
      background-color: #72c02c;
      font-size: 22px;
    }


  </style>
</head>

<body>
  <?php
    include_once("header.php");
  ?>
  
  <div class='container'>
    <div class='edit_blocks'>
    <center>
                  
              <h1>Change Master Password: </h1>
              <table>
                  <tr>
                    <td colspan='13'><hr/></td>
                  </tr>
                  <tr>
                    <td>Current Master Password: </td>
                    <td><input class='form-control' id='currentpass' type='password'></td>
                  </tr>
                  <tr>
                    <td>New Master Password: </td>
                    <td><input class='form-control' id='newpass' type='password'></td>
                  </tr>
                  <tr>
                    <td>Confirm Master Password: </td>
                    <td><input class='form-control' id='confirmpass' type='password'></td>
                  </tr>
                  <tr>
                    <td><button class='btn btn-success' id='change_acc'>Change</button></td>
                  </tr>
                </table>          
                
          </div>
        </div>
      </div>
    </div>

    <div class='container'>
    <div class='row'>
      <div class='col-md-12'>
        <div id ='over'>
          <div id = '3' class='pop-upbox'>
            <table>
              <tr>
                <td><h2>Your password was changed successfully.</center></td>
              </tr>
                <tr>
              <tr>
                <td>For successful updates, please wait for 15-20 seconds and then click on proceed to logout from your account :)</td>
              </tr>
              <tr><td><button class='btn btn-success' id='change'>Proceed</button></td></tr>
            </table>          
          </div>                
        </div>
      </div>
    </div>
  </div>
  


  </body>
  </html>
<script src='js/jquery.js'></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/aes.js"></script>
<script src="js/sha3.js"></script>
<script src="js/crypt.js"></script>
<script>
$("#change_acc").click(function()
{
  if($("#newpass").val()!="" && $("#confirmpass").val()!="" && $("#currentpass").val()!="")
  {  
    if($("#newpass").val()==$("#confirmpass").val())
    {
      if($("#newpass").val().length>=8)
      {
        var cp=$("#currentpass").val();
        var np=$("#newpass").val();
        
        $.getJSON("http://localhost/SafeHouse/loginchecker.php",{add:true},function(data,status)   
        {
         
          temp=data.cid;
          
          var str = dcrypt(cp,data.aid);
                                    
          if(str == data.cid)
          {
            var aid2 = ecrypt(np,data.cid);
            $.getJSON("http://localhost/SafeHouse/loginchecker.php",{set_auth:true, customer_id:data.cid,auth_id:aid2},function(data,status)
            {
              if(data.status=='failed')
              {
                alert("unsuccessful: "+data.msg);
                $(".edit_blocks").find("input[type=password]").val("");
              }
              else if(data.status=='success')
              {   
                $(".edit_blocks").find("input[type=password]").val("");
              }
            });
            $.getJSON("http://localhost/SafeHouse/loginchecker.php",{retrieve:true, category:'google'},function(data,status)   
            {
              if(data.status=="success")
              {
                //alert(cp);
                var str1=dcrypt(cp,data.ep);//force conversion
                //alert(str1); 
                var ep2 = ecrypt(np,str1);//force conversion 
                $.getJSON("http://localhost/SafeHouse/loginchecker.php",{update_acc:true,category:'google', pass:ep2},function(data,status)  
                {
                  if(data.status=="success")
                  {
                    $(".edit_blocks").find("input[type=password]").val("");
                  } 
                  else {
                    alert("Update was unsuccessful. Please try after sometime :(");
                      $(".edit_blocks").find("input[type=password]").val("");
                    }
                });                  
              }
              else {
                //alert(data.msg);
                $(".edit_blocks").find("input[type=password]").val("");
              }
            });

            $.getJSON("http://localhost/SafeHouse/loginchecker.php",{retrieve:true, category:'facebook'},function(data,status)   
            {
              if(data.status=="success")
              {
                var str1=dcrypt(cp,data.ep);
                //alert(str1);
                var ep2 = ecrypt(np,str1);//force conversion 
                $.getJSON("http://localhost/SafeHouse/loginchecker.php",{update_acc:true,category:'facebook', pass:ep2},function(data,status)  
                {
                  if(data.status=="success")
                  {
                    alert("Done");
                    $(".edit_blocks").find("input[type=password]").val("");
                  }
                  else {
                    alert("Update was unsuccessful. Please try after sometime :(");
                    $(".edit_blocks").find("input[type=password]").val("");
                  }
                });                  
              }
              else {
                //alert(data.msg);
                $(".edit_blocks").find("input[type=password]").val("");
              }

              
            });
           $("#over").show();
              $("#3").show();
   
              
          }
          else{
              alert("Wrong Current Master Password :(");
              $(".edit_blocks").find("input[id=currentpass]").val("");
          }
        });
      }
      else{
        alert("Master Password must be atleast 8 characters long");
        $(".edit_blocks").find("input[id=confirmpass], input[id=newpass]").val("");  
      }
    }
     else
    {
      alert("Passwords do not match (>_<)");
      $(".edit_blocks").find("input[id=confirmpass], input[id=newpass]").val("");
    }
  }
  else{
    alert("Please fill all entries correctly");
  }
});


</script>
<script type="text/javascript">

$("#change").click(function()
{

  $.get("http://localhost/SafeHouse/mail_new.php",{change:true},function(data,status)
  {
    location.reload(true);
  });
});
 
</script>
<?php
endif;
?>