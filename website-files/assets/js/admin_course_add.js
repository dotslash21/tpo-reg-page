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
    var _res = $("#result");

    var dataObj ={
        degree:     $("[name='degree']", _form).val(),
        course:     $("input[name='course']", _form).val(),
        token:      $("meta[name='X-CSRF']").attr('content')
    }

    if(dataObj.degree === undefined || dataObj.degree === null){
        if(dataObj.length < 1){
            console.log("err1");
            _res.html("<span class=\"red-text text-lighten-1\">Fill the Degree Field</span>").show();
            return false;
        }
        console.log("err1");
        _res.html("<span class=\"red-text text-lighten-1\">Fill the Degree Field</span>").show();
        return false;
    }
    else if(dataObj.course === undefined || dataObj.course.length < 1){
        console.log("err2");
        _res.html("<span class=\"red-text text-lighten-1\">Fill the Course Field</span>").show();
        return false;
    }
    
    _res.hide();
    
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
            _res.html(data.result).show();
        }
        if(data.error !== undefined){
            _res.html(data.error).show();
        }
	
	})
    .fail(function ajaxFailed(e){
        // This Failed

    })
    .always(function ajaxAlwaysDoThis(data){
        // Always do
        $("form.add-frm")[0].reset();
    })


    return false;
})