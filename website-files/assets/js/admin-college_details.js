var dData = {
    token: $("meta[name='token']").attr('content'),
    degree: 'all',
    course: 'all',
    degreeCount: undefined,
    courseCount: undefined,
    sendDegree: 1,
    sendCourse: 1
}

var value_degree = 0;
var value_course = 0;

$(document).ready(function () {

    //Ajaxing function for degree and course select field manipulation
    function ajaxxx(dx) {
        console.log(dx);
        $.ajax({
            type: 'POST',
            url: '../ajax/admin_college_details.php',
            data: dx,
            dataType: 'json',
            async: true,
        })
            .done(function (data) {
                if (data.degree !== undefined) {
                    var deg = `<option value="" disabled selected>ALL</option>` + data.degree;
                    $("#degree_sel").empty();
                    $("#degree_sel").append(deg);
                    $("#degree_sel").trigger('contentChangedDeg');
                }
                if (data.course !== undefined) {
                    var crs = `<option value="" disabled selected>ALL</option>` + data.course;
                    $("#course_sel").empty();
                    $("#course_sel").append(crs);
                    $("#course_sel").trigger('contentChangedCrs');
                }
            })
    }

    // initialize the course select
    $(".degree_sel").material_select();
    $(".course_sel").material_select();

    // setup listener for custom event to re-initialize on change
    $('.degree_sel').on('contentChangedDeg', function () {
        $(this).material_select();
    });
    $('.course_sel').on('contentChangedCrs', function () {
        $(this).material_select();
    });

    //Call the ajax on ready of the docoment
    ajaxxx(dData);

    //Degree Select field change lissener
    $('#degree_sel').change(function () {
        value_degree = $(this).val();
        console.log(value_degree + value_degree.length);
        if (value_degree.length != 0) {
            dData.degree = value_degree;
            dData.degreeCount = value_degree.length;
            if (value_course.length > 0) {
                dData.sendCourse = 0;
            }
            else {
                dData.sendCourse = 1;
            }
            dData.sendDegree = undefined;
            ajaxxx(dData);
        }
        else if (value_degree.length == 0) {
            dData.degree = 'all';
            dData.degreeCount = undefined;
            dData.sendCourse = 1;
            dData.sendDegree = undefined;
            ajaxxx(dData);
        }
    });

    //Course Select field change lissener
    $('#course_sel').change(function () {
        value_course = $(this).val();
        console.log(value_course + value_course.length);
        if (value_course.length != 0) {
            console.log("Hi");
            dData.course = value_course;
            dData.courseCount = value_course.length;
            if (value_degree.length > 0) {
                dData.sendDegree = 0;
            }
            else {
                dData.sendDegree = 1;
            }
            dData.sendCourse = undefined;
            ajaxxx(dData);
        }
        else if (value_course.length == 0) {
            dData.course = 'all';
            dData.courseCount = undefined;
            dData.sendDegree = 1;
            dData.sendCourse = undefined;
            ajaxxx(dData);
        }
    });
});

//Function for print all button
$("button#printall").click(function (event) {
    event.preventDefault();
    var dataObj = {
        chk: 1,
        degree: dData.degree,
        course: dData.course,
        token: $("meta[name='token']").attr("content")
    }
    console.log(dataObj);
    $.ajax({
        type: 'POST',
        url: '../ajax/print_all.php',
        data: dataObj,
        dataType: 'json',
        async: true,
    })
        .done(function ajaxDone(data) {
            // Whatever data is
            let crs = '';
            let deg = '';

            if (data.course.count !== undefined && data.course.count > 0) {
                if (data.course.count < 2) {
                    crs = encodeURI(data.course[0]);
                }
                else {
                    console.log("Startx");
                    let crs_count = 0;

                    crs = encodeURI(data.course[0]);
                    crs_count++;
                    while (crs_count < data.course.count) {
                        console.log('11');
                        crs += "&" + encodeURI(data.course[crs_count]);
                        crs_count++;
                    }
                }
                console.log(crs);
                if (data.degree.count !== undefined && data.degree.count > 0) {
                    if (data.degree.count < 2) {
                        deg = encodeURI(data.degree[0]);
                    }
                    else {
                        let deg_count = 0;

                        deg = encodeURI(data.degree[0]);
                        deg_count++;
                        while (deg_count < data.degree.count) {
                            deg += "&" + encodeURI(data.degree[deg_count]);
                            deg_count++;
                        }
                    }
                    console.log(deg);
                    if (data.done !== undefined) {
                        window.open('./spreadsheet/print_all_file.php?q=' + data.done + "&" + deg + "&" + crs, '_blank');
                    }
                }
            }

        })
        .fail(function ajaxFailed(e) {
            // This Failed

        })
        .always(function ajaxAlwaysDoThis(data) {
            // Always do

        })
})

//Indevisual College details print function
function printDiv(divName) {
    const printContents =
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
        + (document.getElementById(divName).innerHTML) +
        `<script src=\"https:\/\/cdnjs.cloudflare.com\/ajax\/libs\/materialize\/0.100.2\/js\/materialize.min.js\"><\/script>
            <\/body>
        <\/html>`;

    let WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
    WinPrint.document.write(printContents);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.onload = function () {
        WinPrint.print();
        WinPrint.close();
    }
}