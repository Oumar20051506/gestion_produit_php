<?php
require_once "../config/database.php";
require_once "../config/auth.php";
securiser();

if (!estAdmin()) {
    die("Accès refusé");
}

$db = new Database();
$conn = $db->connexion();

$users = $conn->query("SELECT id, username, email, role FROM utilisateurs");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 30px auto;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            color: red;
            text-decoration: none;
        }
    </style>
</head>
<body>
<link rel="stylesheet" href="../assets/css/style.css">
<h2 style="text-align:center;">Liste des utilisateurs</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Rôle</th>
        <th>Action</th>
    </tr>

    <?php while ($u = $users->fetch(PDO::FETCH_ASSOC)) : ?>
    <tr>
        <td><?= $u['id'] ?></td>
        <td><?= htmlspecialchars($u['username']) ?></td>
        <td><?= htmlspecialchars($u['email']) ?></td>
        <td><?= $u['role'] ?></td>
        <td>
            <?php if ($u['role'] !== 'admin'): ?>
                <a href="supprimer_user.php?id=<?= $u['id'] ?>"
                   onclick="return confirm('Supprimer cet utilisateur ?');">
                   Supprimer
                </a>
            <?php else: ?>
                —
            <?php endif; ?>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<p style="text-align:center;">
    <a href="dashboard.php">⬅ Retour au dashboard</a>
</p>

</body>
</html>