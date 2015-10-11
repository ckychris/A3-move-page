<?php

$JSON;
$email = $_POST["email"];
$token = $_POST["token"];
$custID = getCustID($email,$token)[0]->CustID;
// table 1
$dbFile = 'app/views/DB/example.db';
$connection = new PDO('sqlite:' . $dbFile);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$query = 'SELECT * FROM MovieBookingSession WHERE CustID=:CustID';
$sth = $connection->prepare($query);
$sth->bindParam(':CustID', $custID);
$sth->execute();
$data = $sth->fetchAll();


$JSON["name"] = $data[0]->Name;
$JSON["email"] = $data[0]->EmailAddress;
$JSON["phone"] = $data[0]->Phone;
$JSON["voucher"] = $data[0]->VoucherCode;
$JSON["total"] = $data[0]->TotalPrice;
$JSON["grand-total"] = $data[0]->GrandTotal;


// table 2
$JSON["cart"] = null;
$JSON["cart"]["screenings"] = null;
$query = 'SELECT * FROM Screening WHERE CustID=:CustID';
$sth = $connection->prepare($query);
$sth->bindParam(':CustID', $custID);
$sth->execute();
$data = $sth->fetchAll();

foreach($data as $u => $k){
    $JSON["cart"]["screenings"][$u]["movie"] = $k->MovieCode;
    $JSON["cart"]["screenings"][$u]["day"] = $k->Date;
    $JSON["cart"]["screenings"][$u]["time"] = $k->Time;
    $JSON["cart"]["screenings"][$u]["sub-total"] = $k->Subtotal;
    $JSON["cart"]["screenings"][$u]["seats"] = null;
}


// table 3
$query = 'SELECT * FROM TicketInfor WHERE CustID=:CustID';
$sth = $connection->prepare($query);
$sth->bindParam(':CustID', $custID);
$sth->execute();
$data = $sth->fetchAll();

foreach($data as $u => $k){
    $JSON["cart"]["screenings"][$k->ScreeningID]["seats"][$k->TicketTypeID] = null;
    $JSON["cart"]["screenings"][$k->ScreeningID]["seats"][$k->TicketTypeID]["price"] = $k->Price;
    $JSON["cart"]["screenings"][$k->ScreeningID]["seats"][$k->TicketTypeID]["quantity"] = $k->Qty;
}

echo json_encode($JSON);
// close db
$connection = null;

function getCustID($email,$token){
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
  $sth->bindParam(':EmailAddress', $email);
  $sth->bindParam(':Token', $token);
  $sth->execute();
  //return CustID 
  $data = $sth->fetchAll();
  return $data;
}

?>


