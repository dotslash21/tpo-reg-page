//Fetch all notice data from ajax
$(document).ready(function () {
    var _noticearea = $("#notices");
    var token = $("meta[name='token']").attr("content");
    var dataObj = {
        action: 'none',
        token: token,
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
            //edit button
            $(".edit_btn").click(function(){
                var _id = $(this).attr('id');
                console.log(_id);
                var dataEdit = {
                    action: 'edit',
                    token: token,
                    id: _id
                }
                //start ajax request
                $.ajax({
                    type: 'POST',
                    url: '../ajax/admin-notice-view.php',
                    data: dataEdit,
                    dataType: 'json',
                    async: true,
                })
                .done(function(data){

                })
            })
            //delete button
            $(".delete-btn").click(function(){
                _id = $(this).attr('id');
                console.log(_id);
                var dataDel = {
                    action: 'delete',
                    token: token,
                    id: _id
                }
                //Prompt the user
                if (window.confirm('Will you want to delete the Notice?')){
                    //start ajax request
                    $.ajax({
                        type: 'POST',
                        url: '../ajax/admin-notice-view.php',
                        data: dataDel,
                        dataType: 'json',
                        async: true,
                    })
                    .done(function(data){

                    })
                }
                else{

                }
            })
        }
    });
})
