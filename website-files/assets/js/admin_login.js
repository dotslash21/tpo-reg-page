//Login
$(document).on("submit","form#admin-login",function(event) {
    event.preventDefault();

    var _form = $(this);
    var submitbtn = $("button#submit");

    var dataObj = {
        id:                     $("input[name='admin_id']", _form).val(),
        password:               $("input[name='admin_password']", _form).val(),
        token:                  $("meta[name='X-CSRF']").attr("content"),
        g_recaptcha_response:   grecaptcha.getResponse()
    };
    if(dataObj.id.length < 1){
        $("#logfail").text(`Provide a User ID`);
        return false;
    }
    else if(dataObj.password.length < 1){
        $("#logfail").text(`Provide a Password`);
        return false;
    }
    //Start of AJAX process

	$.ajax({
		type: 'POST',
		url: '../ajax/admin_login.php',
		data: dataObj,
		dataType: 'json',
        async: true,
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
        if(data.redirect !== undefined){
            window.location = data.redirect;
        } 
        else if(data.error !== undefined){
            submitbtn.html(`Failed. Retry`);
            $("#logfail").text(data.error);
            submitbtn.removeAttr('disabled');
            grecaptcha.reset();
        }
	
	})
    .fail(function ajaxFailed(e){
        // This Failed
        submitbtn.html(`Failed. Retry`);
        submitbtn.removeAttr('disabled');
        grecaptcha.reset();
    })
    .always(function ajaxAlwaysDoThis(data){
        // Always do

        console.log("Always");
    })

    return false;
})