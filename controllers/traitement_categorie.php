<?php
require_once("../MODELS/db.php");

if(isset($_POST["ajouter_cat"])){
    $id = $_POST["id"];
    $name = htmlspecialchars($_POST["name"]);
    $desc = htmlspecialchars($_POST["description"]);

    $conn = openConnexion();
    if($conn){
        $sql = "INSERT INTO categories (id, name, description) VALUES (?,?,?)";
        $stm = $conn->prepare($sql);
        $stm->execute([$id, $name, $desc]);
        header("location:../views/liste_categories.php");
    }
}

if(isset($_POST["modifier_cat"])){
    $id = $_POST["id"];
    $name = htmlspecialchars($_POST["name"]);
    $desc = htmlspecialchars($_POST["description"]);

    $conn = openConnexion();
    if($conn){
        $sql = "UPDATE categories SET name=?, description=? WHERE id=?";
        $stm = $conn->prepare($sql);
        $stm->execute([$name, $desc, $id]);
        header("location:../views/liste_categories.php");
    }
}
if(isset($_GET["idcs"])){
    $id = $_GET["idcs"];
    $conn = openConnexion();
    if($conn){
        $sql = "DELETE FROM categories WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute([$id]);
        header("location:../views/liste_categories.php");
    }
}
?>