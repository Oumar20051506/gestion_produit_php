<?php
function openConnexion(){
    $pdo=null;
    try {
        $user = "root";
        $pass = "";
        $serveur = "localhost";
        $bd = "gestion_produit"; 
        $pdo = new PDO("mysql:host=$serveur;dbname=$bd;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
        return $pdo;
    } catch (\Throwable $th) {
        return false;
    }
}
?>