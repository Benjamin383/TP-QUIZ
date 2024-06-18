<?php
// 
ob_start();
require_once '../config.php';

// Obtenir tous les quiz disponibles
$sql_quiz = "SELECT id_quiz, titre FROM quiz";
$result_quiz = $conn->query($sql_quiz);
$quizs = $result_quiz->fetch_all(MYSQLI_ASSOC);
?>

<form action="quiz_add.php" method="POST">
<label for="titre">Nom du quiz :</label><br>    
<input type="text" name="titre" id="titre">
    <br>
    
    <button>Ajouter</button>
</form>

<?php
$title = "Ajouter un quiz";
$content = ob_get_clean();
require '../layout/layout.php';