<?php
ob_start();
require_once 'config.php';

$id_quiz = $_GET['id_quiz'];

$sql_quiz = "SELECT titre FROM quiz WHERE id_quiz=$id_quiz";
$result_quiz = $conn->query($sql_quiz);
$quizs = $result_quiz->fetch_assoc();

?>
<div class="container justify-content-center align-items-center mx-auto mt-5">
    <h1 class="text-center"><?= $quizs['titre'] ?></h1>
    <form action="" method="POST">
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" class="btn btn-success">Jouer</button>
        </div>
</form>
</div>
<?php
$title = "Quiz";
$content = ob_get_clean();
require 'layout/layout.php';