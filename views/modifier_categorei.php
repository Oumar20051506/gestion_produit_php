<?php
require_once("../MODELS/db.php");
$id = $_GET['idc'];
$conn = openConnexion();
$c = null;
if($conn){
    $stm = $conn->prepare("SELECT * FROM categories WHERE id = ?");
    $stm->execute([$id]);
    $c = $stm->fetch();
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
        <div class="card-header bg-success text-white"><h1>MODIFIER CATÉGORIE</h1></div>
        <div class="card-body">
            <form action="traitement_categorie.php" method="post">
                <input type="hidden" name="id" value="<?php echo $c['id']; ?>">
                
                <label>Nom</label>
                <input type="text" name="name" class="form-control" value="<?php echo $c['name']; ?>" required><br>
                
                <label>Description</label>
                <textarea name="description" class="form-control"><?php echo $c['description']; ?></textarea><br>

                <button type="submit" name="modifier_cat" class="btn btn-success w-100">Enregistrer les modifications</button>
            </form>
        </div>
    </div>
</body>
</html>