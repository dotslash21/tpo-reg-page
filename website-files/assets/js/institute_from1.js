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
    };
    console.log(dataObj);

    //All varification and helper massage done
    if(dataObj.email.length < 8){
        alert("Plese enter a valid Email address");
        return false;
    }
    else if(dataObj.password.length < 8){
        alert("Please enter a password that is atleast 8 charecters");
        return false;
    }

    //Storing in sessionStorage
    if(typeof(Storage) !== undefined){
        //When SessionStorage is avaliable

        //Basic Institute Details
        sessionStorage.name = dataObj.name;
        sessionStorage.inst_code = dataObj.inst_code;
        sessionStorage.uid = dataObj.uid;
        sessionStorage.password = dataObj.password;
        sessionStorage.estd = dataObj.estd;
        sessionStorage.accrd = dataObj.accrd;
        sessionStorage.inst_type = dataObj.inst_type;
        sessionStorage.affli = dataObj.affli;
        sessionStorage.inst_appr = dataObj.inst_appr;
        sessionStorage.address = dataObj.address;
        sessionStorage.pin = dataObj.pin;
        sessionStorage.inst_state = dataObj.inst_state;
        sessionStorage.ins_dst = dataObj.ins_dst;
        sessionStorage.number = dataObj.number;
        sessionStorage.email = dataObj.email;
        sessionStorage.website = dataObj.website;

    }
    else{
        //when sessionStorage is not there
        _error.text("Turn on Cookies").show();
        return false;
    }
    console.log(sessionStorage);
    if(sessionStorage.length == 16){
        //Redirect Location
        window.location = './form2.php';
    }
})