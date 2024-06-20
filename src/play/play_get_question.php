<?php
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_quiz = $_POST['id_quiz'];
    $sql_question = "SELECT q.question, q.options, q.correctAnswer 
    FROM question q
    INNER JOIN quiz_question qq ON qq.id_question = q.id_question
    WHERE qq.id_quiz = $id_quiz
    ORDER BY qq.id_question";

    $result = $conn->query($sql_question);
    $questions = $result->fetch_all(MYSQLI_ASSOC);
    header("Content-Type: application/json");
    echo json_encode($questions);
}