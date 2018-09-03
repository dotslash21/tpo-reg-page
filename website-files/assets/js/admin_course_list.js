$(document).ready(function () {
    var _course = $("#course-set");
    
    $.ajax({
        type: 'POST',
        url: '../ajax/admin_course_list.php',
        dataType: 'json',
        async: true
    })
    .done(function (data) {
        if(data.list !== undefined){
            _course.append(data.list);
        }
    })
})