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
            beforeSend: function(){
                submitbtn.attr('disabled', true);
    
                submitbtn.html(`
                <div class="preloader-wrapper small active">
                    <div class="spinner-layer spinner-yellow-only">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>`)
            }
        })
        .done(function ajaxDone(data) {
    		// Whatever data is  
            if(data.error !== undefined){
                err.html(data.error).show();
                submitbtn.html(`Failed. Retry`);
                submitbtn.removeAttr('disabled');
            }
            if(data.success !== undefined){
                message.html(data.success).show();
                submitbtn.html(`Uploaded`);
            }
            if(data.fileName !== undefined){
                message2.html(data.fileName).show();
                submitbtn.attr("disabled","disabled");
                submitbtn.html(`Uploaded`);
                $("button#complete").show();
            }
        
    	})
        .fail(function ajaxFailed(e){
            // This Failed
            submitbtn.html(`Failed. Retry`);
            submitbtn.removeAttr('disabled');
        })
        .always(function ajaxAlwaysDoThis(data){
            // Always do

            console.log("Always");
        })
        
        return false;
    });
});

$("button#complete").click( function(){
    window.location = './done';
})