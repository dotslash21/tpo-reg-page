$(document).ready(function(){
    if(sessionStorage){

        $("#course-intake").empty();
        var cursLength = sessionStorage.courseLength;
        for (var i=0; i < cursLength ;i++) {
            $("#course-intake").append('<li class="collection-item"><div class="row"><div class="col s8">'+sessionStorage['course-name-'+i]+'</div><div class="col s4">Intake: '+sessionStorage['course-value-'+i]+'</div></div></li>');
        }
        document.getElementById("name").value           = sessionStorage.name;
        document.getElementById("inst_code").value      = sessionStorage.inst_code;
        document.getElementById("uid").value            = sessionStorage.uid;
        document.getElementById("password").value       = sessionStorage.password;
        document.getElementById("estd").value           = sessionStorage.estd;
        document.getElementById("accrd").value          = sessionStorage.accrd;
        document.getElementById("inst_typ").value       = sessionStorage.inst_typ;
        document.getElementById("affli").value          = sessionStorage.affli;
        document.getElementById("inst_appr").value      = sessionStorage.inst_appr;
        document.getElementById("address").value        = sessionStorage.address;
        document.getElementById("pin").value            = sessionStorage.pin;
        document.getElementById("inst_state").value     = sessionStorage.inst_state;
        document.getElementById("ins_dst").value        = sessionStorage.ins_dst;
        document.getElementById("number").value         = sessionStorage.number;
        document.getElementById("email").value          = sessionStorage.email;
        document.getElementById("website").value        = sessionStorage.website;
        document.getElementById("head_name").value      = sessionStorage.head_name;
        document.getElementById("head_desg").value      = sessionStorage.head_desg;
        document.getElementById("head_mob").value       = sessionStorage.head_mob;
        document.getElementById("head_ph").value        = sessionStorage.head_ph;
        document.getElementById("head_email").value     = sessionStorage.head_email;
        document.getElementById("tpo_name").value       = sessionStorage.tpo_name;
        document.getElementById("tpo_contact1").value   = sessionStorage.tpo_contact1;
        document.getElementById("tpo_contact2").value   = sessionStorage.tpo_contact2;
        document.getElementById("tpo_email").value      = sessionStorage.tpo_email;
        document.getElementById("num_cmp").value        = sessionStorage.num_cmp;
        document.getElementById("num_cmplab").value     = sessionStorage.num_cmplab;
        document.getElementById("min_num_cmp").value    = sessionStorage.min_num_cmp;
        document.getElementById("ispeed").value         = sessionStorage.ispeed;
        document.getElementById("hall_cap").value       = sessionStorage.hall_cap;
        document.getElementById("num_cctv").value       = sessionStorage.num_cctv;
        document.getElementById("has_fiber").value      = sessionStorage.has_fiber;
    }
    else{
        alert("Bug is there");
    }
});