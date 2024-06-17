<?php ob_start();
require_once '../config.php';
?>
Catégorie

<?php
$title = "Titre de la page";
$content = ob_get_clean();
include '../layout/layout.php';