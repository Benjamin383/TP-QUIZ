$(document).ready(function () {
  $("#screen_play button").click(() => {
    $("h1").text("question 1");
    let response_form = $("#response_form");
      response_form.empty();

      var urlParams = new URLSearchParams(window.location.search);
      const id_quiz_var = urlParams.get('id_quiz');
    $("h1").after("<div id='score'>0</div>");
    let score = $("#score");
    let counterQuestion = 0;

    $.ajax({
      url:"play_get_question.php", 
      type: "POST", 
      data:{id_quiz: id_quiz_var}, 
      success: function (data) {
      
      console.log(data);
      $("h1").html(data[0].question);

      let options = data[0].options.split(",");
      $.each(options, function( index, value ) {
        let str = value.replace("[","").replace("]","");
        $("#response_form").append( "<button type='button' class='option' name='option' value='"+ ++index +"'>" + str + "</button>");
      });

      //Lorsqu'on clique sur une réponse
      $(".option").click(function(e){
        e.preventDefault();

        //Si c'est correct, on augmente le score
        if($(this).prop("value") === data[0].correctAnswer){
          let number = parseInt(score.text());
          score.html(++number);
        }
      });



    },
      error: function (error) {
        console.error('Error uploading questions :', error);
      }
    });
  
  
  // ).done(function(data){

  //     response_form.html(data);
      
  //   }).fail(function() {
  //     // J'affiche un message d'erreur
  //     response_form.html("Aucun résultat trouvé.");
  //   });
    

  //   $.ajax({
  //     url: apiUrl + 'photos',
  //     type: 'POST',
  //     data: formData,
  //     processData: false,
  //     contentType: false,
  //     success: function () {
  //         fetchPhotos();
  //     },
  //     error: function (error) {
  //         console.error('Error uploading photos:', error);
  //     }
  // });

    // Lancement du timer
    $.getScript("/js/timer_play.js");
  });
});
