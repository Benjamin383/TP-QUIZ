$(document).ready(function () {
  $("#screen_play button").click(() => {
    $("h1").text("question 1");
    let response_form = $("#response_form");
      response_form.empty();

    $.ajax({url:"play_get_question.php", 
      method: "POST", 
      data:{id_quiz: "2"}, 
      datatype: "json"

    }).done(function(data){

      response_form.html(data);
      
    }).fail(function() {
      // J'affiche un message d'erreur
      response_form.html("Aucun résultat trouvé.");
    })    
  });
    

    // Lancement du timer
    $.getScript("/js/timer_play.js");
  });
});
