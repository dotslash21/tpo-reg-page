//For material select
$(document).ready(function () {
    $('select').material_select();
});
$('select').material_select('destroy');

//For District perpose
$(document).ready(function(){
    $('#district_txt').show();
    $('#district_sel').hide()
    $('#inst_state').change(function () {
        var selected = $('#inst_state option:selected').text();
        if(selected == 'West Bengal (WB)') {
            $('#district_txt').hide();
            $('#district_txt').attr("name", "");
            $('#district_sel').show();
            $('#district_sel').attr("name", "ins_dst");
        }
        else {
            $('#district_txt').show();
            $('#district_txt').attr("name", "ins_dst");
            $('#district_sel').hide();
            $('#district_sel').attr("name", "");
        }
    });
});
