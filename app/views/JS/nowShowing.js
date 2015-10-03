function toggle(el){
    $(el).next().toggle();
}

function subBtn(id, value){
    // sumbit one sort factor only 
    var target = $("#sort").attr("action");
    $.post( target , {id : value}, function(data){onContentLoad(data);} );
}

function onContentLoad(data){
    var obj = JSON.parse(data);
    var openD = "<div>";
    var closeD = "</div>";
    console.log(Object.getOwnPropertyNames(obj).sort()); // logs '0,1,2'

    // Logging property names and values using Array.forEach
    Object.getOwnPropertyNames(obj).forEach(function(val, idx, array) {
        layer1(val, idx, array, obj);
    });
        //$("#content-warpper").append(openD + i + closeD);
}

function layer1(val, idx, array, obj){
    //grand keys val
    console.log(val);
    //data
    console.log(obj[val]["title"]);
    //data
    console.log(obj[val]["description"][0]);
    
    Object.getOwnPropertyNames(obj[val]["screenings"]).forEach(function(val, idx, array) {
        layer2(val, idx, array, obj);
    });
}

function layer2(val, idx, array, obj){
    //keys val
    //data obj[val]["screenings"][val]
}