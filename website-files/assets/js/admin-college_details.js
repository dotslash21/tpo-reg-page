$("button#printall").click(function () {
    console.log("Clicked");
    var dataObj = {
        chk: 1
    }
    $.ajax({
		type: 'POST',
        url: '../ajax/print_all.php',
        data: dataObj,
		dataType: 'json',
		async: true,
	})
    .done(function ajaxDone(data) {
        // Whatever data is
        if(data.done !== undefined){
            window.open('./spreadsheet/print_all_file.php?q='+data.done, '_blank');
        }
	})
    .fail(function ajaxFailed(e){
        // This Failed

    })
    .always(function ajaxAlwaysDoThis(data){
        // Always do

        console.log("Always");
    })
})