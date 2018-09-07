$("form#notice-form").submit(function (event) {
    event.preventDefault();
    var submitbtn = $("button#submit");
	$.ajax({
		type: 'POST',
		url: '../ajax/admin-notice-add.php',
		data: new FormData(this),
		dataType: 'json',
        async: true,
        processData: false,
        contentType: false,
        beforeSend: function(){
            submitbtn.attr('disabled', true);

            submitbtn.html(`
            <div class="preloader-wrapper small active">
                <div class="spinner-layer spinner-green-only">
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
        if(data.succ !== undefined){
            console.log(data.succ);
        }
        if(data.success !== undefined){
            console.log(data.success);
        }
        if(data.fileName !== undefined){
            console.log(data.fileName);
            submitbtn.html(`Submit`);
        }
        if(data.error !== undefined){
            console.log(data.error);
        }
	})
    .fail(function ajaxFailed(e){
        // This Failed
        submitbtn.html(`Failed. Retry`);
        submitbtn.removeAttr('disabled');
    })
    .always(function ajaxAlwaysDoThis(data){
        // Always do
        submitbtn.removeAttr('disabled');
        $("form#notice-form")[0].reset();
        console.log("Always");
    })
})