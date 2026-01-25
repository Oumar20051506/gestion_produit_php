<?php
require_once("../MODELS/db.php");
$id = $_GET['idc']; 
$conn = openConnexion();
$p = null;
if($conn){
    $stm = $conn->prepare("SELECT * FROM produits WHERE id = ?");
    $stm->execute([$id]);
    $p = $stm->fetch();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-5">
    <div class="card mx-auto shadow" style="max-width: 500px;">
        <div class="card-header bg-warning"><h1>MODIFIER PRODUIT</h1></div>
        <div class="card-body">
            <form action="traitement_produit.php" method="post">
                <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
                
                <label>Nom</label>
                <input type="text" name="name" class="form-control" value="<?php echo $p['name']; ?>" required><br>
                
                <label>Prix</label>
                <input type="number" name="prix" class="form-control" value="<?php echo $p['prix']; ?>" required><br>
                
                <label>Quantité</label>
                <input type="number" name="quantite" class="form-control" value="<?php echo $p['quantite']; ?>" required><br>

                <button type="submit" name="modifier" class="btn btn-warning w-100">VALIDER LA MODIFICATION</button>
            </form>
        </div>
    </div>
</body>
</html>