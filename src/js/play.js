$(document).ready(function () {
  $("#screen_play button").click(() => {
    $("h1").text("question 1");
    $("#response_form").empty();
    //lancement du timer
    $.getScript("/js/timer_play.js");
  });
});
