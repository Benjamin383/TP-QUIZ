<?php ob_start();
require_once '../config.php';
?>
question
<a href="../categorie/categorie_form_add.php">Ajoute une catégorie</a>

<?php
$title = "Titre de la page";
$content = ob_get_clean();
include '../layout/layout.php';