<?php
require_once '../config.php';

if($_SERVER["REQUEST_METHOD"] === 'POST'){
    if($_POST['id_categorie']!= 'tout' && $_POST['difficulte'] != 'tout'){
        header("location:/question/question_list.php?id_categorie=".$_POST['id_categorie']."&difficulte=".$_POST['difficulte']);
    }elseif($_POST['id_categorie'] != 'tout' && $_POST['difficulte'] == 'tout'){
        header("location:/question/question_list.php?id_categorie=".$_POST['id_categorie']);
    }elseif($_POST['id_categorie'] == 'tout' && $_POST['difficulte'] != 'tout'){
        header("location:/question/question_list.php?difficulte=".$_POST['difficulte']);
    }else{
        header("location:/question/question_list.php");
    }
}
