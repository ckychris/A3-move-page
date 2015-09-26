<!doctype html>
<html lang="en">
   <head>
      <title>Silverado - Now showing page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
      <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
      <style>
            <?php require_once('CSS/global.css'); ?>
            <?php require_once('CSS/nowShowing.css'); ?>
      </style>
   </head>
   <body>
      <div id="warpper">
         <!-- header + warpper !-->
         <?php require_once('header+nav.php'); ?>
         <!-- content !-->
         <div id="content-warpper">
            <!-- moive 1 !-->
            <div class="moive">
               <div class="leftPane">
                  <a href="bookingPage.html">
                  <img class="previewImg" src="moive1/cover.jpg" alt="Fantastic Four (2015)">
                  </a>
               </div>
               <div class=“rightPane”>
                  <div class="moiveTitle">Fantastic Four</div>
                  <div>PG-13 | Action, Adventure, Sci-Fi</div>
                  <div id="movieDes1" class="movieDes">
                     <div><b>Description:</b> Four young outsiders teleport to an alternate and
                        dangerous universe which alters their physical
                        form in shocking ways. The four must learn to 
                        harness their new abilities and work together
                        to save Earth from a former friend turned 
                        enemy.
                     </div>
                     <div><b>Director:</b> Josh Trank</div>
                     <div><b>Writers:</b> Writers: Simon Kinberg (screenplay), 
                        Jeremy Slater (screenplay), 3 more credits
                     </div>
                     <div><b>Stars:</b> Miles Teller, Kate Mara, Michael B. Jordan</div>
                  </div>
                  <div class="button-warpper"><span class="button" onclick="toggle('movieDes1')">show/hide description</span></div>
                  <div class="button-warpper">
                     <a class="button" href="schedule.html">schedule</a>
                  </div>
                  <div class="button-warpper">
                     <a class="button" href="bookingPage.html">Book tickets</a>
                  </div>
               </div>
            </div>
            <!-- moive 2 !-->
            <div class="moive">
               <div class="leftPane">
                  <a href="bookingPage.html">
                  <img class="previewImg" src="moive2/cover.jpg" alt="Shaun the Sheep Movie (2015)">
                  </a>
               </div>
               <div class=“rightPane”>
                  <div class="moiveTitle">Shaun the Sheep Movie</div>
                  <div>PG | Animation, Adventure, Comedy</div>
                  <div id="movieDes2" class="movieDes">
                     <div><b>Description:</b> When Shaun decides to take the day off and have some fun, he gets a little more action than he 
                        bargained for. A mix up with the Farmer, a caravan and a very steep hill lead them all to the Big City
                        and it's up to Shaun and the flock to return everyone safely to the green grass of home.
                     </div>
                     <div><b>Director:</b> Mark Burton, Richard Starzak</div>
                     <div><b>Writers:</b> Mark Burton (screenplay), Richard Starzak (screenplay)</div>
                     <div><b>Stars:</b> Justin Fletcher, John Sparkes, Omid Djalili</div>
                  </div>
                  <div class="button-warpper"><span class="button" onclick="toggle('movieDes2')">show/hide description</span></div>
                  <div class="button-warpper">
                     <a class="button" href="schedule.html">schedule</a>
                  </div>
                  <div class="button-warpper">
                     <a class="button" href="bookingPage.html">Book tickets</a>
                  </div>
               </div>
            </div>
            <!-- moive 3 !-->
            <div class="moive">
               <div class="leftPane">
                  <a href="bookingPage.html">
                  <img class="previewImg" src="moive3/cover.jpg" alt="The Gift (VI) (2015)">
                  </a>
               </div>
               <div class=“rightPane”>
                  <div class="moiveTitle">The Gift (VI)</div>
                  <div>R | Mystery, Thriller</div>
                  <div id="movieDes3" class="movieDes">
                     <div><b>Description:</b> A young married couple's lives are thrown into a harrowing tailspin when an acquaintance from the 
                        husband's past brings mysterious gifts and a horrifying secret to light after more than 20 years.
                     </div>
                     <div><b>Director:</b> Joel Edgerton</div>
                     <div><b>Writers:</b> Joel Edgerton</div>
                     <div><b>Stars:</b> Jason Bateman, Rebecca Hall, Joel Edgerton</div>
                  </div>
                  <div class="button-warpper"><span class="button" onclick="toggle('movieDes3')">show/hide description</span></div>
                  <div class="button-warpper">
                     <a class="button" href="schedule.html">schedule</a>
                  </div>
                  <div class="button-warpper">
                     <a class="button" href="bookingPage.html">Book tickets</a>
                  </div>
               </div>
            </div>
            <!-- moive 4 !-->
            <div class="moive">
               <div class="leftPane">
                  <a href="bookingPage.html">
                  <img class="previewImg" src="moive4/cover.jpg" alt="Remember Me (2010)">
                  </a>
               </div>
               <div class=“rightPane”>
                  <div class="moiveTitle">Remember Me</div>
                  <div>PG-13 | Drama, Romance</div>
                  <div id="movieDes4" class="movieDes">
                     <div><b>Description:</b> A romantic drama centered on two new lovers: Tyler, whose parents have split in the wake of his
                        brother's suicide, and Ally, who lives each day to the fullest since witnessing her mother's murder.
                     </div>
                     <div><b>Director:</b> Allen Coulter</div>
                     <div><b>Writers:</b>  Will Fetters (as William Fetters)</div>
                     <div><b>Stars:</b> Robert Pattinson, Emilie de Ravin, Caitlyn Rund</div>
                  </div>
                  <div class="button-warpper"><span class="button" onclick="toggle('movieDes4')">show/hide description</span></div>
                  <div class="button-warpper">
                     <a class="button" href="schedule.html">schedule</a>
                  </div>
                  <div class="button-warpper">
                     <a class="button" href="bookingPage.html">Book tickets</a>
                  </div>
               </div>
            </div>
         </div>
         <!-- footer !-->
         <?php require_once('footer.php'); ?>
      </div>
   </body>
   <script src="JS/jquery-2.1.4.min.js"></script>
   <script src="JS/nowShowing.js"></script>
</html>