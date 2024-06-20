<?php
// 
ob_start();
require_once '../config.php';

// Obtenir tous les quiz disponibles
$sql_quiz = "SELECT id_quiz, titre FROM quiz";
$result_quiz = $conn->query($sql_quiz);
$quizs = $result_quiz->fetch_all(MYSQLI_ASSOC);
?>
<div class="container justify-content-center align-items-center mx-auto mt-5">
<form action="quiz_add.php" method="POST">
    <div class="mb-3">
        <label for="titre" class="form-label">Nouveau Quiz :</label>
        <input type="text" class="form-control" id="titre" name="titre" placeholder="Nom du Quiz...">
    </div> 
    <button type="submit" class="btn btn-primary">Ajouter Quiz</button>
</form>
</div>

<?php
$title = "Ajouter un quiz";
$content = ob_get_clean();
require '../layout/layout.php';