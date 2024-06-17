<?php
require_once '../config.php';

$id_categorie= $_GET['id_categorie'];

$sql = "DELETE FROM categorie WHERE id_categorie=$id_categorie";
$result = $conn->query($sql);

if($result){
    header('location:/categorie/categorie_form_add.php');
}else{
    echo "Erreur : ". $sql . "<br>" . $conn->error;
}