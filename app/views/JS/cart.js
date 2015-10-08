function init() {
    // confirm fields remotely (closure!)
    $('.valid').each(function(index) {
        $mainElement = $(this);
        $sibling = $('.cusDes:eq(' + index + ')').next('input');
        var somthing = $sibling;
        $sibling.keyup(function($mainElement, somthing) {
            return function() {
                var name = somthing.attr('name');
                var val = somthing.val();
                var keyPair = {};
                keyPair[name] = val;
                $.post("cartAjaxServer.php", keyPair, function(data) {
                    changeHint(data, $mainElement, name);
                });
            }
        }($mainElement, somthing));
    });
    $('.cusDes').next('input').keyup();
    $.post("cartAjaxServer.php", {"session":true}, function(data) {injectCartItems($('.cartItems'), data);});
}

function injectCartItems(el, data){
    console.log(data);
    var obj = JSON.parse(data);
    // append cart items
    for(var i in obj["cart"]["screenings"]){
        var screening = obj["cart"]["screenings"][i];
        var movieName = returnMovieName(screening["movie"]);
        var day = screening["day"];
        var time = screening["time"];
        el.append('<div class="cartItem"></div>');
            $( ".cartItem:last" ).append('<div class="movie">'+movieName+'</div>');
            $( ".cartItem:last" ).append('<div class="dayTime">Showing at '+day+', '+time+'</div>');
            $( ".cartItem:last" ).append('<table class="priceTable"></table>');
                $( ".priceTable:last" ).append('<tr><th>Ticket Type</th><th>Cost</th><th>Qty</th><th>Subtotal</th></tr>');
        for(var k in screening["seats"]){
            var seatName = returnSeatName(k);
            for(var u=0;u<screening["seats"][k]["quantity"];u++){
                var qty = screening["seats"][k]["quantity"];
                var price = screening["seats"][k]["price"];
                $( ".priceTable:last" ).append('<tr><td>'+seatName+'</td><td>$'+price/qty+'</td><td>'+qty+'</td><td>$'+price+'</td></tr>');   
            }
        }
            $( ".priceTable:last" ).append('<tr><td class="textRight" colspan="3">Sub total:</td><td>$'+screening['sub-total']+'</td></tr>');
        $( ".cartItem:last" ).append('<div id="submit"><input class="button" type="button" value="Delete from Cart" onclick="deleteCart('+i+')"/></div>');
    }
}

function deleteCart(index){
    $.post("cartAjaxServer.php", {"delOne":index}, function(data) {window.location.href = 'cart.php';});
}
function changeHint(data, $mainElement, name) {

    if (data != false) {
        $mainElement.text("Valid");
        $mainElement.css("background-color", "green");;
        if (name == "voucher"){
            $.post("cartAjaxServer.php", {"updateGrandTotal":true}, function(data) {
                $(".grandTotal").text(data);
            });
        }
    } else {
        if (name == "name") {
            $mainElement.text("Enter letters only");
            $mainElement.css("background-color", "red");
        }
        if (name == "email") {
            $mainElement.text("Enter valid email address");
            $mainElement.css("background-color", "red");
        }
        if (name == "phone") {
            $mainElement.text("Enter valid phone number (start with 04 or +614 only)");
            $mainElement.css("background-color", "red");
        }
        if (name == "voucher") {
            $mainElement.text("(Optional) Enter valid voucher code.");
            $mainElement.css("background-color", "#996633");
            $.post("cartAjaxServer.php", {"updateGrandTotal":true}, function(data) {
                $(".grandTotal").text(data);
            });
        }
    }
}

function emptyCart(){
    $.post("cartAjaxServer.php", {"empty":true}, function(data) {
        window.location.href = 'cart.php';
    });
}

function validateForm() {
    // check
    // cart is empty
    // customer details are ready
    var valid = true;
    $('.valid').each(function() {
        if (($(this).text() != "Valid") && ($(this).prev().text() != "Voucher: ")) {
            valid = false;
        }
        
    });
    if (!valid) {
        alert("Cart empty or invalid personal details.\nPlease edit your input before submittion.");
    }
    return valid;
}

function returnMovieName(code) {
    if (code=="AC") {
        return "Mission Impossible: Rogue Nation";
    }
    if (code=="CH") {
        return "Inside Out";
    }
    if (code=="AF") {
        return "Girlhood";
    }
    if (code=="RC") {
        return "Train Wreck";
    }
}

function returnSeatName(code){
    if (code=="SA") {
        return "Adult";
    }
    if (code=="SP") {
        return "Concession";
    }
    if (code=="SC") {
        return "Child";
    }
    if (code=="FA") {
        return "First Class Adult";
    }
    if (code=="FC") {
        return "First Class Child";
    }
    if (code=="B1") {
        return "Beanbag - 1 Person";
    }
    if (code=="B2") {
        return "Beanbag - 2 People";
    }
    if (code=="B3") {
        return "Beanbag - 3 children";
    }
}

$(document).ready(function() {
    init();
});