<?php
require_once "../config/auth.php";
securiser();

if (!estAdmin()) {
    die("Accès interdit");
}
?>

<h1>Dashboard Admin</h1>
<ul>
    <li><a href="utilisateurs.php">Utilisateurs</a></li>
    <li><a href="../produits/liste.php">Produits</a></li>
    <li><a href="../categories/liste.php">Catégories</a></li>
</ul>