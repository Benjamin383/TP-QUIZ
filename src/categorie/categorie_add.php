<?php
require_once '../config.php';

if($_SERVER["REQUEST_METHOD"] === 'POST'){
    $nom = $_POST['nom'];

    $sql = "INSERT INTO categorie (nom) VALUES(?)";
    $stmt = $conn->prepare($sql);
    if($stmt){
        $stmt->bind_param("s", $nom);
        if($stmt->execute()){
            header('location:'. $_SERVER['HTTP_REFERER']);
        }else{
            echo "Erreur : ". $sql . "<br>" . $conn->error;
        }
    }
}