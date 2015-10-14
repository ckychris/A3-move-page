<!doctype html>
<html lang="en">
   <head>
      <title>Silverado - Your Ticket page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
      <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
      <style>
            <?php require_once('CSS/global.css'); ?>
            <?php require_once('CSS/viewTicket.css'); ?>
      </style>
      <script src="app/views/JS/jquery-2.1.4.min.js"></script>
      <script src="app/views/JS/viewTicket.js"></script>
   </head>
   <body>
      <div id="warpper">
         <!-- content !-->
         <div id="content-warpper">
            <div class="reminder">Login with the following details to view your tickets again!</div>
            <div class="confirm">
               <?php
                  if($_POST["email"]&&["token"]){
                     $email = '<div class="loginInfo">Your login email: '.'<div class="email">'. $_POST["email"] .'</div></div>';
                     $token = '<div class="loginInfo">Your login password: '.'<div class="token">'. $_POST["token"] .'</div></div>';
                     echo $email;
                     echo $token;
                  }
               ?>
               <div class="customerDetails"></div>
            </div>
            <!-- All image copyright to http://fenglish.ru!-->
            <!-- All image copyright to http://fenglish.ru!-->
         </div>
      </div>
   </body>
</html>