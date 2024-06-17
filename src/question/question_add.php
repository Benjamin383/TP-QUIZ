<?php
require_once '../config.php';

if($_SERVER["REQUEST_METHOD"] === 'POST'){
    $id_categorie = $_POST['id_categorie'];
    $question = $_POST['question'];
    $reponse_une = $_POST['reponse_une'];
    $reponse_deux = $_POST['reponse_deux'];
    $reponse_trois = $_POST['reponse_trois'];
    $reponse_quatre = $_POST['reponse_quatre'];
    $correctAnswer = $_POST['correctAnswer'];

    $options = "[\"$reponse_une\",\"$reponse_deux\",\"$reponse_trois\",\"$reponse_quatre\"]";
    //$sql = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
    $sql = "INSERT INTO question (question, options, correctAnswer) VALUES(?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if($stmt){
        $stmt->bind_param("ssi", $question, $options, $correctAnswer);
            //if($conn->query($sql) === true){
        if($stmt->execute()){
            // echo "Nouvel utilisateur créé avec succès.";
            header('location:/question/question_form_add.php');
        }else{
            echo "Erreur : ". $sql . "<br>" . $conn->error;
        }
    }
}