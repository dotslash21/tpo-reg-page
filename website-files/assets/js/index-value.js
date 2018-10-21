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
        console.log(data.college_name);
      }
      if (data.course !== undefined) {
        course.empty();
        course.html(data.course);
        console.log(data.course);
      }
      if (data.degree !== undefined) {
        degree.empty();
        degree.html(data.degree);
        console.log(data.degree);
      }
      if (data.intake !== undefined) {
        intake.empty();
        intake.text(data.intake);
        console.log(data.intake);
      }
      if (data.notice !== undefined) {
        notice_section.empty();
        notice_section.html(data.notice).show()
      }

      

    })
    .always(function (d) {
      console.log("Fetched");
    })

})