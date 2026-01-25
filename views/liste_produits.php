<?php require_once ("../MODELS/db.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Gestion des Produits</h2>
            <a href="dashboard.php" class="btn btn-secondary">Retour Dashboard</a>
        </div>
        <a href="ajout_produit.php" class="btn btn-success mb-3">+ Ajouter un produit</a>
        
        <table class="table table-bordered table-striped bg-white shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>PRIX</th>
                    <th>STOCK</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once("../MODELS/db.php");
                $conn = openConnexion();
                if($conn){
                    $sql = "SELECT * FROM produits";
                    $stm = $conn->query($sql);
                    $produits = $stm->fetchAll();
                    foreach ($produits as $p) {
                ?>
                <tr>
                    <td><?php echo $p["id"] ?></td>
                    <td><?php echo $p["name"] ?></td>
                    <td><?php echo $p["prix"] ?> FCFA</td>
                    <td><?php echo $p["quantite"] ?></td>
                    <td>
                        <a href="../controllers/traitement_produit.php?idcs=<?php echo $p["id"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce produit ?')">Supprimer</a>
                        <a href="modifier_produit.php?idc=<?php echo $p["id"]; ?>" class="btn btn-warning btn-sm">Modifier</a>  
                    </td>
                </tr>       
                <?php } } ?>
            </tbody>
        </table>
    </div>
</body>
</html>