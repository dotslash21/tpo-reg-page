//Login
$(document).on("submit","form.admin-login",function(event) {
    event.preventDefault();

    var _form = $(this);

    var dataObj = {
        email: $("input[name='admin_id']", _form).val(),
        password: $("input[name='admin_passwd']", _form).val()
    };

    if(dataObj.email.length < 8){
        _error.text("Plese enter a valid Email address").show();
        return false;
    }
    else if(dataObj.password.length < 8){
        _error.text("Please enter a password that is atleast 8 charecters").show();
        return false;
    }

    //Start of AJAX process

	$.ajax({
		type: 'POST',
		url: './ajax/login.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
    .done(function ajaxDone(data) {
		// Whatever data is 
        if(data.redirect !== undefined){
            window.location = data.redirect;
        } 
        else if(data.error !== undefined){
            alert(data.error);
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
})