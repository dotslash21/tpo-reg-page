$(document).on("submit","form#course_form",function(event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $(".js-error", _form);
    
    var courseLength = $("input", _form).length;

    console.log($("input", _form));
    for (let i = 0; i < $("input", _form).length; i++) {
        console.log(i);
        console.log($("input#"+i, _form).val());
        console.log($("input#"+i, _form).attr("name"));
        sessionStorage['course-name-'+i] = $("input#"+i, _form).attr("name");
        sessionStorage['course-value-'+i] = $("input#"+i, _form).val();
    }
    sessionStorage.courseLength = courseLength;

    if(sessionStorage.length == (32 + (courseLength*2) + 1)){
        //Redirect Location
        window.location = './summary.php';
    }
    else{
        alert('Some Error occured');
        return false;
    }
})