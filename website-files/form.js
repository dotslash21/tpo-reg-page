$(document).on("submit","form.frm",function(event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $(".js-error", _form);

    dataObj = {
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
        ins_dst:        document.getElementsByName('ins_dst').value,
        number:         $("input[name='number']", _form).val(),
        email:          $("input[name='email']", _form).val(),
        website:        $("input[name='website']", _form).val(),
        head_name:      $("input[name='head_name']", _form).val(),
        head_desg:      $("input[name='head_desg']", _form).val(),
        head_mob:       $("input[name='head_mob']", _form).val(),
        head_ph:        $("input[name='head_ph']", _form).val(),
        head_email:     $("input[name='head_email']", _form).val(),
        tpo_name:       $("input[name='tpo_name']", _form).val(),
        tpo_contact1:   $("input[name='tpo_contact1']", _form).val(),
        tpo_contact2:   $("input[name='tpo_contact2']", _form).val(),
        tpo_email:      $("input[name='tpo_email']", _form).val(),
        num_cmp:        $("input[name='num_cmp']", _form).val(),
        num_cmplab:     $("input[name='num_cmplab']", _form).val(),
        min_num_cmp:     $("input[name='min_num_cmp']", _form).val(),
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
        sessionStorage.head_name = dataObj.head_name;
        sessionStorage.head_desg = dataObj.head_desg;
        sessionStorage.head_mob = dataObj.head_mob;
        sessionStorage.head_ph = dataObj.head_ph;
        sessionStorage.head_email = dataObj.head_email;
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
    if(sessionStorage.length == 28){
        //Redirect Location
        window.location = './course_select.php';
    }
})