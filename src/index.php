<?php ob_start(); ?>
<?php
require_once 'config.php';

$sql_quiz = "SELECT id_quiz, titre FROM quiz";
$result_quiz = $conn->query($sql_quiz);
$quizs = $result_quiz->fetch_all(MYSQLI_ASSOC);

?>

Liste des quiz : <br>
<table>
        <tr>
            <th>Numéro</th>
            <th>Nom du quiz</th>
        </tr>
<?php foreach ($quizs as $quiz): ?>
        <tr>
            <td><?= $quiz['id_quiz'] ?></td>
            <td>
                 <?= $quiz['titre'] ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
$title = "Accueil";
$content = ob_get_clean();
include 'layout/layout.php';