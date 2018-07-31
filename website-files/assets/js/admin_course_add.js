$(document).ready(function () {
    $('#new_degree').hide();

    $('#old_degree_input').change(function () {
        var selected = $('#old_degree_input option:selected').text();
        if (selected == 'Other') {
            $('#old_degree_input').attr("name", "degree_old");
            $('#new_degree').show();
            $('#new_degree_input').attr("name", "degree");
        }
        else {
            $('#old_degree_input').attr("name", "degree");
            $('#new_degree').hide();
            $('#new_degree_input').attr("name", "degree_new");
        }
    });
});

$(document).on("submit", "form.add-frm", function(){
    event.preventDefault();

    var _form = $(this);

    var dataObj ={
        degree:     $("[name='degree']", _form).val(),
        course:     $("input[name='course']", _form).val()
    }

    if(dataObj.degree.length == 0){
        alert("Fill the Degree Field");
        return false;
    }
    else if(dataObj.course.length == 0){
        alert("Fill the Course Field");
        return false;
    }

    console.log(dataObj);
    
    $.ajax({
		type: 'POST',
		url: '../ajax/admin_course_add.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
    .done(function ajaxDone(data) {
        // Whatever data is

        if(data.result !== undefined){
            alert(data.result);
        }
        if(data.error !== undefined){
            alert(data.error);
        }
	
	})
    .fail(function ajaxFailed(e){
        // This Failed

    })
    .always(function ajaxAlwaysDoThis(data){
        // Always do

    })


    return false;
})