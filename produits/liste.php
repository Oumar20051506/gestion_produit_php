<?php
require_once "../config/database.php";
require_once "../config/auth.php";
securiser();

$db = new Database();
$conn = $db->connexion();

$req = $conn->query("SELECT * FROM produits");
?>
<link rel="stylesheet" href="../assets/css/style.css">
<h2>Liste des produits</h2>
<a href="ajouter.php">Ajouter produit</a>

<table border="1">
<tr>
    <th>Nom</th>
    <th>Prix</th>
    <th>Quantité</th>
    <th>Actions</th>
</tr>

<?php while($p = $req->fetch()): ?>
<tr>
    <td><?= htmlspecialchars($p['name']) ?></td>
    <td><?= $p['prix'] ?></td>
    <td><?= $p['quantite'] ?></td>
    <td>
        <a href="modifier.php?id=<?= $p['id'] ?>">Modifier</a>
        <a href="supprimer_produit.php?id=<?= $p['id'] ?>">Supprimer</a>
    </td>
</tr>
<?php endwhile; ?>
</table>