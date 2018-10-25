$(document).ready(function () {

  var college_name = $("#college_name");
  var course = $("#course");
  var degree = $("#degree");
  var intake = $("#intake");
  var notice_section = $("#notice_section");     //Notice

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
      if (data.college_name !== undefined) {
        college_name.empty();
        college_name.html(data.college_name);
      }
      if (data.course !== undefined) {
        course.empty();
        course.html(data.course);
      }
      if (data.degree !== undefined) {
        degree.empty();
        degree.html(data.degree);
      }
      if (data.intake !== undefined) {
        intake.empty();
        intake.text(data.intake);
      }
      if (data.notice !== undefined) {
        notice_section.empty();
        notice_section.html(data.notice).show()
      }

      $(function () {
        $('.ticker-container').vTicker({
          speed: 500,
          pause: 1000,
          animation: 'fade',
          mousePause: true,
          showItems: 3
        });
      });

    })
    .always(function (d) {
      console.log("Fetched");
    })

})