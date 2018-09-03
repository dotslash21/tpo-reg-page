$(document).ready(function () {
    $('#degree_sel').append(  `<option value="" disabled selected>ALL</option>
                                    <option value="B.Tech">B.Tech</option>
                                    <option value="M.Tech">M. Tech</option>
                                    <option value="BCA">BCA</option>
                                    <option value="MCA">MCA</option>`)
    //$('select#degree_sel').empty();
})

$('#degree_sel').change(function(){ 
    var value = $(this).val();
    console.log(value + value.length);
});

$("button#printall").click(function (event) {
    event.preventDefault();
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

    })
})

//Indevisual College details print function
function printDiv(divName) {
    var printContents = 
        `<html>
            <head>
                <link rel=\"stylesheet\" href=\"https:\/\/cdnjs.cloudflare.com\/ajax\/libs\/materialize\/0.100.2\/css\/materialize.min.css\">
                <style>
                    @media print {
                        #cd {page-break-before: always;}
                    }
                <\/style>
            <\/head>
            <body>
                <div>
                    <h4 style=\"margin-bottom: 0; padding-bottom: 0;\">Centralized Placement Portal<\/h4>
                    <p style=\"margin-top: 1px; margin-left: 5px; display: inline; padding-top: 1px;\">West Bengal<\/p>
                <\/div>
                <hr>`
                +(document.getElementById(divName).innerHTML)+
                `<script src=\"https:\/\/cdnjs.cloudflare.com\/ajax\/libs\/materialize\/0.100.2\/js\/materialize.min.js\"><\/script>
            <\/body>
        <\/html>`;
                        
    var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
    WinPrint.document.write(printContents);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.onload = function () { 
        WinPrint.print();
        WinPrint.close();
    }
}