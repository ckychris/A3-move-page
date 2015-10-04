// read more
function toggle(el){
    $(el).next().toggle();
}
// Ajax requestion to server
function subBtn(id){
    // sumbit one sort factor only
    $("#content-warpper").empty();
    var target = $("#sort").attr("action");
    var name = $("#"+id).attr("name");
    var value = $("#"+id).val();
    var targetLink = target + "?" + name + "=" + value;
    $.post( targetLink, function(data){onContentLoad(data,value);} );
}
// load content to the page
function onContentLoad(data,value){
    if (value=="AC"||value=="CH"||value=="AF"||value=="RC") {
        data = '{"'+value+'":'+data+'}';
    }
    var obj = JSON.parse(data);
    Object.getOwnPropertyNames(obj).forEach(function(val, idx, array) {
        layer1(val, idx, array, obj);
    });
}

function layer1(val, idx, array, obj){
    // there is no way I can make .add work. Swithcing to hard coding .append(rage), this is so stupid, do not attempt to read the following.
    //grand keys val
    // div moive 
    $( "#content-warpper" ).append("<div></div>").find("div:last").addClass("moive");
    // title
    $( "#content-warpper" ).find("div:last").append("<div></div>").find("div:last").addClass("moiveTitle").text(obj[val]["title"]);
    // mainPane
    $( ".moive:last" ).append("<div></div>").find("div:last").addClass("mainPane");
    // leftPane
    $( ".mainPane:last" ).append("<div></div>").find("div:last").addClass("leftPane");
    $( ".leftPane:last" ).append("<img></img>").find("img:last").addClass("previewImg").attr("alt","cover").attr("src",obj[val]["poster"]);
    // rightPane
    $( ".mainPane:last" ).append("<div></div>").find("div:last").addClass("rightPane");
    $( ".rightPane:last" ).append("<div></div>").find("div:last").addClass("summary").text(obj[val]["summary"]);
    $( ".rightPane:last" ).append("<div></div>").find("div:last").addClass("rating").append("<img></img>").find("img:last").attr("alt","rating").attr("src",obj[val]["rating"]);
    $( ".rightPane:last" ).append("<div></div>").find("div:last").addClass("des0").text(obj[val]["description"][0]);
    // toggle button
    $( ".moive:last" ).append("<div></div>").find("div:last").addClass("toggle").attr("onclick","toggle(this)").text("Read more");
    // hiddenPane (hidden)
    $( ".moive:last" ).append("<div></div>").find("div:last").addClass("hiddenPane");
    $( ".hiddenPane:last" ).hide();
    // hiddenContent
    $( ".hiddenPane:last" ).append("<div></div>").find("div:last").addClass("subTitle").text("Summary");
    $( ".hiddenPane:last" ).append("<div></div>").find("div:last").addClass("des1").text(obj[val]["description"][1]);
    $( ".hiddenPane:last" ).append("<div></div>").find("div:last").addClass("des2").text(obj[val]["description"][2]);
    $( ".hiddenPane:last" ).append("<div></div>").find("div:last").addClass("trailer");
    $( ".trailer:last" ).append("<div></div>").find("div:last").addClass("subTitle").text("Trailer");
    $( ".trailer:last" ).append("<video></video>").find("video:last").addClass("video").prop("controls",true);
    $( ".video:last" ).append("<source>").find("source:last").attr("src",obj[val]["trailer"]).attr("type","video/mp4");
    
    $( ".hiddenPane:last" ).append("<div></div>").find("div:last").addClass("subTitle").text("Reservation");
    $( ".hiddenPane:last" ).append("<div></div>").find("div:last").addClass("regbtns");
    
    for(var i in Object.keys(obj[val]["screenings"])){
        var key = Object.keys(obj[val]["screenings"])[i];
        var value =  obj[val]["screenings"][Object.keys(obj[val]["screenings"])[i]];
        var funStr = 'bookBtn('+ '"' +val+'"' +','+'"' +key+'"' +','+'"' +value+'"' +')';
        $( ".regbtns:last" ).append("<div></div>").find("div:last").attr("onclick",funStr).addClass("regbtn").text(key + " : " + value);
    }

}
function bookBtn(movie, day, time){
    console.log("vlicked!");
    var form = $('<form id="form1" action="parBookingPage.php" method="post"></form>').appendTo('body');
    console.log("added table!");
    var input1 = $("<input>")
               .attr("type", "hidden")
               .attr("name", "moive").val(movie);
    $('#form1').append(input1);
    var input2 = $("<input>")
               .attr("type", "hidden")
               .attr("name", "day").val(day);
    $('#form1').append(input2);
    var input3 = $("<input>")
               .attr("type", "hidden")
               .attr("name", "time").val(time);
    $('#form1').append(input3);
    console.log("added input!");
    form.submit();
}