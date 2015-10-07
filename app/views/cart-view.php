<?php session_start(); ?>
<!doctype html>
<html lang="en">
   <head>
      <title>Silverado - Index page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
      <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
      <style>
            <?php require_once('CSS/global.css'); ?>
            <?php require_once('CSS/cart.css'); ?>
      </style>
      <script src="app/views/JS/jquery-2.1.4.min.js"></script>
      <script src="app/views/JS/cart.js"></script>
   </head>
   <body>
      <div id="warpper">
         <!-- header + warpper !-->
         <?php require_once('header+nav.php'); ?>
         <!-- content !-->
         <div id="content-warpper">
            <form id="login" action='databaseIn.php' onsubmit="return validateForm();" method="post">
                <fieldset>
                    <legend class="book">Cart</legend>
                        <div class="cusDes"><span>Name: </span><span class="valid"></span></div>
                        <input type="text" name="name" value="<?php if(isset($_SESSION["name"])){echo $_SESSION["name"];}?>" required></input>
                        <div class="cusDes"><span>Email: </span><span class="valid"></span></div>
                        <input type="email" name="email" value="<?php if(isset($_SESSION["email"])){echo $_SESSION["email"];}?>" required></input>
                        <div class="cusDes"><span>Phone: </span><span class="valid"></span></div>
                        <input type="text" name="phone" value="<?php if(isset($_SESSION["phone"])){echo $_SESSION["phone"];}?>" required></input>
                        <input type="submit" value="Submit"/>
                </fieldset>
            </form>
         </div>
         <!-- footer !-->
         <?php require_once('footer.php'); ?>
      </div>
   </body>
</html>