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
        var has_fib = $("input[name='has_fiber']");
        if(has_fib.is(':checked') === false) {
            has_fib.filter('[value='+sessionStorage.has_fiber+']').prop('checked', true);
        }
    }
})

//On click on submit button
//Starts the form submission process
$(document).on("submit","form.frm",function(event) {
    event.preventDefault();

    var _form = $(this);

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

    //Instute INFO
    if(dataObj.num_cmp < 1){
        alert("Please enter  Number of Computers");
        return false;
    }
    else if(dataObj.num_cmplab < 0){
        alert("Please enter Total Number of Computer lab");
        return false;
    }
    else if(dataObj.min_num_cmp < 0){
        alert("Please enter Minimum Number of Computer lab");
        return false;
    }
    else if(dataObj.ispeed === undefined){
        alert("Please enter Institute Internet Speed");
        return false;
    }
    else if(dataObj.hall_cap === undefined){
        alert("Please enter Institute Hall Capacity");
        return false;
    }
    else if(dataObj.num_cctv === undefined){
        alert("Please enter Total mun of CCTV");
        return false;
    }

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
        alert("Turn on Cookies");
        return false;
    }
    if(sessionStorage.num_cmp !== undefined  && sessionStorage.num_cmplab !== undefined  && sessionStorage.min_num_cmp !== undefined  && sessionStorage.ispeed !== undefined  && sessionStorage.hall_cap !== undefined  && sessionStorage.num_cctv !== undefined  && sessionStorage.has_fiber !== undefined){
        //Redirect Location
        window.location = './4';
    }
})

$('button#back').click( function(){
    event.preventDefault();
    
    var red = './2';
    window.location = red;
})