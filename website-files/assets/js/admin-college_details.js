$(document).ready(function () {

    function ajaxxx(dx) {
        $.ajax({
            type: 'POST',
            url: '../ajax/admin_college_details.php',
            data: dx,
            dataType: 'json',
            async: true,
        })
        .done(function (data) {
            if(data.degree !== undefined){
                var deg = `<option value="" disabled selected>ALL</option>` + data.degree;
                $("#degree_sel").append(deg);
                $("#degree_sel").trigger('contentChangedDeg');
            }
            if(data.course !== undefined){
                var crs = `<option value="" disabled selected>ALL</option>` + data.course;
                $("#course_sel").append(crs);
                $("#course_sel").trigger('contentChangedCrs');
            }
        })
    }
    // initialize the course select
    $(".degree_sel").material_select();
    $(".course_sel").material_select();

    // setup listener for custom event to re-initialize on change
    $('.degree_sel').on('contentChangedDeg', function() {
        $(this).material_select();
    });
    $('.course_sel').on('contentChangedCrs', function() {
        $(this).material_select();
    });

    var dData = {
        token: $("meta[name='token']").attr('content'),
        degree: 'all',
        course: 'all',
        degreeCount: undefined,
        courseCount: undefined
    }

    ajaxxx(dData);

    $('#degree_sel').change(function(){ 
        var value_degree = $(this).val();
        console.log(value_degree + value_degree.length);
        if(!value_degree.length != 0){
            dData.degree = value_degree;
            dData.degreeCount = value_degree.length
            ajaxxx(dData);
        }
    });

    $('#course_sel').change(function(){ 
        var value_course = $(this).val();
        console.log(value_course + value_course.length);
        if(value_course.length != 0){
            console.log("Hi");
            dData.course = value_course;
            dData.courseCount = value_course.length;
            ajaxxx(dData);
        }
    });

})

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