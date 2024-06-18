// Supprimer une question
<?php

require_once '../config.php';

$id_question = $_GET['id_question'];

$sql_delete_quiz_question = "DELETE FROM quiz_question WHERE id_question=?";
$sql_delete_question = "DELETE FROM question WHERE id_question=?";

$stmt_delete_quiz_question = $conn->prepare($sql_delete_quiz_question);
    if ($stmt_delete_quiz_question) {
         $stmt_delete_quiz_question->bind_param("i", $id_question);
         if ($stmt_delete_quiz_question->execute()) {
      //  header('location:/index.php');
    } else {
        echo "Erreur : " . $sql_delete_quiz_question . "<br>" . $stmt_delete_quiz_question->error;
    }
     } else {
    echo "Erreur lors de la préparation de la requête : " . $conn->error;
}

$stmt_delete_question = $conn->prepare($sql_delete_question);
    if ($stmt_delete_question) {
         $stmt_delete_question->bind_param("i", $id_question);
         if ($stmt_delete_question->execute()) {
        header('location:/question/question_list.php');
    } else {
        echo "Erreur : " . $sql_delete_question . "<br>" . $stmt_delete_question->error;
    }
     } else {
    echo "Erreur lors de la préparation de la requête : " . $conn->error;
}