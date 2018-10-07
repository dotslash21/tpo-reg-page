//When the docoment is ready used for value adding using JS
//If the values are in sessionStorage
$(document).ready( function(){
    if(sessionStorage.name !== undefined){
        $("input[name='name']").val(sessionStorage.name);
    }
    if(sessionStorage.inst_code !== undefined){
        $("input[name='inst_code']").val(sessionStorage.inst_code);
    }
    if(sessionStorage.uid !== undefined){
        $("input[name='uid']").val(sessionStorage.uid);
    }
    if(sessionStorage.password !== undefined){
        $("input[name='password']").val(sessionStorage.password);
    }
    if(sessionStorage.estd !== undefined){
        $("input[name='estd']").val(sessionStorage.estd);
    }
    if(sessionStorage.accrd !== undefined){
        $("select[name='accrd']").val(sessionStorage.accrd);
    }
    if(sessionStorage.inst_type !== undefined){
        $("select[name='inst_type']").val(sessionStorage.inst_type);
    }
    if(sessionStorage.affli !== undefined){
        $("select[name='affli']").val(sessionStorage.affli);
    }
    if(sessionStorage.inst_appr !== undefined){
        $("select[name='inst_appr']").val(sessionStorage.inst_appr);
    }
    if(sessionStorage.address !== undefined){
        $("textarea[name='address']").val(sessionStorage.address);
    }
    if(sessionStorage.pin !== undefined){
        $("input[name='pin']").val(sessionStorage.pin);
    }
    if(sessionStorage.inst_state !== undefined){
        $("select[name='inst_state']").val(sessionStorage.inst_state);
    }
    if(sessionStorage.ins_dst !== undefined){
        $("[name='ins_dst']").val(sessionStorage.ins_dst);
    }
    if(sessionStorage.number !== undefined){
        $("input[name='number']").val(sessionStorage.number);
    }
    if(sessionStorage.email !== undefined){
        $("input[name='email']").val(sessionStorage.email);
    }
    if(sessionStorage.website !== undefined){
        $("input[name='website']").val(sessionStorage.website);
    }

    $("input#inst_code").change(function () {
        var inst_cd = $("input[name='inst_code']").val();
        var inst_cd_err =  $(".err-inst_code")
        $.ajax({
            type: 'POST',
	        url: '../ajax/institute_institute_check.php',
	        data: {
                token: $("meta[name='token']").attr("content"),
                check: 1,
                inst_code:inst_cd
            },
	        dataType: 'json',
	        async: true,
        })
        .done(function ajaxDone(data) {
            // Whatever data is
            if(data.inst_chk !== undefined){
                if(data.inst_chk == 'yes'){
                    //Inst_code is exist
                    inst_cd_err.html("<span class=\"red-text text-accent-3\">Institute Code is already Exist. Try another One</span>").show();
                }
                if(data.inst_chk === 'no'){
                    //Inst_code is not exist
                    inst_cd_err.html("<span class=\"green-text text-accent-4\">Institute Code is Available</span>").show();
                }
            }
        
        })
    })
    $("input#uid").change(function () {
        var uid = $("input[name='uid']").val();
        var uid_err = $(".err-uid");
        $.ajax({
            type: 'POST',
	        url: '../ajax/institute_institute_check.php',
	        data: {
                token: $("meta[name='token']").attr("content"),
                check: 2,
                uid:uid
            },
	        dataType: 'json',
	        async: true,
        })
        .done(function ajaxDone(data) {
            // Whatever data is
            if(data.inst_uid_chk !== undefined){
                if(data.inst_uid_chk == 'yes'){
                    //Inst_code is exist
                    uid_err.html("<span class=\"red-text text-accent-3\">Institute User ID is already Exist. Try another One</span>").show();
                }
                if(data.inst_uid_chk === 'no'){
                    //Inst_code is not exist
                    uid_err.html("<span class=\"green-text text-accent-4\">Institute User ID is Available</span>").show();
                }
            }
        
        })
    })
})

//On click on submit button
//Starts the form submission process
$(document).on("submit","form.frm",function(event) {
    event.preventDefault();

    var _form = $(this);

    dataObj = {
        ////Basic Institute Details
        name:           $("input[name='name']", _form).val(),
        inst_code:      $("input[name='inst_code']", _form).val(),
        uid:            $("input[name='uid']", _form).val(),
        password:       $("input[name='password']", _form).val(),
        estd:           $("input[name='estd']", _form).val(),
        accrd:          $("select[name='accrd']", _form).val(),
        inst_type:      $("select[name='inst_type']", _form).val(),
        affli:          $("select[name='affli']", _form).val(),
        inst_appr:      $("select[name='inst_appr']", _form).val(),
        address:        $("textarea[name='address']", _form).val(),
        pin:            $("input[name='pin']", _form).val(),
        inst_state:     $("select[name='inst_state']", _form).val(),
        ins_dst:        $("[name='ins_dst']", _form).val(),
        number:         $("input[name='number']", _form).val(),
        email:          $("input[name='email']", _form).val(),
        website:        $("input[name='website']", _form).val(),
        token1:         $.cookie('_form1')
    };

    //All varification and helper massage done
    if(dataObj.name.length < 5){
        alert("Please enter the full Institute name");
        return false;
    }
    else if(dataObj.inst_code.length < 1){
        alert("Plese enter a valid Institute Code");
        return false;
    }
    else if(dataObj.uid.length < 1){
        alert("Plese enter a valid Institute ID");
        return false;
    }
    else if(dataObj.password.length < 8){
        alert("Please enter a password that is atleast 8 charecters");
        return false;
    }
    else if(dataObj.estd.length < 4){
        alert("Plese enter a valid ESTD Ex-2018");
        return false;
    }
    else if(dataObj.accrd === undefined){
        alert("Please choose Institue Accriditation ");
        return false;
    }
    else if(dataObj.inst_type === undefined){
        alert("Please choose Institue Type");
        return false;
    }
    else if(dataObj.affli === undefined){
        alert("Please choose Institue Affliation");
        return false;
    }
    else if(dataObj.inst_appr === undefined){
        alert("Please choose Institue Approve");
        return false;
    }
    else if(dataObj.address.length < 10){
        alert("Please enter a valid Address");
        return false;
    }
    else if(dataObj.pin.length < 6){
        alert("Please enter a valid Pin");
        return false;
    }
    else if(dataObj.inst_state === undefined){
        alert("Please select a State");
        return false;
    }
    else if(dataObj.ins_dst === undefined){
        alert("Please enter a valid District");
        return false;
    }
    else if(dataObj.number.length < 9){
        alert("Please enter a valid Contact Number");
        return false;
    }
    else if(dataObj.email.length < 8){
        alert("Please enter a valid Email");
        return false;
    }
    else if(dataObj.website === undefined){
        alert("Please enter a Website");
        return false;
    }
    else if(dataObj.token1 === undefined){
        alert('Enable your cookies and Refreash the page');
        return false;
    }

    //Storing in sessionStorage
    if(typeof(Storage) !== undefined){
        //When SessionStorage is avaliable

        //Basic Institute Details
        sessionStorage.name         = dataObj.name;
        sessionStorage.inst_code    = dataObj.inst_code;
        sessionStorage.uid          = dataObj.uid;
        sessionStorage.password     = dataObj.password;
        sessionStorage.estd         = dataObj.estd;
        sessionStorage.accrd        = dataObj.accrd;
        sessionStorage.inst_type    = dataObj.inst_type;
        sessionStorage.affli        = dataObj.affli;
        sessionStorage.inst_appr    = dataObj.inst_appr;
        sessionStorage.address      = dataObj.address;
        sessionStorage.pin          = dataObj.pin;
        sessionStorage.inst_state   = dataObj.inst_state;
        sessionStorage.ins_dst      = dataObj.ins_dst;
        sessionStorage.number       = dataObj.number;
        sessionStorage.email        = dataObj.email;
        sessionStorage.website      = dataObj.website;
        sessionStorage.token1       = dataObj.token1;

    }
    else{
        //when sessionStorage is not there
        alert("Turn on Cookies");
        return false;
    }
    if(sessionStorage.name !== undefined  && sessionStorage.inst_code !== undefined  && sessionStorage.uid !== undefined  && sessionStorage.password !== undefined  && sessionStorage.estd !== undefined  && sessionStorage.accrd !== undefined  && sessionStorage.inst_type !== undefined  && sessionStorage.affli !== undefined  && sessionStorage.inst_appr !== undefined  && sessionStorage.address !== undefined  && sessionStorage.pin !== undefined  && sessionStorage.inst_state !== undefined  && sessionStorage.ins_dst !== undefined  && sessionStorage.number !== undefined  && sessionStorage.email !== undefined  && sessionStorage.website !== undefined){
        //Redirect Location
        window.location = './2';
    }
})