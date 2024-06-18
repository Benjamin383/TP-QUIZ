<?php

ob_start();
require_once '../config.php';

$id_quiz = $_GET['id_quiz'];

// Obtenir les informations du quiz
$sql = "SELECT id_quiz, titre FROM quiz WHERE id_quiz = $id_quiz";
$result = $conn->query($sql);
$quiz = $result->fetch_assoc();

// Obtenir toutes les questions
$sql_questions = "SELECT q.id_question, q.question, q.difficulte, q.id_categorie, c.nom
FROM question q
INNER JOIN categorie c ON q.id_categorie = c.id_categorie
ORDER BY c.id_categorie, q.id_question";

$result_questions = $conn->query($sql_questions);
$questions = $result_questions->fetch_all(MYSQLI_ASSOC);

// Obtenir toutes les questions du quiz
$sql_quiz_question = "SELECT id_question
FROM quiz_question
WHERE id_quiz = $id_quiz";

$result_quiz_question = $conn->query($sql_quiz_question);
$quiz_question = $result_quiz_question->fetch_all(MYSQLI_ASSOC);
$quiz_question_ids = array_column($quiz_question, 'id_question');
?>

<form action="quiz_update.php" method="post">
    ID:
    <input type="text" name="id_quiz" value="<?= $id_quiz ?>" readonly><br>
    Nom du quiz:
    <input type="text" name="titre" value="<?= $quiz['titre'] ?>"><br>
    <table>
        <thead>
            <tr>
                <th>Questions</th>
                <th>Difficulté</th>
                <th>Catégorie</th>  
            </tr>
        </thead>
        <tbody>
        <?php foreach($questions as $question): ?>
            <tr>
                <td>
                <label>
            <input type="checkbox" name="questions[]" value="<?= $question['id_question'] ?>" <?= in_array((String)$question['id_question'], $quiz_question_ids) ? 'checked' : '' ?> >
            <?= $question['question'] ?>
        </label>
                </td>
                <td>
                <?= $question['difficulte'] ?>
                </td>
                <td>
                <?= $question['nom'] ?>
                </td>
            </tr>
    <?php endforeach; ?> 
        </tbody>
    </table>
    <button>Mettre à jour</button>
</form>

<?php
$title = "Modification de quiz";
$content = ob_get_clean();
require '../layout/layout.php';