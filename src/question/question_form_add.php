<?php ob_start();
require_once '../config.php';

$sql = "SELECT id_categorie, nom
FROM categorie
ORDER BY id_categorie ASC";
$result = $conn->query($sql);

?>

<h1 class="text-center">Ajouter une question</h1>
<!-- <a href="../categorie/categorie_form_add.php">Ajouter une catégorie</a> -->
<div class="container">
<form class="form" action="question_add.php" method="POST">

    <div class="col-md-4">
    <label class="form-label" for="categorie">Catégorie :</label>
    <select name="id_categorie" id="id_categorie" class="form-select form-select-lg mb-3">
        <option selected>Sélectionner une catégorie</option>
        <?php if ($result->num_rows > 0) : ?>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <option value="<?= $row['id_categorie'] ?>"><?= $row['nom'] ?></option>
            <?php endwhile ?>
        <?php else : ?>
            <option value="">--Sélectionner une catégorie--</option>
        <?php endif ?>
    </select><br>
    </div>

<div class="col-md-6">
    <label class="form-label" for="question">Question :</label>
    <input class="form-control" type="text" id="question" name="question" placeholder="Ecrivez votre question ici..." /><br>
</div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Les choix possibles</th>
                <th scope="col">La réponse</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><input class="form-control" type="text" id="reponse_une" name="reponse_une" placeholder="Réponse 1..." /></th>
                <th><input class="form-check-input" type="radio" name="correctAnswer" value="1" checked /></th>
            </tr>
            <tr>
                <th><input class="form-control" type="text" id="reponse_deux" name="reponse_deux" placeholder="Réponse 2..." /></th>
                <th><input class="form-check-input" type="radio" name="correctAnswer" value="2" /></th>
            </tr>
            <tr>
                <th><input class="form-control" type="text" id="reponse_trois" name="reponse_trois" placeholder="Réponse 3..." /></th>
                <th><input class="form-check-input" type="radio" name="correctAnswer" value="3" /></th>
            </tr>
            <tr>
                <th><input class="form-control" type="text" id="reponse_quatre" name="reponse_quatre" placeholder="Réponse 4..." /></th>
                <th><input class="form-check-input" type="radio" name="correctAnswer" value="4" /></th>
            </tr>
        </tbody>
    </table>

    <label class="form-label" for="difficulte">Difficulté :</label><br>
    <input class="form-check-input" type="radio" id="difficulte_un" name="difficulte" value="1" checked /><label class="form-check-label" for="difficulte_un">1</label>
    <input class="form-check-input" type="radio" id="difficulte_deux" name="difficulte" value="2" checked /><label class="form-check-label" for="difficulte_deux">2</label>
    <input class="form-check-input" type="radio" id="difficulte_trois" name="difficulte" value="3" checked /><label class="form-check-label" for="difficulte_trois">3</label>
    <input class="form-check-input" type="radio" id="difficulte_quatre" name="difficulte" value="4" checked /><label class="form-check-label" for="difficulte_quatre">4</label>
    <input class="form-check-input" type="radio" id="difficulte_cinq" name="difficulte" value="5" checked /><label class="form-check-label" for="difficulte_cinq">5</label><br>
    
    <div class="col-12 my-2">
    <input type="submit" value="Enregistrer" class="btn btn-primary" />
    </div>

</form>
</div>

<?php
$title = "Ajouter une question";
$content = ob_get_clean();
include '../layout/layout.php';
