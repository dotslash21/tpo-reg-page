$(document).ready(function () {
    var r = $("input#approve");
    r.change(function(){
        if(r.is(":checked")){
            console.log("ON")
        }
        else if(r.not(":checked")){
            console.log("OFF");
        }
    })
})

$(".js-click").click(function () {
    console.log('clicked');
})