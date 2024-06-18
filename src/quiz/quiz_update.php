<?php

require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_quiz = $_POST['id_quiz'];
    $titre = $_POST['titre'];
    $questions = $_POST['questions'];


var_dump($questions);
    // Mettre à jour les informations de l'utilisateur
    $sql = "UPDATE quiz SET titre=? WHERE id_quiz=?";
    $sql_question = "INSERT INTO quiz_question (id_quiz, id_question) VALUES (?,?)";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("si", $titre, $id_quiz);
        if ($stmt->execute()) {
            // header('location:/index.php');
        } else {
            echo "Erreur : " . $sql . "<br>" . $stmt->error;
        }
    } else {
        echo "Erreur lors de la préparation de la requête : " . $conn->error;
    }

    $stmt_question = $conn->prepare($sql_question);
    if ($stmt_question) {

        foreach($questions as $id_question){
            $stmt_question->bind_param("ii", $id_quiz, $id_question);
            if ($stmt_question->execute()) {
               
             } else {
                 echo "Erreur : " . $sql . "<br>" . $stmt_question->error;
             }
        }
        header('location:/index.php');
    } else {
        echo "Erreur lors de la préparation de la requête : " . $conn->error;
    }
}