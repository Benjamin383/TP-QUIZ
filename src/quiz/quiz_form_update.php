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
<div class="container">
<form action="quiz_update.php" method="post">

    <label class="form-label" for="id">ID:</label>
    <input class="form-control" type="text" name="id_quiz" value="<?= $id_quiz ?>" readonly><br>

    <label class="form-label" for="nom_du_quiz:">Nom du quiz:</label>
    <input class="form-control" type="text" name="titre" value="<?= $quiz['titre'] ?>"><br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Questions</th>
                <th scope="col">Difficulté</th>
                <th scope="col">Catégorie</th>  
            </tr>
        </thead>
        <tbody>
        <?php foreach($questions as $question): ?>
            <tr>
                <td>
                <label class="form-label">
            <input class="form-check-input" type="checkbox" name="questions[]" value="<?= $question['id_question'] ?>" <?= in_array((String)$question['id_question'], $quiz_question_ids) ? 'checked' : '' ?> >
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
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
</div>

<?php
$title = "Modification de quiz";
$content = ob_get_clean();
require '../layout/layout.php';