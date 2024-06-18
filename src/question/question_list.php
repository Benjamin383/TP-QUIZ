<?php ob_start();
require_once '../config.php';

$sql = "SELECT id_categorie, nom
FROM categorie
ORDER BY id_categorie ASC";
$result = $conn->query($sql);
?>


<?php
$title = "Liste des questions";
$content = ob_get_clean();
include '../layout/layout.php';