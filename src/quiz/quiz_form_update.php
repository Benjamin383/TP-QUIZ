<?php

ob_start();
require_once '../config.php';

$id_quiz = $_GET['id_quiz'];

// Obtenir les informations du quiz
$sql = "SELECT id_quiz, titre FROM quiz WHERE id_quiz = $id_quiz";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<form action="quiz_update.php" method="post">
    ID:
    <input type="text" name="id_quiz" value="<?= $id_quiz ?>" readonly><br>
    Nom du quiz:
    <input type="text" name="titre" value="<?= $user['titre'] ?>"><br>
    <button>Mettre à jour</button>
</form>

<?php
$title = "Modification de quiz";
$content = ob_get_clean();
require '../layout/layout.php';