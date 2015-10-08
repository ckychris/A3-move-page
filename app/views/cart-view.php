<?php session_start();?>
<?php
   function getPrice($type, $qty, $day, $time) {
      $discount = false;
      if ($day == "Monday" || $day == "Tuesday")
          $discount = true;
      if ($day == "Wednesday" || $day == "Thursday" || $day == "Friday" && $time == "1pm")
          $discount = true;
      if ($type == "SA") {
          return $qty *= $discount ? 12 : 18;
      }
      if ($type == "SP") {
          return $qty *= $discount ? 10 : 15;
      }
      if ($type == "SC") {
          return $qty *= $discount ? 8 : 12;
      }
      if ($type == "FA") {
          return $qty *= $discount ? 25 : 30;
      }
      if ($type == "FC") {
          return $qty *= $discount ? 20 : 25;
      }
      if ($type == "B1" || $type == "B2" || $type == "B3") {
          return $qty *= $discount ? 20 : 30;
      }
   }

   if(isset($_POST["movie"])){
      if(!isset($_SESSION["cart"])){
         $_SESSION["cart"] = null;
         $_SESSION["cart"]["screenings"] = array();
      }
      $screening;
      $screening["movie"] = $_POST["movie"];
      $screening["day"] = $_POST["day"];
      $screening["time"] = $_POST["time"];
      $screening["seats"] = null;
      $seatType = array("SA","SP","SC","FA","FC","B1","B2","B3");
      $sub = 0;
      foreach($seatType as $i){
         if($_POST[$i]!=0){
            $screening["seats"][$i] = null;
            $screening["seats"][$i]["quantity"] = $_POST[$i];
            $screening["seats"][$i]["price"] = getPrice($i, $_POST[$i], $_POST["day"], $_POST["time"]);
            $sub += $screening["seats"][$i]["price"];
            
         }
      }
      $screening["sub-total"] = $sub;
      array_push($_SESSION["cart"]["screenings"], $screening);
      $grand = 0;
      foreach($_SESSION["cart"]["screenings"] as $i){
         $grand += $i["sub-total"];
      }
      $_SESSION["total"] = $grand;
      $_SESSION["grand-total"] = $_SESSION["total"];
   }
?>
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
            <form id="buy" action='databaseIn.php' onsubmit="return validateForm();" method="post">
                <fieldset>
                    <legend class="book">Cart</legend>
                     <div class="cartItems"></div>
                     <div class="price"><span>Total: $</span><span class="total"> <?php if(isset($_SESSION["total"])){echo $_SESSION["total"];}else{echo "0.00";}?></span></div>
                     <details open>
                        <summary>Personal details</summary>
                        <div class="cusDes"><span>Name: </span><span class="valid"></span></div>
                        <input type="text" name="name" value="<?php if(isset($_SESSION["name"])){echo $_SESSION["name"];}?>" required></input>
                        <div class="cusDes"><span>Email: </span><span class="valid"></span></div>
                        <input type="email" name="email" value="<?php if(isset($_SESSION["email"])){echo $_SESSION["email"];}?>" required></input>
                        <div class="cusDes"><span>Phone: </span><span class="valid"></span></div>
                        <input type="text" name="phone" value="<?php if(isset($_SESSION["phone"])){echo $_SESSION["phone"];}?>" required></input>
                        <div class="cusDes"><span>Voucher: </span><span class="valid"></span></div>
                        <input type="text" name="voucher" value="<?php if(isset($_SESSION["voucher"])){echo $_SESSION["voucher"];}?>"></input>
                     </details>
                     <div class="price"><span>GrandTotal: $</span><span class="grandTotal"> <?php if(isset($_SESSION["grand-total"])){echo $_SESSION["grand-total"];}else{echo "0.00";}?></span></div>
                     
                     <div id="submit"><input class="button" type="button" value="EmptyCart" onclick="emptyCart()"/>
                     <input class="button" type="submit" value="CheckOut"/>
                     </div>
                </fieldset>
            </form>
         </div>
         <!-- footer !-->
         <?php require_once('footer.php'); ?>
      </div>
   </body>
</html>