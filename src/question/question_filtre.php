<?php
require_once '../config.php';

if($_SERVER["REQUEST_METHOD"] === 'POST'){
    $id_categorie = $_POST['id_categorie'] === 'tout'?"" : "id_categorie=".$_POST['id_categorie'];
    $difficulte = $_POST['difficulte'] === 'tout'?"" : "difficulte=".$_POST['difficulte'];
}

    header("location:/question/question_list.php?$id_categorie&$difficulte");