//When the docoment is ready used for value adding using JS
//If the values are in sessionStorage
$(document).ready( function(){

    // Institute head details
    if(sessionStorage.head_name !== undefined){
        $("input[name='head_name']").val(sessionStorage.head_name);
    }
    if(sessionStorage.head_desg !== undefined){
        $("input[name='head_desg']").val(sessionStorage.head_desg);
    }
    if(sessionStorage.head_mob !== undefined){
        $("input[name='head_mob']").val(sessionStorage.head_mob);
    }
    if(sessionStorage.head_ph !== undefined){
        $("input[name='head_ph']").val(sessionStorage.head_ph);
    }
    if(sessionStorage.head_email !== undefined){
        $("input[name='head_email']").val(sessionStorage.head_email);
    }

    // Institute TPO details
    if(sessionStorage.tpo_name !== undefined){
        $("input[name='tpo_name']").val(sessionStorage.tpo_name);
    }
    if(sessionStorage.tpo_contact1 !== undefined){
        $("select[name='tpo_contact1']").val(sessionStorage.tpo_contact1);
    }
    if(sessionStorage.tpo_contact2 !== undefined){
        $("[name='tpo_contact2']").val(sessionStorage.tpo_contact2);
    }
    if(sessionStorage.tpo_email !== undefined){
        $("input[name='tpo_email']").val(sessionStorage.tpo_email);
    }
})

//On click on submit button
//Starts the form submission process
$(document).on("submit","form.frm",function(event) {
    event.preventDefault();

    var _form = $(this);

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

    // Institute head details
    if(dataObj.head_name == undefined){
        alert("Please enter a Institute Head Name");
        return false;
    }
    else if(dataObj.head_desg == undefined){
        alert("Please enter a Institute Head Designation");
        return false;
    }
    else if(dataObj.head_mob == undefined){
        alert("Please enter a Institute Head Mobile");
        return false;
    }
    else if(dataObj.head_ph == undefined){
        alert("Please enter a Institute Head Land Line");
        return false;
    }
    else if(dataObj.head_email == undefined){
        alert("Please enter a Institute Head Email ID");
        return false;
    }

    // Institute TPO details
    if(dataObj.tpo_name == undefined){
        alert("Please enter a Institute TPO Name");
        return false;
    }
    else if(dataObj.tpo_contact1 == undefined){
        alert("Please enter a Institute TPO Contact Number");
        return false;
    }
    else if(dataObj.tpo_email == undefined){
        alert("Please enter a Institute TPO Email ID");
        return false;
    }

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
        alert("Turn on Cookies");
        return false;
    }
    if(sessionStorage.head_name !== undefined  && sessionStorage.head_desg !== undefined  && sessionStorage.head_mob !== undefined  && sessionStorage.head_ph !== undefined  && sessionStorage.head_email !== undefined  && sessionStorage.tpo_name !== undefined  && sessionStorage.tpo_contact1 !== undefined  && sessionStorage.tpo_email !== undefined){
        //Redirect Location
        window.location = './form3.php';
    }
})

$('button#back').click( function(){
    event.preventDefault();
    
    var red = './form.php';
    window.location = red;
})