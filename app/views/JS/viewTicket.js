function subBtn(){
    // sumbit one sort factor only
    var email = $(".email").text();
    var token = $(".token").text();
    $.post( targetLink,{"email":email, "token":token} ,function(data){onContentLoad(data);} );
}
// load content to the page
function onContentLoad(data){
    if (data==0) {
        $( "#content-warpper" ).empty();
        $( "#content-warpper" ).append('<div class="error">Error, incorrect email, token.</div>');
        return 0;
    }
    var obj = JSON.parse(data);
    // ticket page invoice
    $( ".customerDetails" ).append(obj["name"]+" "+obj["email"]+" "+obj["phone"]);
    for(var i in obj["cart"]["screenings"]){
        var screening = obj["cart"]["screenings"][i];
        var movieName = returnMovieName(screening["movie"]);
        $( ".confirm" ).append('<div class="moiveDetails">'+movieName+" "+screening["day"]+","+screening["time"]+'</div>');
        $( ".confirm" ).append('<div class="subtotalPane"></div>');
        $( ".subtotalPane:last" ).append('<div class="leftPane"></div>');
        $( ".subtotalPane:last" ).append('<div class="rightPane"></div>');
        for(var k in screening["seats"]){
            var seatName = returnSeatName(k);
            $( ".leftPane:last" ).append(screening["seats"][k]["quantity"]+" x "+seatName+"</br>");
            $( ".rightPane:last" ).append("$"+screening["seats"][k]["price"]+"</br>");
        }
    }
    if (obj["voucher"]) {
        $( ".confirm" ).append('<div class="voucher">Voucher Discount (20%)</div>');
    }
     $( ".confirm" ).append('<div class="grandTotal">'+'Total: '+obj["grand-total"]+'</div>');
    // append tickets
    for(var i in obj["cart"]["screenings"]){
        var screening = obj["cart"]["screenings"][i];
        var movieName = returnMovieName(screening["movie"]);
        var day = screening["day"];
        var time = screening["time"];
        for(var k in screening["seats"]){
            var seatName = returnSeatName(k);
            for(var u=0;u<screening["seats"][k]["quantity"];u++){
                $( "#content-warpper" ).append('<div class="ticket"></div>');
                $( ".ticket:last" ).append('<div class="ticketHead"><img src="app/views/IMG/ticket.png" alt="cover"></div>');
                $( ".ticket:last" ).append('<div class="ticketMiddle"></div>');
                    $( ".ticketMiddle:last" ).append('<div class="moiveID">'+movieName+'</div>');
                    $( ".ticketMiddle:last" ).append('<div class="dayAndTime">'+day+' '+time+'</div>');
                    $( ".ticketMiddle:last" ).append('<div class="seatType">'+seatName+'</div>');
                $( ".ticket:last" ).append('<div class="ticketTail"></div>');
                 $( ".ticketTail:last" ).append('<div class="seatNo"><img src="app/views/IMG/cinema.jpg" alt="sideImg"></div>');
            }
        }
    }
    
    
    // further layer
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

$( document ).ready(function() {
   subBtn();
});
