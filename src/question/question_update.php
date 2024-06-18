<?php

require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_question = $_POST['id_question'];
    $question = $_POST['question'];
    $options = $_POST['options'];
    $difficulte = $_POST['difficulte'];
    $id_categorie = $_POST['id_categorie'];

    // Mettre à jour les informations de la question
    $sql = "UPDATE question SET question=?, options=?, difficulte=?, id_categorie=? WHERE id_question=?";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssiii", $question, $options, $difficulte, $id_categorie, $id_question);
        if ($stmt->execute()) {
             header('location:/question/question_list.php');
        } else {
            echo "Erreur : " . $sql . "<br>" . $stmt->error;
        }
    } else {
        echo "Erreur lors de la préparation de la requête : " . $conn->error;
    }
}