<?php

ob_start();
require_once '../config.php';

$id_question = $_GET['id_question'];

// Obtenir les informations de la question
$sql = "SELECT q.id_question, q.question, q.options, q.correctAnswer, q.difficulte, c.id_categorie, c.nom
FROM question q
INNER JOIN categorie c ON q.id_categorie = c.id_categorie
WHERE q.id_question = $id_question";
$result = $conn->query($sql);
$question = $result->fetch_assoc();

// Obtenir la liste de toutes les catégories
$sql_categorie = "SELECT id_categorie, nom FROM categorie";
$result_categorie = $conn->query($sql_categorie);
$categories = $result_categorie->fetch_all(MYSQLI_ASSOC);
$categories_ids = array_column($categories, 'id_categorie');
?>

<form action="question_update.php" method="post">
    ID :
    <input type="text" name="id_question" value="<?= $id_question ?>" readonly><br>
    Titre :
    <input type="text" name="question" value="<?= $question['question'] ?>"><br>
    <table>
        <thead>
            <tr>
                <th>Questions</th>
                <th>Propositions</th>
                <th>Réponse</th>
                <th>Difficulté</th>
                <th>Catégorie</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input type="text" name="question" value="<?= $question['question'] ?>">
                </td>
                <td>
                    <input type="text" name="options" value="<?= str_replace("\"", "", $question['options']) ?>">
                </td>
                <td>
                    <input type="text" name="correctAnswer" value="<?= $question['correctAnswer'] ?>">
                </td>
                <td>
                    <input type="text" name="difficulte" value="<?= $question['difficulte'] ?>">
                </td>
                <td>
                    <select name="id_categorie" id="id_categorie" >
                        
                            <?php foreach ($categories as $categorie): ?>
                                <option value="<?= $categorie['id_categorie'] ?>" <?= $question['id_categorie'] === $categorie['id_categorie'] ? 'selected': '' ?> >
                                    <?= $categorie['nom'] ?>
                                </option>
                            <?php endforeach ?> 
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <button>Mettre à jour</button>
</form>

<?php
$title = "Modification de la question";
$content = ob_get_clean();
require '../layout/layout.php';
