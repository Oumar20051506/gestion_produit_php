<?php
require_once "../includes/header.php";
require_once "../config/database.php";

if (!isset($_SESSION['user'])) {
    header("Location: ../auth/connexion.php");
    exit();
}

$stmt = $pdo->query("SELECT * FROM categories ORDER BY id DESC");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Liste des catégories</h1>

<p>
    <a href="ajouter.php"> Ajouter une catégorie</a>
</p>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php if (count($categories) > 0): ?>
            <?php foreach ($categories as $c): ?>
                <tr>
                    <td><?= $c['id'] ?></td>
                    <td><?= htmlspecialchars($c['name']) ?></td>
                    <td><?= htmlspecialchars($c['description']) ?></td>
                    <td>
                        <a href="modifier.php?id=<?= $c['id'] ?>">✏️ Modifier</a> |
                        <a href="supprimercat.php?id=<?= $c['id'] ?>"
                           onclick="return confirm('Supprimer cette catégorie ?');">
                           🗑 Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Aucune catégorie enregistrée</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once "../includes/footer.php"; ?>