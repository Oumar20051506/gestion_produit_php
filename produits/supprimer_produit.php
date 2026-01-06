<?php
require_once "../config/database.php";
require_once "../config/auth.php";
securiser();

$db = new Database();
$conn = $db->connexion();

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM produits WHERE id=?");
$stmt->execute([$id]);

header("Location: liste.php");