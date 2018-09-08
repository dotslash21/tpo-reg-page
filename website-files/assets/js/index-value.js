$(document).ready(function () {

    var college_num     = $("#college_num");
    var domain_num      = $("#domain_num");
    var degree_num      = $("#degree_num");
    var intake          = $("#intake");
    var notice_section  = $("#notice_section");     //Notice

    var sendData = {
        id: 1
    }

    $.ajax({
        type: 'POST',
        url: './ajax/index-value.php',
        data: sendData,
        dataType: 'json',
        async: true,
    })
    .done(function (data) {
        if(data.college_num !== undefined){
            college_num.empty();
            college_num.text(data.college_num);
            console.log(data.college_num);
        }
        if(data.domain_num !== undefined){
            domain_num.empty();        
            domain_num.text(data.domain_num);
            console.log(data.domain_num);
        }
        if(data.degree_num !== undefined){
            degree_num.empty();
            degree_num.text(data.degree_num);
            console.log(data.degree_num);
        }
        if(data.intake !== undefined){
            intake.empty();
            intake.text(data.intake);
            console.log(data.intake);
        }
        if(data.notice !== undefined){
            notice_section.empty();
            notice_section.html(data.notice).show()
        }
    })
    .always(function (d) {
      console.log("Fetched");
    })

  })



  var a = `<div class="list styled custom-list notice-block">
  <ul class="marquee">
    <li>
      <a title="Snatoque penatibus et magnis dis partu rient montes ascetur ridiculus mus." href="#">Snatoque penatibus et magnis dis</a>
    </li>
    <li>
      <a title="Fusce feugiat malesuada odio. Morbi nunc odio gravida at cursus nec luctus." href="#">Fusce feugiat malesuada odio</a>
    </li>
    <li>
      <a title="Penatibus et magnis dis parturient montes ascetur ridiculus mus." href="#">Lorem ipsum dolor sit amet</a>
    </li>
    <li>
      <a title="Morbi nunc odio gravida at cursus nec luctus a lorem. Maecenas tristique orci." href="#">Morbi nunc odio gravida at cursus nec luctus a lorem</a>
    </li>
    <li>
      <a title="Snatoque penatibus et magnis dis partu rient montes ascetur ridiculus mus." href="#">Praesent tempus eleifend risus ut congue</a>
    </li>
    <li>
      <a title="Fusce feugiat malesuada odio. Morbi nunc odio gravida at cursus nec luctus." href="#">Consectetur adipiscing elit</a>
    </li>
  </ul>
</div>`