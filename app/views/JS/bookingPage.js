function initTable() {
    // disable the the day and time
    $('table.Movie_information .day select').first().attr('disabled', 'disabled');
    $('table.Movie_information .time select').first().attr('disabled', 'disabled');
    $('table.Tickets_and_display_price input').attr('disabled', 'disabled');
}


function showDay() {
    $('table.Movie_information .time select').first().attr('disabled', 'disabled');
    // warning this will hurt eyes, hard coded data due to time consumption issue, assign options dynamically
    var select = $('#movieI');
    var day = $('#dayI');
    var time = $('#timeI');
    var type = select.val();
    // put options in select after reset
    day.empty();
    if (type == "AC") {
        appendOption(day, "Wednesday", "Wednesday");
        appendOption(day, "Thursday", "Thursday");
        appendOption(day, "Friday", "Friday");
        appendOption(day, "Saturday", "Saturday");
        appendOption(day, "Sunday", "Sunday");
        resetPriceTable();
        time.empty();
    }
    if (type == "CH") {
        appendOption(day, "Monday", "Monday");
        appendOption(day, "Tuesday", "Tuesday");
        appendOption(day, "Wednesday", "Wednesday");
        appendOption(day, "Thursday", "Thursday");
        appendOption(day, "Friday", "Friday");
        appendOption(day, "Saturday", "Saturday");
        appendOption(day, "Sunday", "Sunday");
        resetPriceTable();
        time.empty();
    }
    if (type == "AF") {
        appendOption(day, "Monday", "Monday");
        appendOption(day, "Tuesday", "Tuesday");
        appendOption(day, "Saturday", "Saturday");
        appendOption(day, "Sunday", "Sunday");
        resetPriceTable();
        time.empty();
    }
    if (type == "RC") {
        appendOption(day, "Monday", "Monday");
        appendOption(day, "Tuesday", "Tuesday");
        appendOption(day, "Wednesday", "Wednesday");
        appendOption(day, "Thursday", "Thursday");
        appendOption(day, "Friday", "Friday");
        appendOption(day, "Saturday", "Saturday");
        appendOption(day, "Sunday", "Sunday");
        resetPriceTable();
        time.empty();
    }
    if (type == "") {
        $('table.Movie_information .day select').first().attr('disabled', 'disabled');
        $('table.Tickets_and_display_price input').attr('disabled', 'disabled');
        time.empty();
        resetPriceTable();
    } else {
        $('table.Movie_information .day select').first().removeAttr('disabled');
        $('table.Tickets_and_display_price input').attr('disabled', 'disabled');
    }
}

function showTime() {
    // warning this will hurt eyes, hard coded data due to time consumption issue, assign options dynamically
    var selectMoive = $('#movieI');
    var selectDay = $('#dayI');
    var time = $('#timeI');
    var type = selectMoive.val();
    var day = selectDay.val();
    time.empty();
    if (type == "AC") {
        resetPriceTable();
        time.append('<option value="9pm">9pm</option>');
    }
    if (type == "CH") {
        resetPriceTable();
        if (day == "Monday") {
            appendOption(time, "1pm", "1pm");
        }
        if (day == "Tuesday") {
            appendOption(time, "1pm", "1pm");
        }
        if (day == "Wednesday") {
            appendOption(time, "6pm", "6pm");
        }
        if (day == "Thursday") {
            appendOption(time, "6pm", "6pm");
        }
        if (day == "Friday") {
            appendOption(time, "6pm", "6pm");
        }
        if (day == "Saturday") {
            appendOption(time, "12pm", "12pm");
        }
        if (day == "Sunday") {
            appendOption(time, "12pm", "12pm");
        }
    }
    if (type == "AF") {
        resetPriceTable();
        if (day == "Monday") {
            appendOption(time, "6pm", "6pm");
        }
        if (day == "Tuesday") {
            appendOption(time, "6pm", "6pm");
        }
        if (day == "Saturday") {
            appendOption(time, "3pm", "3pm");
        }
        if (day == "Sunday") {
            appendOption(time, "3pm", "3pm");
        }
    }
    if (type == "RC") {
        resetPriceTable();
        if (day == "Monday") {
            appendOption(time, "9pm", "9pm");
        }
        if (day == "Tuesday") {
            appendOption(time, "9pm", "9pm");
        }
        if (day == "Wednesday") {
            appendOption(time, "1pm", "1pm");
        }
        if (day == "Thursday") {
            appendOption(time, "1pm", "1pm");
        }
        if (day == "Friday") {
            appendOption(time, "1pm", "1pm");
        }
        if (day == "Saturday") {
            appendOption(time, "6pm", "6pm");
        }
        if (day == "Sunday") {
            appendOption(time, "6pm", "6pm");
        }
    }
    $('table.Movie_information .time select').first().removeAttr('disabled');
}

function unblockRange() {
    $('table.Tickets_and_display_price input').removeAttr('disabled');
    for(var i =0; i<8;i++){
       var e = $('table.Tickets_and_display_price input:eq('+ i +')');
       $('table.Tickets_and_display_price span.price:eq('+ i +')').text(multiplier(1, e.get(0))); 
    }
    
}

function appendOption(node, value, text) {
    node.append($("<option></option>")
        .attr("value", value)
        .text(text));
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
initTable();