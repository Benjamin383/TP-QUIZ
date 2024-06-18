<?php ob_start();
require_once '../config.php';

$sql_categorie = "SELECT id_categorie, nom FROM categorie ORDER BY id_categorie";
$result_categorie = $conn->query($sql_categorie);

$sql_difficulte = "SELECT DISTINCT difficulte FROM question ORDER BY difficulte";
$result_difficulte = $conn->query($sql_difficulte);
?>
 
<form action="question_filtre.php" method="POST">
    Catégorie :
<select name="id_categorie" id="id_categorie">
    <option value="tout">tout</option>
    <?php if ($result_categorie->num_rows > 0) : ?>
        <?php while ($row = $result_categorie->fetch_assoc()) : ?>
            <option value="<?= $row['id_categorie'] ?>" <?= isset($_GET['id_categorie']) && $_GET['id_categorie'] === $row['id_categorie'] ? 'selected' : ''?> ><?= $row['nom'] ?></option>
        <?php endwhile ?>
    <?php else : ?>
        <option value="">--Sélectionner une catégorie--</option>
    <?php endif ?>
</select>

    Difficulté :
<select name="difficulte" id="difficulte">
    <option value="tout">tout</option>
    <?php if ($result_difficulte->num_rows > 0) : ?>
        <?php while ($row = $result_difficulte->fetch_assoc()) : ?>
            <option value="<?= $row['difficulte'] ?>" <?= isset($_GET['difficulte']) && $_GET['difficulte'] === $row['difficulte'] ? 'selected' : ''?> ><?= $row['difficulte'] ?></option>
        <?php endwhile ?>
    <?php else : ?>
        <option value="">--Sélectionner une difficulté--</option>
    <?php endif ?>
</select>
        <button>Filtrer</button>
</form>

<?php
$id_categorie = isset($_GET['id_categorie']) ? $_GET['id_categorie'] : 'tout';
$difficulte = isset($_GET['difficulte']) ? $_GET['difficulte'] : 'tout';

if($id_categorie != 'tout' && $difficulte != 'tout'){
    $where="WHERE q.id_categorie = $id_categorie AND q.difficulte = $difficulte";
}elseif($id_categorie != 'tout' && $difficulte == 'tout'){
    $where="WHERE q.id_categorie = $id_categorie";
}elseif($id_categorie == 'tout' && $difficulte != 'tout'){
    $where="WHERE q.difficulte = $difficulte";
}else{
    $where="";
}

$sql = "SELECT q.id_question, q.question, q.options, q.correctAnswer, q.difficulte, c.id_categorie, c.nom
FROM question q
INNER JOIN categorie c ON c.id_categorie = q.id_categorie
$where 
ORDER BY c.id_categorie, q.id_question ASC";
$result = $conn->query($sql);
?>

<?php if ($result->num_rows > 0) : ?>
    <table>
        <thead>
            <tr>
                <th>Questions</th>
                <th>Difficulté</th>
                <th>Catégorie</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $row['question'] ?></td>
                        <td><?= $row['difficulte'] ?></td>
                        <td><?= $row['nom'] ?></td>
                        <td><a href="question_form_update.php?id_question=<?= $row['id_question'] ?>">Modifier</a></td>
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