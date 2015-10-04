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
                        <input type="button" value="Find" onclick='subBtn("movie")'>
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
                        <input type="button" value="Find" onclick='subBtn("day")'>
                     </td>
                  </tr>
               </table>
            </form>
         </div>
         <div id="content-warpper"></div>
         <!-- footer !-->
         <?php require_once('footer.php'); ?>
      </div>
   </body>
</html>