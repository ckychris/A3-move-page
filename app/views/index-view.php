<!doctype html>
<html lang="en">
   <head>
      <title>Silverado - Index page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
      <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
      <style>
            <?php require_once('CSS/global.css'); ?>
            <?php require_once('CSS/index.css'); ?>
      </style>
      <script src="JS/jquery-2.1.4.min.js"></script>
      <script src="JS/index.js"></script>
   </head>
   <body>
      <div id="warpper">
         <!-- header + warpper !-->
         <?php require_once('header+nav.php'); ?>
         <!-- content !-->
         <div id="content-warpper">
            <div id="banner1" class="banner"></div>
            <div id="slider">
               <!-- All image copyright to www.imdb.com!-->
               <div>
                  <a href="nowShowing.html"><img src="app/views/moive1/cover.jpg" alt="Fantastic Four (2015)"></a>
                  <a href="nowShowing.html"><img src="app/views/moive2/cover.jpg" alt="Shaun the Sheep Movie (2015)"></a>
                  <a href="nowShowing.html"><img src="app/views/moive3/cover.jpg" alt="The Gift (VI) (2015)"></a>
                  <a href="nowShowing.html"><img src="app/views/moive4/cover.jpg" alt="Mission: Impossible - Rogue Nation (2015)"></a>
                  <a href="nowShowing.html"><img src="app/views/moive1/cover.jpg" alt="Fantastic Four (2015)"></a>
               </div>
            </div>
            <div id="banner2" class="banner"></div>
            <div class="passage-warpper">
               <div class="passage">
                  <div class="box-top"></div>
                  <h1>What can you expect?</h1>
                  <p>Silverado provides the best moive experince that might exceed your expectation. It's desgined to deliver top
                  of line services with care to the whole family. Enjoy a great evening at Silverado Cinema by booking tickets below.</p>
               </div>
               <div class="passage">
                  <div class="box-top"></div>
                  <h1>What is new?</h1>
                  <p>Silverado has added several upgrades including 3D projection facilities, Dolby lighting and sound. Bean Bag
                  and motion chair further increase moive experience.</p>
               </div>
            </div>
         </div>
         <!-- footer !-->
         <?php require_once('footer.php'); ?>
      </div>
   </body>
</html>