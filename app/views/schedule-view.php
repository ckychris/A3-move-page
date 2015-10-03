<!DOCTYPE html>
<html>
   <head>
      <title>Silverado - chedule page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
      <link href="http://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet" type="text/css">
      <style>
            <?php require_once('CSS/global.css'); ?>
            <?php require_once('CSS/schedule.css'); ?>
      </style>
      <script src="app/views/JS/jquery-2.1.4.min.js"></script>
   </head>
   <body>
      <div id="warpper">
         <!-- header + warpper !-->
         <?php require_once('header+nav.php'); ?>
         <!-- content !-->
         <div class="content-warpper">
            <div class="tableTitle"><b>Price table</b></div>
            <table class="table1">
               <tr>
                  <th>Price List</th>
                  <th row=2>Mon - Tue (All Day)
                     <br/> Mon - Fri (1pm only)
                  </th>
                  <th row=2>Wed - Fri (not 1pm)
                     <br/> Sat - Sun (All Day)
                  </th>
               </tr>
               <tr>
                  <td>Standard-Full</td>
                  <td>$12</td>
                  <td>$18</td>
               </tr>
               <tr>
                  <td>Standard-Conc</td>
                  <td>$10</td>
                  <td>$15</td>
               </tr>
               <tr>
                  <td>Standard-Child</td>
                  <td>$8</td>
                  <td>$12</td>
               </tr>
               <tr>
                  <td>FirstClass-Adult</td>
                  <td>$25</td>
                  <td>$30</td>
               </tr>
               <tr>
                  <td>FirstClass-Child</td>
                  <td>$20</td>
                  <td>$25</td>
               </tr>
               <tr>
                  <td>Beanbag*</td>
                  <td>$20</td>
                  <td>$30</td>
               </tr>
            </table>
            <div id="reminder-warpper">
               <div id="reminder">* Beanbag price allows up to 2 adults OR 1 adult + 1 child OR up to 3 children. One price fits all!</div>
            </div>
            <div class="tableTitle"><b>Weekly Schedule</b></div>
            <table class="table2">
               <tr>
                  <th>Mon - Tue</th>
                  <th>Wed - Fri</th>
                  <th>Sat - Sun</th>
               </tr>
               <tr>
                  <td>1pm - Childrens</td>
                  <td>1pm - Romantic Comedy</td>
                  <td>12pm - Childrens</td>
               </tr>
               <tr>
                  <td>6pm - Art / Foreign</td>
                  <td>6pm - Childrens</td>
                  <td>3pm - Art / Foreign</td>
               </tr>
               <tr>
                  <td>9pm - Romantic Comedy</td>
                  <td>9pm - Action</td>
                  <td>6pm - Romantic Comedy</td>
               </tr>
               <tr>
                  <td id="blankTd" colspan="2"></td>
                  <td>9pm - Action</td>
               </tr>
            </table>
         </div>
         <!-- footer !-->
         <?php require_once('footer.php'); ?>
      </div>
   </body>
</html>