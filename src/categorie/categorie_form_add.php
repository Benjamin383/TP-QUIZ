<?php ob_start();
require_once '../config.php';


?>
<form class="form" action="categorie_add.php" method="POST">
    <h1>Ajouter une catégorie</h1>
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom">
    <button>Ajouter</button>
</form>

<?php
$title = "Ajouter une catégorie";
$content = ob_get_clean();
include '../layout/layout.php';