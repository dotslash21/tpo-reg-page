$(document).ready(function(){
    if(sessionStorage){

        // Course Intake Detials
        $("#course-intake").empty();
        var cursLength = sessionStorage.courseLength;
        for (var i=0; i < cursLength ;i++) {
            $("#course-intake").append(
                `<li class="collection-item">
                    <div class="row">
                        <div class="col s8">
                            <span class="deg-name">`+sessionStorage['degree-name-'+i]+`</span>
                            <span> - </span>
                            <span class="crs-name">`+sessionStorage['course-name-'+i]+`</span>
                        </div>
                        <div class="col s4">
                            Intake:<span class="crs-value"> `+sessionStorage['course-value-'+i]+`</span>
                        </div>
                    </div>
                </li>`
            );
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
        document.getElementById("address").value = sessionStorage.address;
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


//Registration 
//Starts on click of the submit button
$(document).submit(function(event) {
    event.preventDefault();

    var resetbtn = $("button#resetbtn");
    var submitbtn = $("button#submit");

    console.log("Submitting");
    var dataObj = {
        name        : $("input[name='name']").val(),
        inst_code   : $("input[name='inst_code']").val(),
        uid         : $("input[name='uid']").val(),
        password    : $("input[name='password']").val(),
        estd        : $("input[name='estd']").val(),
        accrd       : $("input[name='accrd']").val(),
        inst_type   : $("input[name='inst_type']").val(),
        affli       : $("input[name='affli']").val(),
        inst_appr   : $("input[name='inst_appr']").val(),
        address     : document.getElementById("address").value,
        pin         : $("input[name='pin']").val(),
        inst_state  : $("input[name='inst_state']").val(),
        ins_dst     : $("input[name='ins_dst']").val(),
        number      : $("input[name='number']").val(),
        email       : $("input[name='email']").val(),
        website     : $("input[name='website']").val(),

        // Institute head details
        head_name   : $("input[name='head_name']").val(),
        head_desg   : $("input[name='head_desg']").val(),
        head_mob    : $("input[name='head_mob']").val(),
        head_ph     : $("input[name='head_ph']").val(),
        head_email  : $("input[name='head_email']").val(),

        // Institute TPO details
        tpo_name    : $("input[name='tpo_name']").val(),
        tpo_contact1 : $("input[name='tpo_contact1']").val(),
        tpo_contact2 : $("input[name='tpo_contact2']").val(),
        tpo_email   : $("input[name='tpo_email']").val(),

        //Instute INFO
        num_cmp     : $("input[name='num_cmp']").val(),
        num_cmplab  : $("input[name='num_cmplab']").val(),
        min_num_cmp : $("input[name='min_num_cmp']").val(),
        ispeed      : $("input[name='ispeed']").val(),
        hall_cap    : $("input[name='hall_cap']").val(),
        num_cctv    : $("input[name='num_cctv']").val(),
        has_fiber   : $("input[name='has_fiber']").val(),
        courseLength: sessionStorage.courseLength
    };

    //All varification and helper massage done
    if(dataObj.name.length < 5){
        alert("Please enter the full Institute name");
        return false;
    }
    else if(dataObj.inst_code.length < 1){
        alert("Plese enter a valid Institute Code");
        return false;
    }
    else if(dataObj.uid.length < 1){
        alert("Plese enter a valid Institute ID");
        return false;
    }
    else if(dataObj.password.length < 8){
        alert("Please enter a password that is atleast 8 charecters");
        return false;
    }
    else if(dataObj.estd.length < 4){
        alert("Plese enter a valid ESTD Ex-2018");
        return false;
    }
    else if(dataObj.accrd === undefined){
        alert("Please choose Institue Accriditation ");
        return false;
    }
    else if(dataObj.inst_type === undefined){
        alert("Please choose Institue Type");
        return false;
    }
    else if(dataObj.affli === undefined){
        alert("Please choose Institue Affliation");
        return false;
    }
    else if(dataObj.inst_appr == undefined){
        alert("Please choose Institue Approve");
        return false;
    }
    else if(dataObj.address.length < 10){
        alert("Please enter a valid Address");
        return false;
    }
    else if(dataObj.pin.length < 6){
        alert("Please enter a valid Pin");
        return false;
    }
    else if(dataObj.inst_state === undefined){
        alert("Please select a State");
        return false;
    }
    else if(dataObj.ins_dst === undefined){
        alert("Please enter a valid District");
        return false;
    }
    else if(dataObj.number.length < 9){
        alert("Please enter a valid Contact Number");
        return false;
    }
    else if(dataObj.email.length < 8){
        alert("Please enter a valid Email");
        return false;
    }
    else if(dataObj.website === undefined){
        alert("Please enter a Website");
        return false;
    }

    // Institute head details
    if(dataObj.head_name == undefined){
        alert("Please enter a Institute Head Name");
        return false;
    }
    else if(dataObj.head_desg === undefined){
        alert("Please enter a Institute Head Designation");
        return false;
    }
    else if(dataObj.head_mob === undefined){
        alert("Please enter a Institute Head Mobile");
        return false;
    }
    else if(dataObj.head_ph === undefined){
        alert("Please enter a Institute Head Land Line");
        return false;
    }
    else if(dataObj.head_email === undefined){
        alert("Please enter a Institute Head Email ID");
        return false;
    }

    // Institute TPO details
    if(dataObj.tpo_name === undefined){
        alert("Please enter a Institute TPO Name");
        return false;
    }
    else if(dataObj.tpo_contact1 === undefined){
        alert("Please enter a Institute TPO Contact Number");
        return false;
    }
    else if(dataObj.tpo_email === undefined){
        alert("Please enter a Institute TPO Email ID");
        return false;
    }
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
    else if(dataObj.courseLength ===  undefined){
        alert("Course Details are not added Correctly");
        return false;
    }
    //Hide the reset btn ehen submitting, if it passes the above text
    resetbtn.hide();

    var degreeName = [];
    var courseName = [];
    var courseValue = [];

    $(".deg-name").each(function(i){
        degreeName.push($(this).text());
    });
    $(".crs-name").each(function(i){
        courseName.push($(this).text());
    });
    $(".crs-value").each(function(j){
        courseValue.push($(this).text());
    });
    var sendData = {dataObj: dataObj, degreeName: degreeName, courseName: courseName, courseValue: courseValue};
    //Start of AJAX process

	$.ajax({
		type: 'POST',
		url: '../ajax/register.php',
		data: sendData,
		dataType: 'json',
        async: true,
        beforeSend: function(){
            submitbtn.attr('disabled', true);

            submitbtn.html(`
            <div class="preloader-wrapper small active">
                <div class="spinner-layer spinner-yellow-only">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>`)
        }
	})
    .done(function ajaxDone(data) {

        // Whatever data is
        if(data.error !== undefined){
            alert(data.error);

            //Submit btn comes back
            submitbtn.removeAttr('disabled');
            submitbtn.html(`Failed. Retry`);
        }
        if(data.result == 'successful'){
            //After a successful entry of data in Database
            sessionStorage.clear();
        }
        if(data.redirect !== undefined){
            window.location = data.redirect;
        }
	
	})
    .fail(function ajaxFailed(e){
        // This Failed
        submitbtn.removeAttr('disabled');
        submitbtn.html(`Failed. Retry`);
    })
    .always(function ajaxAlwaysDoThis(data){
        // Always do
        resetbtn.show();
        console.log("Always");
    })


    return false;
})

//Editing feature
$('button#resetbtn').click( function(){
    event.preventDefault();
    
    var red = './form.php';
    window.location = red;
})