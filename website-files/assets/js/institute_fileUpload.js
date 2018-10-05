$(document).ready(function(e){
    $("button#complete").hide();

    $("form#file_upload").on("submit",function(event) {
        event.preventDefault();

        var submitbtn = $("button#submit");

        var err = $(".error");
        var message = $(".message");
        var message2 = $(".message2");
        err.hide();
        message.hide();
        message2.hide();
        //Start of AJAX process
    	$.ajax({
    		type: 'POST',
    		url: '../ajax/institute_fileupload.php',
    		data: new FormData(this),
    		dataType: 'json',
            async: true,
            contentType: false,
            cache: false,
            processData:false,
        })
        .done(function ajaxDone(data) {
    		// Whatever data is  
            if(data.error !== undefined){
                err.html(data.error).show();
            }
            if(data.success !== undefined){
                message.html(data.success).show();
            }
            if(data.fileName !== undefined){
                message2.html(data.fileName).show();
                submitbtn.attr("disabled","disabled");
                $("button#complete").show();
            }
        
    	})
        .fail(function ajaxFailed(e){
            // This Failed

        })
        .always(function ajaxAlwaysDoThis(data){
            // Always do

            console.log("Always");
        })
        
        return false;
    });
});

$("button#complete").click( function(){
    window.location = './done.php';
})