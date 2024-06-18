<?php ob_start();
require_once '../config.php';

$sql_categorie = "SELECT id_categorie, nom FROM categorie ORDER BY id_categorie";
$result_categorie = $conn->query($sql_categorie);
?>
Catégorie : 
<select name="id_categorie" id="id_categorie">
    <?php if ($result_categorie->num_rows > 0) : ?>
        <?php while ($row = $result_categorie->fetch_assoc()) : ?>
            <option value="<?= $row['id_categorie'] ?>"><?= $row['nom'] ?></option>
        <?php endwhile ?>
    <?php else : ?>
        <option value="">--Sélectionner une catégorie--</option>
    <?php endif ?>
</select>
<a href="/question/question_list.php?id_categorie=2">Voir</a>

<?php
$id_categorie = isset($_GET['id_categorie']) ? $_GET['id_categorie'] : 2;
$sql = "SELECT q.id_question, q.question, q.options, q.correctAnswer, q.difficulte, c.id_categorie, c.nom
FROM question q
INNER JOIN categorie c ON c.id_categorie = q.id_categorie
WHERE q.id_categorie = $id_categorie
ORDER BY c.id_categorie, q.id_question ASC";
$result = $conn->query($sql);
?>

<?php if ($result->num_rows > 0) : ?>
    <table>
        <thead>
            <tr>
                <th>Questions</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $row['question'] ?></td>
                        <td><a href="question_update.php?id_question=<?= $row['id_question'] ?>">Modifier</a></td>
                        <td ><a href="question_delete.php?id_question=<?= $row['id_question'] ?>">🗑️</a></td>
                    </tr>
            <?php endwhile ?>
        </tbody>
    </table>
<?php else : ?>
    <p>Pas de résultats</p>
<?php endif ?>
<?php
$title = "Liste des questions";
$content = ob_get_clean();
include '../layout/layout.php';