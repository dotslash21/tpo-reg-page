//When Lock button is pressed
$(document).ready(function () {
    if(sessionStorage.courseLength !== undefined){
        var crsLen = sessionStorage.courseLength;

        $("#back").remove();
        $("#course_form").append('<p>Please enter the corresponding intake capacity for the following selected courses in the fields below.</p>');
        
        for (var i= 0; i< crsLen; i++) {
            $("#course_form").append(`
                <div class="input-field">
                    <input type="number" id="`+i+`" name="`+sessionStorage['degree-name-'+i]+` - `+sessionStorage['course-name-'+i]+`" min="0" required value="`+sessionStorage['degree-name-'+i]+` - `+sessionStorage['course-value-'+i]+`">
                    <label for="`+i+`">`+sessionStorage['degree-name-'+i]+` - `+sessionStorage['course-name-'+i]+`</label>
                </div>`
            );
        }
        $("#course_form").append('<button class="btn btn-large blue lighten-2 left" id="back2" onclick.href="./form3.php">Back</button><button type="submit" class="btn btn-large green darken-2 right" id="submit" name="submit">Submit & Continue</button><div class="clearfix"></div>');

    }
})

$('#lock').click(function() {

    if(sessionStorage.courseLength !== undefined){
        var delLen = sessionStorage.courseLength;

        for (var i = 0; i < delLen; i++) {
            sessionStorage.removeItem('degree-name-'+i);
            sessionStorage.removeItem('course-name-'+i);
            sessionStorage.removeItem('course-value-'+i);
        } 
        
    }

    var course_array = $('#courses_select').val();

    $("#course_form").empty();
    $("#back").remove();

    if (course_array.length > 0) {
        $("#course_form").append('<p>Please enter the corresponding intake capacity for the following selected courses in the fields below.</p>');
    }
    else {
        $("#button-panel").prepend('<div class="btn btn-large blue lighten-2 left" id="back">Back</div>');
    }
    for (var item in course_array) {
        $("#course_form").append('<div class="input-field"><input type="number" id="'+item+'" name="'+course_array[item]+'" min="0" required><label for="'+item+'">'+course_array[item]+'</label>');
    }
    if (course_array.length > 0) {
        $("#course_form").append('<button type="submit" class="btn btn-large green darken-2 right" id="submit" name="submit">Submit & Continue</button><div class="clearfix"></div>');
    }

});

$(document).on("submit","form#course_form",function(event) {
    event.preventDefault();

    var _form = $(this);
    
    var courseLength = $("input", _form).length;

    for (var i = 0; i < courseLength; i++) {
        sessionStorage['degree-name-'+i] = $("input#"+i, _form).attr("name").split(" - ")[0];
        sessionStorage['course-name-'+i] = $("input#"+i, _form).attr("name").split(" - ")[1];
        sessionStorage['course-value-'+i] = $("input#"+i, _form).val();
    }
    sessionStorage.courseLength = courseLength;

    if(sessionStorage.length == (32 + (courseLength*3) + 1)){
        //Redirect Location
        window.location = './summary.php';
    }
    else{
        alert('Some Error occured');
        return false;
    }
})

//Back Button
$('#back').click( function(){
    event.preventDefault();
    
    var red = './form3.php';
    window.location = red;
})