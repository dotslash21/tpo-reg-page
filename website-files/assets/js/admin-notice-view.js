$(document).ready(function () {
    var _noticearea = $("#notices");

    var dataObj = {
        id: 1
    }

    $.ajax({
        type: 'POST',
        url: '../ajax/admin-notice-view.php',
        data: dataObj,
        dataType: 'json',
        async: true,
    })
    .done(function(data){
        if(data.notices !== undefined){
            _noticearea.append(data.notices).show();
        }
    })
})