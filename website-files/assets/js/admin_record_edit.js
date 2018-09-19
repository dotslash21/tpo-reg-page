//Registration 
//Starts on click of the submit button
$(document).submit(function(event) {
    event.preventDefault();

    console.log("Submitting");
    var dataObj = {
        name        : $("input[name='name']").val(),
        inst_code   : $("input[name='inst_code']").val(),
        uid         : $("input[name='uid']").val(),
        password    : $("input[name='password']").val(),
        estd        : $("input[name='estd']").val(),
        accrd       : $("select[name='accrd']").val(),
        inst_type   : $("select[name='inst_type']").val(),
        affli       : $("select[name='affli']").val(),
        inst_appr   : $("select[name='inst_appr']").val(),
        address     : document.getElementById("address").value,
        pin         : $("input[name='pin']").val(),
        inst_state  : $("select[name='inst_state']").val(),
        ins_dst     : $("[name='ins_dst']").val(),
        number      : $("input[name='number']").val(),
        email       : $("input[name='email']").val(),
        website     : $("input[name='website']").val(),

        // Institute head details
        head_name   : $("input[name='head_name']").val(),
        head_desg   : $("input[name='head_desg']").val(),
        head_mob    : $("input[name='head_mob']").val(),
        head_ph     : $("input[name='head_ph']").val(),
        head_email  : $("input[name='head_email']").val(),

        // Institute TPO details
        tpo_name    : $("input[name='tpo_name']").val(),
        tpo_contact1 : $("input[name='tpo_contact1']").val(),
        tpo_contact2 : $("input[name='tpo_contact2']").val(),
        tpo_email   : $("input[name='tpo_email']").val(),

        //Instute INFO
        num_cmp     : $("input[name='num_cmp']").val(),
        num_cmplab  : $("input[name='num_cmplab']").val(),
        min_num_cmp : $("input[name='min_num_cmp']").val(),
        ispeed      : $("input[name='ispeed']").val(),
        hall_cap    : $("input[name='hall_cap']").val(),
        num_cctv    : $("input[name='num_cctv']").val(),
        has_fiber   : $("input[name='has_fiber']").val(),
        token       : $("meta[name='X-CSRF']").attr('content')
    };

    console.log(dataObj);

    //Start of AJAX process

	$.ajax({
		type: 'POST',
		url: '../ajax/admin_record_edit.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
    .done(function ajaxDone(data) {
        // Whatever data is
        if(data.error !== undefined){
            alert(data.error);
        }
        if(data.result == 'Successfully Changed'){
            if(data.redirect !== undefined){
                window.location = data.redirect;
            }
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