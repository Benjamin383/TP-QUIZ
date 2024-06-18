<?php ob_start();
require_once '../config.php';


$sql = "SELECT id_categorie, nom
FROM categorie
ORDER BY id_categorie ASC";
$result = $conn->query($sql);


?>
<form class="form" action="categorie_add.php" method="POST">
    <h1>Ajouter une catégorie</h1>
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom">
    <button>Ajouter</button>
</form>

<?php if ($result->num_rows > 0) : ?>
    <table>
        <thead>
            <tr>
                <th>Toutes les catégories</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $row['nom'] ?></td>
                        <td ><a href="categorie_delete.php?id_categorie=<?= $row['id_categorie'] ?>">🗑️</a></td>
                    </tr>
            <?php endwhile ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Pas de résultats</p>
<?php endif ?>

<?php
$title = "Ajouter une catégorie";
$content = ob_get_clean();
include '../layout/layout.php';