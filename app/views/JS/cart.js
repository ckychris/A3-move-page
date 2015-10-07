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

    if (data != 0) {
        $mainElement.text("valid");
        $mainElement.css("background-color", "green");
        $mainElement.css("color", "#eee");
    } else {
        if (name == "name") {
            $mainElement.text("Enter letters only.");
            $mainElement.css("background-color", "red");
            $mainElement.css("color", "#eee");
        }
        if (name == "email") {
            $mainElement.text("Enter valid email address.");
            $mainElement.css("background-color", "red");
            $mainElement.css("color", "#eee");
        }
        if (name == "phone") {
            $mainElement.text("Enter valid phone number (start with 04 or +614 only)");
            $mainElement.css("background-color", "red");
            $mainElement.css("color", "#eee");
        }
    }
}




function validateForm() {
    // check
    // cart is empty
    // customer details are ready
    var vaild = true;
    $('.valid').each(function() {
        if ($(this).text() != "valid") {
            vaild = false;
            alert("Please enter correct data!");
        }
    });
    return vaild;
}

$(document).ready(function() {
    init();
});