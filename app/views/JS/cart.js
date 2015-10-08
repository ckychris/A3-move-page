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

$(document).ready(function() {
    init();
});