<?php ob_start();
require_once '../config.php';

$sql = "SELECT id_categorie, nom
FROM categorie
ORDER BY id_categorie ASC";
$result = $conn->query($sql);

?>
<h1>Ajouter une question</h1>
<a href="../categorie/categorie_form_add.php">Ajouter une catégorie</a>

<form class="form" action="question_add.php" method="POST">

    <label for="categorie">Catégorie :</label>
    <select name="id_categorie" id="id_categorie">
        <?php if ($result->num_rows > 0) : ?>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <option value="<?= $row['id_categorie'] ?>"><?= $row['nom'] ?></option>
            <?php endwhile ?>
        <?php else : ?>
            <option value="">--Sélectionner une catégorie--</option>
        <?php endif ?>
    </select><br>
    <input type="text" id="question" name="question" placeholder="Ecrivez votre question ici..." /><br>
    <table>
        <thead>
            <tr>
                <th>Les choix possibles</th>
                <th>La réponse</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>
                    <input type="text" id="reponse_une" name="reponse_une" placeholder="Réponse 1" />
                </th>
                <th><input type="radio" name="correctAnswer" value="1" checked /></th>
            </tr>
            <tr>
                <th><input type="text" id="reponse_deux" name="reponse_deux" placeholder="Réponse 2" /></th>
                <th><input type="radio" name="correctAnswer" value="2" /></th>
            </tr>
            <tr>
                <th><input type="text" id="reponse_trois" name="reponse_trois" placeholder="Réponse 3" /></th>
                <th><input type="radio" name="correctAnswer" value="3" /></th>
            </tr>
            <tr>
                <th><input type="text" id="reponse_quatre" name="reponse_quatre" placeholder="Réponse 4" /></th>
                <th><input type="radio" name="correctAnswer" value="4" /></th>
            </tr>
        </tbody>
    </table>
    Difficulté<br>
    <input type="radio" id="difficulte_un" name="difficulte" value="1" checked /><label for="difficulte_un">1</label>
    <input type="radio" id="difficulte_deux" name="difficulte" value="2" checked /><label for="difficulte_deux">2</label>
    <input type="radio" id="difficulte_trois" name="difficulte" value="3" checked /><label for="difficulte_trois">3</label>
    <input type="radio" id="difficulte_quatre" name="difficulte" value="4" checked /><label for="difficulte_quatre">4</label>
    <input type="radio" id="difficulte_cinq" name="difficulte" value="5" checked /><label for="difficulte_cinq">5</label><br>
    <input type="submit" value="Enregistrer" />
</form>
<?php
$title = "Ajouter une question";
$content = ob_get_clean();
include '../layout/layout.php';
