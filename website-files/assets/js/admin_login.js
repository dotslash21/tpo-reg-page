//Login
$(document).on("submit","form#admin-login",function(event) {
    event.preventDefault();

    var _form = $(this);

    var dataObj = {
        id: $("input[name='admin_id']", _form).val(),
        password: $("input[name='admin_password']", _form).val()
    };
    console.log(dataObj);
    //Start of AJAX process

	$.ajax({
		type: 'POST',
		url: '../ajax/admin_login.php',
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