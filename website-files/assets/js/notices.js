$(document).ready(function () {
    var _notice = $("tbody#notice-entry");
    var dataObj = {
        id: 1
    }
    $.ajax({
        type: 'POST',
        url: '../ajax/notices.php',
        data: dataObj,
        dataType: 'json',
        async: true,
    })
    .done(function (data) {
        if(data.notices !== undefined){
            _notice.append(data.notices).show();
        }
    })
})