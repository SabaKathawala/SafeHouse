<?php 
session_start();
  if(!isset($_SESSION['login'])):
  header("Location: HomePage.php");
  else:
?>

<html>

<head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/css/font-awesome.min.css">

  <style type="text/css">

    @font-face {
      font-family: 'FontAwesome';
      src: url("fonts/fonts/FontAwesome.otf");
      src: url("fonts/fonts/Oregon LDO.ttf");
      font-family:'Oregon LDO';
    }

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

    .edit_blocks ul{
      list-style-type: none;
      padding: 0;
    }

    .edit_blocks li{
      padding: 10px 0 10px 0;
      white-space: nowrap;
      left: 0;
    }
    .edit_blocks table
    {
      margin-top: 30px;
    }


    .edit_blocks table td{
      padding-bottom: 20px;
      color:#222;
      word-spacing: 4px;
      text-align: justify;
      line-height: 1.6;
    }

    
    i{
      color:#72c02c;
      padding: 4px 4px 4px 4px;
    }

    .line{
       border-top:dotted 2px #72c02c;
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
        <table>
          <tr><td><center><img src="images/EasyPasswordKeeper_zps95a1048d.png"></center></td></tr>
          <tr><td><h2>Local Encryption<h2></td></tr>
          <tr>
            <td>We use AES-256 encryption, the strongest available. We encrypt your passwords on your own computer or mobile device, so readable passwords are never sent over the Internet, not even to our own servers.</td>
          </tr>
            <tr><td class='line'></td></tr> 
          <tr><td><h2>Master Password<h2></td></tr>
          <tr>
            <td>Your Master Password is the key that encrypts and decrypts your data.
              Technically, we use your Master Password to generate the mathematical key used to encrypt and decrypt your data.
              Your Master Password enables you to access all of the important information you have put into your SafeHouse. Make sure that you don't ever lose or forget your Master Password, because SafeHouse cannot reset it for you.
            </td>
          </tr>
          <tr><td class='line'></td></tr> 
          <tr><td><h2>Password Generator<h2></td></tr>
          <tr>
            <td>SafeHouse makes it easy for you to add additional layers of security by having a different, high-quality password for each of your online accounts without any extra effort on your part.</td>
          </tr>
          <tr><td class='line'></td></tr> 
          <tr><td><h2>SafeHouse Services<h2></td></tr>
          <tr>
            <td>
              <ul>
                <li><i class='fa fa-plus'></i>Add Passwords</li>
                <li><i class='fa fa-cloud-download'></i>Retrieve Passwords</li>
                <li><i class='fa fa-pencil'></i>Update Passwords</li>
                <li><i class='fa fa-times'></i>Delete Passwords</li>
                <li><i class='fa fa-pencil'></i>Change Master Password</li>
                <li><i class='fa fa-sign-in'></i>Login from SafeHouse</li>
              </ul>
            </td>
          </tr>
          <tr><td class='line'></td></tr> 
        </table>
      </center>
  </div>
</div>
</body>
</html>


<?php
  endif;
?>