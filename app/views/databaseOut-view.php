<?php

//require_once 'example';

$email = $_POST["email"];
$token = $_POST["token"];

echo '{ "name": "sfasdas", "email": "dsadasdas", "phone": "dasdasdasdsa", "voucher": "dsadasdsad", "cart": { "screenings": [ { "movie": "CH", "day": "Wednesday", "time": "6pm", "seats": { "SA": { "quantity": "3", "price": 36 }, "SP": { "quantity": "6", "price": 60 }, "FA": { "quantity": "1", "price": 25 } }, "sub-total": 121 }, { "movie": "AF", "day": "Tuesday", "time": "6pm", "seats": { "SA": { "quantity": "1", "price": 12 }, "SC": { "quantity": "1", "price": 8 } }, "sub-total": 20 } ] }, "total": 141, "grand-total": 141 }';



/*
$sql = "select EmailAddress, Token from MovieBookingSeesion";
foreach ($sql as $var => $val) {
    
    
    
}
if ($name != $_POST[email] || $token = $_POST[token]) {
    echo("Please enter right email address and token number");
    else 
        return 0;
}
*/
// echo .stringitfier(jsonObject)
   


