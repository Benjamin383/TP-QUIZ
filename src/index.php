<?php ob_start(); ?>
<?php
require_once 'config.php';



?>
test
<?php foreach ($quizs as $quiz): ?>
        <label>
            <input type="text" name="quiz[]" value="<?= $quiz['id_quiz'] ?>">
            <?= $quiz['titre'] ?>
        </label><br>
    <?php endforeach; ?>


<?php
$title = "Accueil";
$content = ob_get_clean();
include 'layout/layout.php';