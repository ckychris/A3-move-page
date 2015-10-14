<?php
session_start();
// following connection script credits to https://docs.google.com/document/d/1aSuNBf5XxyXBDOvaF-mm9ZVguE8F4aYiyyOxsCAyBKw/edit
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(E_ALL);

//insert data into table1---MovieBookingSession
// database name assignment
$dbFile = 'app/views/DB/example.db';

// create a connection to the SQLite DB file using PDO
$connection = new PDO('sqlite:' . $dbFile);
// throw exceptions when there is an error
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// return db rows as objects
$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

//insert data into table1
$query = 'INSERT INTO MovieBookingSession (CustID, Name, EmailAddress, Phone, TotalPrice, GrandTotal, VoucherCode, Token) 
          VALUES (:CustID, :Name, :EmailAddress, :Phone, :TotalPrice, :GrandTotal, :VoucherCode, :Token )';
$sth = $connection->prepare($query);
// add data from get params
$token = rand(10000,99999);
$sth->bindParam(':Name', $_SESSION["name"]);
$sth->bindParam(':EmailAddress', $_SESSION["email"]);
$sth->bindParam(':Phone', $_SESSION["phone"]);
$sth->bindParam(':TotalPrice', $_SESSION["total"]);
$sth->bindParam(':GrandTotal',$_SESSION["grand-total"]);
$sth->bindParam(':VoucherCode', $_SESSION["voucher"]);
$sth->bindParam(':Token', $token);
//check insert successfully or not
$sth->execute();

//function that we can get CustID
$custID = getCustID($token)[0]->CustID;
$ScCount = 0;
foreach($_SESSION["cart"]["screenings"] as $i){
  //insert data into table2---Screening
  $query = 'INSERT INTO Screening (CustID, MovieCode, Date, Time, SubTotal) 
            VALUES (:CustID, :MovieCode, :Date, :Time, :SubTotal)';
  $sth = $connection->prepare($query);
  // add data from get params
  
  $sth->bindParam(':CustID', $custID);
  $sth->bindParam(':MovieCode', $i["movie"]);
  $sth->bindParam(':Date', $i["day"]);
  $sth->bindParam(':Time', $i["time"]);
  $sth->bindParam(':SubTotal', $i["sub-total"]);
  $sth->execute();
      
      
  foreach($i["seats"] as $u => $k){
    //insert data into table3---TicketInfor
    $query = 'INSERT INTO TicketInfor (CustID, ScreeningID, TicketTypeID, Price, Qty) 
              VALUES (:CustID, :ScreeningID, :TicketTypeID, :Price, :Qty)';
    $sth = $connection->prepare($query);
    // add data from get params
    $sth->bindParam(':CustID', $custID);
    $sth->bindParam(':ScreeningID', $ScCount);
    $sth->bindParam(':TicketTypeID', $u);
    $sth->bindParam(':Price', $k["price"]);
    $sth->bindParam(':Qty', $k["quantity"]);
    $sth->execute();

  }
  $ScCount++;
}

//getAllFromTable1();
//getAllFromTable2();
//getAllFromTable3();


// get CustID so we can check email and token
function getCustID($token){
  // database name assignment
  $dbFile = 'app/views/DB/example.db';
  // create a connection to the SQLite DB file using PDO
  $connection = new PDO('sqlite:' . $dbFile);
  // throw exceptions when there is an error
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // return db rows as objects
  $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  //get CustID
  $query = 'SELECT CustID FROM MovieBookingSession WHERE EmailAddress=:EmailAddress AND Token=:Token';
  $sth = $connection->prepare($query);
  $sth->bindParam(':EmailAddress', $_SESSION["email"]);
  $sth->bindParam(':Token', $token);
  $sth->execute();
  //return CustID 
  $data = $sth->fetchAll();
  return $data;
}

/*
//test, get all infor from table 1 2 3 

function getAllFromTable1(){
  // database name assignment
  $dbFile = 'app/views/DB/example.db';
  // create a connection to the SQLite DB file using PDO
  $connection = new PDO('sqlite:' . $dbFile);
  // throw exceptions when there is an error
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // return db rows as objects
  $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  //get CustID
  $query = 'SELECT * FROM MovieBookingSession';
  $sth = $connection->prepare($query);
  $sth->execute();
  //return email and token that relative to CustID
  echo "<pre>";
  // print everything out
  print_r($sth->fetchAll());
  echo "</pre>";
}

function getAllFromTable2(){
  // database name assignment
  $dbFile = 'app/views/DB/example.db';
  // create a connection to the SQLite DB file using PDO
  $connection = new PDO('sqlite:' . $dbFile);
  // throw exceptions when there is an error
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // return db rows as objects
  $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  //get CustID
  $query = 'SELECT * FROM Screening';
  $sth = $connection->prepare($query);
  $sth->execute();
  //return email and token that relative to CustID
  echo "<pre>";
  // print everything out
  print_r($sth->fetchAll());
  echo "</pre>";
}

function getAllFromTable3(){
  // database name assignment
  $dbFile = 'app/views/DB/example.db';
  // create a connection to the SQLite DB file using PDO
  $connection = new PDO('sqlite:' . $dbFile);
  // throw exceptions when there is an error
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // return db rows as objects
  $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  //get CustID
  $query = 'SELECT * FROM TicketInfor';
  $sth = $connection->prepare($query);
  $sth->execute();
  //return email and token that relative to CustID
  echo "<pre>";
  // print everything out
  print_r($sth->fetchAll());
  echo "</pre>";
}
*/

// close db
$connection = null;
?>

<!doctype html>
<html lang="en">
  <head>
      <title>Silverado - Loading</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
      <script src="app/views/JS/jquery-2.1.4.min.js"></script>
      <script src="app/views/JS/databaseIn.js"></script>
   </head>
   <body>
     <form id="buy" action='viewTicket.php' method="post">
       <input type="hidden" name="email" value="<?php echo $_SESSION["email"];?>"></input>
       <input type="hidden" name="token" value="<?php echo $token;?>"></input>
       <input id="iLoveYou" type="submit" value=""/>
     </form>
   </body>
</html>

<?php 
  // destory_session
  session_destroy();
?>