<?php ob_start();
require_once '../config.php';

$sql = "SELECT id_categorie, nom
FROM categorie
ORDER BY id_categorie ASC";
$result = $conn->query($sql);

?>
<div class="container">
<form class="form" action="categorie_add.php" method="POST">
    <h1 class="text-center">Ajouter une catégorie</h1>
    <label class="form-label" for="nom">Nom :</label>
    <input class="form-control col-md-6" type="text" name="nom" id="nom" placeholder="Nom de la catégorie...">
    <button type="submit" class="btn btn-primary my-2">Ajouter</button>
</form>
</div>

<?php if ($result->num_rows > 0) : ?>
    <div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Toutes les catégories</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $row['nom'] ?></td>
                        <td ><a href="categorie_delete.php?id_categorie=<?= $row['id_categorie'] ?>"><!--🗑️--><button type="button" class="btn btn-danger">Supprimer</button></a></td>
                    </tr>
            <?php endwhile ?>
        </tbody>
    </table>
    </div>
<?php else: ?>
    <p>Pas de résultats</p>
<?php endif ?>

<?php
$title = "Ajouter une catégorie";
$content = ob_get_clean();
include '../layout/layout.php';