//When the docoment is ready used for value adding using JS
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
        $("select[name='name']").val(sessionStorage.inst_state);
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
})

//On click on submit button
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