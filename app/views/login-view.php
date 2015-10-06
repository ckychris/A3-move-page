<!doctype html>
<html lang="en">
   <head>
      <title>Silverado - Index page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
      <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
      <style>
            <?php require_once('CSS/global.css'); ?>
            <?php require_once('CSS/login.css'); ?>
      </style>
      <script src="app/views/JS/jquery-2.1.4.min.js"></script>
      <script src="app/views/JS/login.js"></script>
   </head>
   <body>
      <div id="warpper">
         <!-- header + warpper !-->
         <?php require_once('header+nav.php'); ?>
         <!-- content !-->
         <div id="content-warpper">
            <form id="login" action='viewTicket.php' method="post">
                <fieldset>
                    <legend class="book">Login</legend>
                        Email:<input type="email" name="email" value="" required></input>
                        Password:<input type="text" name="token" value="" required></input>
                        <input type="submit" value="Submit">
                </fieldset>
            </form>
         </div>
         <!-- footer !-->
         <?php require_once('footer.php'); ?>
      </div>
   </body>
</html>