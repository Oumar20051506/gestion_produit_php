<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Boutique - Accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark mb-4 px-4">
        <a class="navbar-brand" href="index.php">GESTION PRODUIT</a>
        <div>
            <a href="views/connexion.php" class="btn btn-outline-light me-2">Connexion</a>
            <a href="views/inscription.php" class="btn btn-primary">S'inscrire</a>
        </div>
    </nav>
    <div class="container">
        <h2 class="mb-4 text-center">Nos Produits</h2>
        <div class="row">
            <?php
            require_once("../MODELS/db.php");
            $conn = openConnexion();
            if($conn){
                $sql = "SELECT p.*, c.name as cat_name FROM produits p LEFT JOIN categories c ON p.categorie_id = c.id";
                $stm = $conn->query($sql);
                while($p = $stm->fetch()){
            ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <span class="badge bg-secondary"><?php echo $p['cat_name']; ?></span>
                        <h5 class="card-title mt-2"><?php echo $p['name']; ?></h5>
                        <p class="text-muted small"><?php echo $p['description']; ?></p>
                        <h4 class="text-primary"><?php echo $p['prix']; ?> FCFA</h4>
                        <p class="card-text">Stock: <?php echo $p['quantite']; ?></p>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
</body>
</html>