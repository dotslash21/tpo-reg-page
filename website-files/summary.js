$(document).ready(function(){
    if(sessionStorage){

        $("#course-intake").empty();
        var cursLength = sessionStorage.courseLength;
        for (var i=0; i < cursLength ;i++) {
            $("#course-intake").append('<li class="collection-item"><div class="row"><div class="col s8">'+sessionStorage['course-name-'+i]+'</div><div class="col s4">Intake: '+sessionStorage['course-value-'+i]+'</div></div></li>');
        }
        document.getElementById("name").value           = "";
        document.getElementById("inst_code").value      = "";
        document.getElementById("uid").value            = "";
        document.getElementById("password").value       = "";
        document.getElementById("estd").value           = "";
        document.getElementById("accrd").value          = "";
        document.getElementById("inst_typ").value       = "";
        document.getElementById("affli").value          = "";
        document.getElementById("inst_appr").value      = "";
        document.getElementById("address").value        = "";
        document.getElementById("pin").value            = "";
        document.getElementById("inst_state").value     = "";
        document.getElementById("ins_dst").value        = "";
        document.getElementById("number").value         = "";
        document.getElementById("email").value          = "";
        document.getElementById("website").value        = "";
        document.getElementById("head_name").value      = "";
        document.getElementById("head_desg").value      = "";
        document.getElementById("head_mob").value       = "";
        document.getElementById("head_ph").value        = "";
        document.getElementById("head_email").value     = "";
        document.getElementById("tpo_name").value       = "";
        document.getElementById("tpo_contact1").value   = "";
        document.getElementById("tpo_contact2").value   = "";
        document.getElementById("tpo_email").value      = "";
        document.getElementById("num_cmp").value        = "";
        document.getElementById("num_cmplab").value     = "";
        document.getElementById("min_num_cmp").value    = "";
        document.getElementById("ispeed").value         = "";
        document.getElementById("hall_cap").value       = "";
        document.getElementById("num_cctv").value       = "";
        document.getElementById("has_fiber").value      = "";
    }
    else{
        alert("Bug is there");
    }
});