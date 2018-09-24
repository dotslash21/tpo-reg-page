$(document).ready(function () {
    // initialize the course select
    $(".degree_sel").material_select();
    $(".course_sel").material_select();

    // setup listener for custom event to re-initialize on change
    $('.course_sel').on('contentChanged', function() {
        $(this).material_select();
    });

    var dData = {
        token: $("meta[name='token']").attr('content'),
        degree: 'all',
        course: 'all'
    }

    $.ajax({
		type: 'POST',
		url: '../ajax/admin_college_details.php',
		data: dData,
		dataType: 'json',
        async: true,
    })
    .done(function (data) {
        if(data.degree !== undefined){
            var deg = `<option value="" disabled selected>ALL</option>` + data.degree;
            $("#degree_sel").append(deg);
            $("#degree_sel").trigger('contentChanged');
        }
        if(data.course !== undefined){
            var crs = `<option value="" disabled selected>ALL</option>` + data.course;
            $("#course_sel").append(crs);
            $("#course_sel").trigger('contentChanged');
        }
    })
    //$('select#degree_sel').empty();
})

$('#degree_sel').change(function(){ 
    var value = $(this).val();
    console.log(value + value.length);
});

//Function for print all button
$("button#printall").click(function (event) {
    event.preventDefault();
    var dataObj = {
        chk: 1,
        token: $("meta[name='token']").attr("content")
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