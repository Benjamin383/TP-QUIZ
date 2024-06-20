<?php
ob_start();
require_once '../config.php';

$id_quiz = $_GET['id_quiz'];

$sql_quiz = "SELECT titre FROM quiz WHERE id_quiz=$id_quiz";
$result_quiz = $conn->query($sql_quiz);
$quizs = $result_quiz->fetch_assoc();

?>
<div id="timer"  class="fw-bold mx-auto w-25 text-center mt-5"></div>


<div id="screen_play" class="container justify-content-center align-items-center mx-auto mt-5">
    <h1 class="text-center"><?= $quizs['titre'] ?></h1>
    <form id="response_form" action="/play/play_get_question.php" method="POST">
        <div class="d-grid gap-2 col-6 mx-auto">
            <input type="hidden" name="id_quiz" value="<?= $_GET['id_quiz']?>"  />
            <button type="submit" class="btn btn-success" id="play_btn">Jouer</button>
        </div>
    </form>
</div>
<script defer src="../js/play.js"></script>
<?php
$title = "Quiz";
$content = ob_get_clean();
require '../layout/layout.php';
