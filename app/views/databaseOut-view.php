<?php

    // if email + token matched in database ID entry
    // output a JSON String e.g. the following
    // else output error msg like "0"
    // Testing output data
    echo '{ "name": "Jane Smith", "email": "jane@smith.com", "phone": "04 0012 3456", "cart": { "screenings": [ { "movie": "CH", "day": "Monday", "time": "1pm", "seats": { "SA": { "quantity": 2, "price": 12.00 }, "B3": { "quantity": 1, "price": 20.00 } }, "sub-total": 44.00 }, { "movie": "AC", "day": "Saturday", "time": "9pm", "seats": { "SP": { "qty": 3, "price": 15.00}, "B2": { "qty": 1, "price": 30.00} }, "sub-total": 75.00 } ] }, "total": 119.00, "voucher": "12345-67890-ZI", "grand-total": 95.20 }';
?>