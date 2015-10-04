function unblockRange() {
    for(var i =0; i<8;i++){
       var e = $('table.Tickets_and_display_price input:eq('+ i +')');
       $('table.Tickets_and_display_price span.price:eq('+ i +')').text(multiplier(1, e.get(0))); 
    }
    
}

function calculatePrice(e, id) {
    // calculate this element subtotal price
    var value = e.value;
    value = multiplier(value, e);
    value = parseFloat(value);
    value = value.toFixed(2);
    $(("#" + id)).text(value.toString());
    // added total
    calculateSum();
    e.previousElementSibling.innerHTML = e.value.toString();


}

function multiplier(price, e) {
    // calculate ticket price
    var ticketType = e.name;
    var weekDay = $('#dayI').val();
    var time = $('#timeI').val();
    var discount = false;
    if (weekDay == "Monday" || weekDay == "Tuesday")
        discount = true;
    if (weekDay == "Wednesday" || weekDay == "Thursday" || weekDay == "Friday" && time == "1pm")
        discount = true;
    if (ticketType == "SA") {
        return price *= discount ? 12 : 18;
    }
    if (ticketType == "SP") {
        return price *= discount ? 10 : 15;
    }
    if (ticketType == "SC") {
        return price *= discount ? 8 : 12;
    }
    if (ticketType == "FA") {
        return price *= discount ? 25 : 30;
    }
    if (ticketType == "FC") {
        return price *= discount ? 20 : 25;
    }
    if (ticketType == "B1" || ticketType == "B2" || ticketType == "B3") {
        return price *= discount ? 20 : 30;
    }
}

function calculateSum() {
    // calculate total price
    var sum = 0.00;
    var list = $(".Tickets_and_display_price [id]");
    for (var i = 0; i < 8; i++) {
        sum += parseFloat(list[i].innerHTML);
    }
    sum = sum.toFixed(2);
    $('#sum').text(sum.toString());

}

function resetPriceTable() {
    // reset all inpit to default value 0
    $('table.Tickets_and_display_price input').filter('.silder').val(0);
    for (var i = 0; i < 8; i++) {
        $(("#" + "sub" + (i + 1).toString())).text("0.00");
    }
    calculateSum();
    $('table.Tickets_and_display_price span.quanity').text(0);
    $('table.Tickets_and_display_price span.price').text(0);
}

function validateForm() {
    // check total price
    var sum = 0;
    $('table.Tickets_and_display_price input').filter('.silder').each(function(index, e) {
        sum += parseInt($(this).val());
    });


    if (sum == 0) {
        alert("You must buy one or more tickets!");
        return false;
    } else {
        return true;
    }
}
$( document ).ready(function() {
   unblockRange();
});