<?php ob_start(); ?>
<?php
require_once 'config.php';



?>

<?php
$title = "Titre de la page";
$content = ob_get_clean();
include 'layout.php';