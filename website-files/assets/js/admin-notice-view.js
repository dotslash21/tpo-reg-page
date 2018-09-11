//Fetch all notice data from ajax
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
            _noticearea.append(data.notices).show();        //Show the data

            //After that setup the buttons for another process
            $(".edit_btn").click(function(){
                console.log($(this).attr('id'))
            })
            $(".delete-btn").click(function(){
                console.log($(this).attr('id'))
            })
        }
    });
})
