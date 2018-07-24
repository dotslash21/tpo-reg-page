$(document).on("submit","form.frm",function(event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $(".js-error", _form);

    dataObj = {
        // Institute head details
        head_name:      $("input[name='head_name']", _form).val(),
        head_desg:      $("input[name='head_desg']", _form).val(),
        head_mob:       $("input[name='head_mob']", _form).val(),
        head_ph:        $("input[name='head_ph']", _form).val(),
        head_email:     $("input[name='head_email']", _form).val(),

        // Institute TPO details
        tpo_name:       $("input[name='tpo_name']", _form).val(),
        tpo_contact1:   $("input[name='tpo_contact1']", _form).val(),
        tpo_contact2:   $("input[name='tpo_contact2']", _form).val(),
        tpo_email:      $("input[name='tpo_email']", _form).val(),
    };
    console.log(dataObj);

    // //All varification and helper massage done
    // if(dataObj.email.length < 8){
    //     _error.text("Plese enter a valid Email address").show();
    //     return false;
    // }
    // else if(dataObj.password.length < 8){
    //     _error.text("Please enter a password that is atleast 8 charecters").show();
    //     return false;
    // }

    //Storing in sessionStorage
    if(typeof(Storage) !== undefined){
        //When SessionStorage is avaliable

        // Institute head details
        sessionStorage.head_name = dataObj.head_name;
        sessionStorage.head_desg = dataObj.head_desg;
        sessionStorage.head_mob = dataObj.head_mob;
        sessionStorage.head_ph = dataObj.head_ph;
        sessionStorage.head_email = dataObj.head_email;

        // Institute TPO details
        sessionStorage.tpo_name = dataObj.tpo_name;
        sessionStorage.tpo_contact1 = dataObj.tpo_contact1;
        sessionStorage.tpo_contact2 = dataObj.tpo_contact2;
        sessionStorage.tpo_email = dataObj.tpo_email;

    }
    else{
        //when sessionStorage is not there
        _error.text("Turn on Cookies").show();
        return false;
    }
    console.log(sessionStorage);
    if(sessionStorage.length == 25){
        //Redirect Location
        window.location = './form3.php';
    }
})