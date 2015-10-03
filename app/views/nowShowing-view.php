<!doctype html>
<html lang="en">
   <head>
      <title>Silverado - Now showing page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
      <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
      <link href='CSS/nowShowing.css' rel='stylesheet' type='text/css'>
      <style>
            <?php require_once('CSS/global.css'); ?>
            <?php require_once('CSS/nowShowing.css'); ?>
      </style>
      <script src="app/views/JS/jquery-2.1.4.min.js"></script>
      <script src="app/views/JS/nowShowing.js"></script>
   </head>
   <body>
      <div id="warpper">
         <!-- header + warpper !-->
         <?php require_once('header+nav.php'); ?>
         <!-- content !-->
         <div id="sortForm">
            <form id="sort" action="https://<?php echo $_SERVER['SERVER_NAME']; ?>/~e54061/wp/moviesJSON.php" method="post">
               <legend class="sortTitle">Select Moives</legend>
               <table id="sortTable">
                  <tr>
                     <th>Movie Name</th>
                     <td>
                        <select id="movie" name="movie" value="">
                           <option value="AC">Mission Impossible</option>
                           <option value="CH">Inside Out</option>
                           <option value="AF">Girlhood</option>
                           <option value="RC">Train Wreck</option>
                        </select>
                     </td>
                        
                     <td>
                        <input type="button" value="Find" onclick="subBtn(this.id,this.value)">
                     </td>
                  </tr>
                  <tr>
                     <th>Week Day</th>
                     <td>
                        <select id="day" name="day" value="">
                           <option value="Monday">Monday</option>
                           <option value="Tuesday">Tuesday</option>
                           <option value="Wednesday">Wednesday</option>
                           <option value="Thursday">Thursday</option>
                           <option value="Friday">Friday</option>
                           <option value="Saturday">Saturday</option>
                           <option value="Sunday">Sunday</option>
                        </select>
                     </td>
                        
                     <td>
                        <input type="button" value="Find" onclick="subBtn(this.id,this.value)">
                     </td>
                  </tr>
               </table>
            </form>
         </div>
         <div id="content-warpper">
            <div class="moive">
               <div class="moiveTitle">
                  I FK YOU FOREVER
               </div>
               <div class="mainPane">
                  <div class="leftPane">
                     <img class="previewImg"alt="cover" src="https://titan.csit.rmit.edu.au/~e54061/wp/movie-service/AF.jpg"></img>
                  </div>
                  <div class="rightPane">
                     <div class="summary">This is not the Louvre</div>
                     <div class="rating"><img alt="rating" src="https://titan.csit.rmit.edu.au/~e54061/wp/movie-service/rMA.jpg"></img></div>
                     <div class="des0">The hugely anticipated new film from writer/director Celine Sciamma (Tomboy, Water Lilies), GIRLHOOD is a sensational story of female empowerment set in the tough neighbourhoods of Paris.</div>
                  </div>
               </div>
               <div class="toggle" onclick="toggle(this)">
                  read more
               </div>
               <div class="hiddenPane">
                  <div class="subTitle">Summary</div>
                  <div class="des1">Mariame (an incendiary, star-making performance from Karidja Touré) is a shy 16-year-old who lives with her mostly absent mother, a domineering older brother, and two younger sisters of whom she largely takes responsibility for caring. Left behind at high school where she’s told her grades are too poor to continue, Mariame is soon lured out of her shell by three vivacious neighborhood teens. Enthralled by their bravado and brash energy, Mariame quickly adopts their flashier look and adapts to their bolder and often reckless behavior, making both foolish and brave choices as she struggles towards independence.</div>
                  <div class="des2">Depicting a side of Paris unseen from the top of the Eiffel Tower, GIRLHOOD finds irresistible energy in these young characters for whom attitude is everything. Featuring sumptuous cinematography and a jubilant soundtrack, the film builds momentum with every scene, and exudes life from every frame.</div>
                  <div class="trailer">
                     <div class="subTitle">Trailer</div>
                     <video class="video" controls>
                        <source src="https://titan.csit.rmit.edu.au/~e54061/wp/movie-service/AF.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                     </video>
                  </div>
                  <div class="subTitle">Reservation</div>
                  <div class="regbtn"></div>
               </div>
            </div>
         </div>
         <!-- footer !-->
         <?php require_once('footer.php'); ?>
      </div>
   </body>
</html>