<?php ob_start(); ?>
<?php
require_once 'config.php';

$sql_quiz = "SELECT id_quiz, titre FROM quiz";
$result_quiz = $conn->query($sql_quiz);
$quizs = $result_quiz->fetch_all(MYSQLI_ASSOC);

?>

<h1 class="text-center">Liste des quiz</h1><br>
<table class="table">
        <tr>
            <th scope="col">Numéro</th>
            <th scope="col">Nom du quiz</th>
            <th scope="col">Edition</th>
            <th scope="col">Suppression</th>
        </tr>
<?php foreach ($quizs as $quiz): ?>
        <tr>
            <td><?= $quiz['id_quiz'] ?></td>
            <td>
                 <a href="/play/play.php?id_quiz=<?= $quiz['id_quiz'] ?>"><button type="button" class="btn btn-primary"><?= $quiz['titre'] ?></button></a>
            </td>
            <td><a href="/quiz/quiz_form_update.php?id_quiz=<?= $quiz["id_quiz"] ?>"><button type="button" class="btn btn-warning">Modifier</button></a></td>
            <td><a href="/quiz/quiz_delete.php?id_quiz=<?= $quiz['id_quiz'] ?>"><!--🗑️--><button type="button" class="btn btn-danger">Supprimer</button></a></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
$title = "Accueil";
$content = ob_get_clean();
include 'layout/layout.php';