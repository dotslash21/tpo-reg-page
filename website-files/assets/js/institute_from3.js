//When the docoment is ready used for value adding using JS
//If the values are in sessionStorage
$(document).ready( function(){

    //Instute INFO
    if(sessionStorage.num_cmp !== undefined){
        $("input[name='num_cmp']").val(sessionStorage.num_cmp);
    }
    if(sessionStorage.num_cmplab !== undefined){
        $("input[name='num_cmplab']").val(sessionStorage.num_cmplab);
    }
    if(sessionStorage.min_num_cmp !== undefined){
        $("input[name='min_num_cmp']").val(sessionStorage.min_num_cmp);
    }
    if(sessionStorage.ispeed !== undefined){
        $("input[name='ispeed']").val(sessionStorage.ispeed);
    }
    if(sessionStorage.hall_cap !== undefined){
        $("input[name='hall_cap']").val(sessionStorage.hall_cap);
    }
    if(sessionStorage.num_cctv !== undefined){
        $("input[name='num_cctv']").val(sessionStorage.num_cctv);
    }
    if(sessionStorage.has_fiber !== undefined){
        $("select[name='has_fiber']").val(sessionStorage.has_fiber);
    }
})

//On click on submit button
//Starts the form submission process
$(document).on("submit","form.frm",function(event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $(".js-error", _form);

    dataObj = {
        //Instute INFO
        num_cmp:        $("input[name='num_cmp']", _form).val(),
        num_cmplab:     $("input[name='num_cmplab']", _form).val(),
        min_num_cmp:    $("input[name='min_num_cmp']", _form).val(),
        ispeed:         $("input[name='ispeed']", _form).val(),
        hall_cap:       $("input[name='hall_cap']", _form).val(),
        num_cctv:       $("input[name='num_cctv']", _form).val(),
        has_fiber:      $("input[name='has_fiber']", _form).val(),
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

        //Instute INFO
        sessionStorage.num_cmp = dataObj.num_cmp;
        sessionStorage.num_cmplab = dataObj.num_cmplab;
        sessionStorage.min_num_cmp = dataObj.min_num_cmp;
        sessionStorage.ispeed = dataObj.ispeed;
        sessionStorage.hall_cap = dataObj.hall_cap;
        sessionStorage.num_cctv = dataObj.num_cctv;
        sessionStorage.has_fiber = dataObj.has_fiber;

    }
    else{
        //when sessionStorage is not there
        _error.text("Turn on Cookies").show();
        return false;
    }
    console.log(sessionStorage);
    if(sessionStorage.length == 32){
        //Redirect Location
        window.location = './course_select.php';
    }
})