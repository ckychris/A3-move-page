<!DOCTYPE html>
<html>
   <head>
      <title>Silverado - Contact page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
      <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet" type="text/css">
      <style>
            <?php require_once('CSS/global.css'); ?>
            <?php require_once('CSS/contact.css'); ?>
      </style>
      <script src="app/views/JS/jquery-2.1.4.min.js"></script>
   </head>
   <body>
      <div id="warpper">
         <!-- header + warpper !-->
         <?php require_once('header+nav.php'); ?>
         <!-- content !-->
         <form id="contact" action='http://titan.csit.rmit.edu.au/~e54061/wp/testcontact.php' method="post">
            <fieldset>
               <legend>Contact us</legend>
               <div id="email">Email address:</div>
               <input type="email"  name="email" placeholder="david@google.com" required/>
               <div id="subject">Message type:</div>
               <select name="subject" required>
                  <option value="GE">General Enquiry</option>
                  <option value="GCB">Group and Corporate Bookings</option>
                  <option value="SC">Suggestions &amp; Complaints</option>
               </select>
               <div id="text">Leave message here:</div>
               <textarea input type="text" name="message" rows="4" cols="50" placeholder="Please enter commment." required></textarea>
               <input type="submit" value="Submit"/>
            </fieldset>
         </form>
         <!-- footer !-->
         <?php require_once('footer.php'); ?>
      </div>
   </body>
</html>