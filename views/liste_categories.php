<?php require_once ("../models/db.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Catégories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Gestion des Catégories</h2>
            <a href="dashboard.php" class="btn btn-secondary">Retour</a>
        </div>

        <a href="ajout_categorie.php" class="btn btn-primary mb-3">+ Ajouter une catégorie</a>
        
        <table class="table table-bordered bg-white shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>DESCRIPTION</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 require_once("../MODELS/db.php");
                $conn = openConnexion();
                if($conn){
                    $sql = "SELECT * FROM categories";
                    $stm = $conn->query($sql);
                    while($c = $stm->fetch()){
                ?>
                <tr>
                    <td><?php echo $c["id"] ?></td>
                    <td><?php echo $c["name"] ?></td>
                    <td><?php echo $c["description"] ?></td>
                    <td>
                        <a href="modifier_categorie.php?idc=<?php echo $c['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                        
                        <a href="../controllers/traitement_categorie.php?idcs=<?php echo $c['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">Supprimer</a>
                    </td>
                </tr>       
                <?php } } ?>
            </tbody>
        </table>
    </div>
</body>
</html>