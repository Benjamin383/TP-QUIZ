// Supprimer les rôles actuels de l'utilisateur
<?php

require_once '../config.php';

$id_quiz = $_GET['id_quiz'];

$sql_delete_quiz = "DELETE FROM quiz WHERE id_quiz=?";
$stmt_delete = $conn->prepare($sql_delete_quiz);
    if ($stmt_delete) {
         $stmt_delete->bind_param("i", $id_quiz);
         if ($stmt_delete->execute()) {
        header('location:/index.php');
    } else {
        echo "Erreur : " . $sql_delete_quiz . "<br>" . $stmt_delete_quiz->error;
    }
     } else {
    echo "Erreur lors de la préparation de la requête : " . $conn->error;
}