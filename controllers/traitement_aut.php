<?php
session_start();
require_once("../MODELS/db.php");

if(isset($_POST["sinscrire"])){
    $user = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $conn = openConnexion();
    if($conn){
        $sql = "INSERT INTO utilisateur (username, email, password) VALUES (?,?,?)";
        $stm = $conn->prepare($sql);
        $stm->execute([$user, $email, $pass]);
      header("location:../views/connexion.php");
    }
}
if(isset($_POST["se_connecter"])){
    $email = htmlspecialchars($_POST["email"]);
    $pass = $_POST["password"];
    $conn = openConnexion();
    if($conn){
        $sql = "SELECT * FROM utilisateur WHERE email = ?";
        $stm = $conn->prepare($sql);
        $stm->execute([$email]);
        $row = $stm->fetch();
        if($row && password_verify($pass, $row['password'])){
            $_SESSION['user_name'] = $row['username'];
            header("location:../views/dashboard.php");
        } else {
            header("location:../views/connexion.php?erreur=1");
        }
    }
}
?>