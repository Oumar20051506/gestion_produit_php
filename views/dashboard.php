<?php
session_start();
require_once("../MODELS/db.php");
$conn = openConnexion();

$res1 = $conn->query("SELECT COUNT(*) FROM produits")->fetchColumn();
$res2 = $conn->query("SELECT COUNT(*) FROM categories")->fetchColumn();
$res3 = $conn->query("SELECT COUNT(*) FROM utilisateur")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1>Bienvenue, <?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'TEST'; ?></h1>
        
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card bg-primary text-white p-4 text-center shadow-sm">
                    <h3>Produits</h3>
                    <h1><?php echo $res1; ?></h1>
                    <a href="liste_produits.php" class="btn btn-light btn-sm">Gérer</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-success text-white p-4 text-center shadow-sm">
                    <h3>Catégories</h3>
                    <h1><?php echo $res2; ?></h1>
                    <a href="liste_categories.php" class="btn btn-light btn-sm">Gérer</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-warning text-dark p-4 text-center shadow-sm">
                    <h3>Utilisateurs</h3>
                    <h1><?php echo $res3; ?></h1>
                    <a href="liste_utilisateurs.php" class="btn btn-dark btn-sm">Gérer les utilisateurs</a>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="index.php" class="btn btn-secondary">Retour au Catalogue</a>
            <a href="../controllers/deconnexion.php" class="btn btn-danger">Déconnexion</a>
        </div>
    </div>
</body>
</html>