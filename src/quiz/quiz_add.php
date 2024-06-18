<?php

require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];

    // Insérer un titre de quiz
    $sql = "INSERT INTO quiz (titre) VALUES (?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $titre);
        if ($stmt->execute()) {
            $id_quiz = $stmt->insert_id;
            }

            header('location:/index.php');
        } else {
            echo "Erreur : " . $sql . "<br>" . $stmt->error;
        }
    } else {
        echo "Erreur lors de la préparation de la requête : " . $conn->error;
    }
// }