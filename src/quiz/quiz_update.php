<?php

require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_quiz = $_POST['id_quiz'];
    $titre = $_POST['titre'];
    

    // Mettre à jour les informations de l'utilisateur
    $sql = "UPDATE quiz SET titre=? WHERE id_quiz=?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("si", $titre, $id_quiz);
        if ($stmt->execute()) {
            header('location:/index.php');
        } else {
            echo "Erreur : " . $sql . "<br>" . $stmt->error;
        }
    } else {
        echo "Erreur lors de la préparation de la requête : " . $conn->error;
    }
}