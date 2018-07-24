$(document).ready(function(){
    if(sessionStorage){

        // Course Intake Detials
        $("#course-intake").empty();
        var cursLength = sessionStorage.courseLength;
        for (var i=0; i < cursLength ;i++) {
            $("#course-intake").append('<li class="collection-item"><div class="row"><div class="col s8">'+sessionStorage['course-name-'+i]+'</div><div class="col s4">Intake: '+sessionStorage['course-value-'+i]+'</div></div></li>');
        }
        //Basic Institute Details
        $("input[name='name']").val(sessionStorage.name);
        $("input[name='inst_code']").val(sessionStorage.inst_code);
        $("input[name='uid']").val(sessionStorage.uid);
        $("input[name='password']").val(sessionStorage.password);
        $("input[name='estd']").val(sessionStorage.estd);
        $("input[name='accrd']").val(sessionStorage.accrd);
        $("input[name='inst_type']").val(sessionStorage.inst_type);
        $("input[name='affli']").val(sessionStorage.affli);
        $("input[name='inst_appr']").val(sessionStorage.inst_appr);
        $("input[name='address']").val(sessionStorage.address);
        $("input[name='pin']").val(sessionStorage.pin);
        $("input[name='inst_state']").val(sessionStorage.inst_state);
        $("input[name='ins_dst']").val(sessionStorage.ins_dst);
        $("input[name='number']").val(sessionStorage.number);
        $("input[name='email']").val(sessionStorage.email);
        $("input[name='website']").val(sessionStorage.website);

        // Institute head details
        $("input[name='head_name']").val(sessionStorage.head_name);
        $("input[name='head_desg']").val(sessionStorage.head_desg);
        $("input[name='head_mob']").val(sessionStorage.head_mob);
        $("input[name='head_ph']").val(sessionStorage.head_ph);
        $("input[name='head_email']").val(sessionStorage.head_email);

        // Institute TPO details
        $("input[name='tpo_name']").val(sessionStorage.tpo_name);
        $("input[name='tpo_contact1']").val(sessionStorage.tpo_contact1);
        $("input[name='tpo_contact2']").val(sessionStorage.tpo_contact2);
        $("input[name='tpo_email']").val(sessionStorage.tpo_email);

        //Instute INFO 
        $("input[name='num_cmp']").val(sessionStorage.num_cmp);
        $("input[name='num_cmplab']").val(sessionStorage.num_cmplab);
        $("input[name='min_num_cmp']").val(sessionStorage.min_num_cmp);
        $("input[name='ispeed']").val(sessionStorage.ispeed);
        $("input[name='hall_cap']").val(sessionStorage.hall_cap);
        $("input[name='num_cctv']").val(sessionStorage.num_cctv);
        $("input[name='has_fiber']").val(sessionStorage.has_fiber);
    }
    else{
        alert("Bug is there");
    }
});