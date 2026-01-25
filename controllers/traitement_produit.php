<?php
require_once("../MODELS/db.php");

if(isset($_POST["ajouter"])){
    $id = htmlspecialchars($_POST["id"]);
    $name = htmlspecialchars($_POST["name"]);
    $description = htmlspecialchars($_POST["description"]);
    $prix = htmlspecialchars($_POST["prix"]);
    $quantite = htmlspecialchars($_POST["quantite"]);

    $conn = openConnexion();
    if($conn){
        $sql = "INSERT INTO produits (id, name, description, prix, quantite) VALUES (?,?,?,?,?)";
        $stm = $conn->prepare($sql);
        $stm->execute([$id, $name, $description, $prix, $quantite]);
        header("location:../views/liste_produits.php");
    }
}

if(isset($_GET["idcs"])){
    $id = $_GET["idcs"];
    $conn = openConnexion();
    if($conn){
        $sql = "DELETE FROM produits WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute([$id]);
        header("location:../views/liste_produits.php");
    }
}
if(isset($_POST["modifier"])){
    $id = $_POST["id"]; 
    $name = htmlspecialchars($_POST["name"]);
    $prix = htmlspecialchars($_POST["prix"]);
    $quantite = htmlspecialchars($_POST["quantite"]);

    $conn = openConnexion();
    if($conn){
        $sql = "UPDATE produits SET name=?, prix=?, quantite=? WHERE id=?";
        $stm = $conn->prepare($sql);
        $stm->execute([$name, $prix, $quantite, $id]);
        header("location:../views/liste_produits.php");
    }
}
?>