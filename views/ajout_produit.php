<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Produit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card mx-auto shadow" style="max-width: 500px;">
            <div class="card-header bg-primary text-white"><h1>PRODUIT</h1></div>
            <div class="card-body">
                <form action="../controllers/traitement_produit.php" method="post">
                    <label class="form-label">ID</label>
                    <input type="number" name="id" class="form-control" required><br>
                    
                    <label class="form-label">NOM DU PRODUIT</label>
                    <input type="text" name="name" class="form-control" required><br>
                    
                    <label class="form-label">DESCRIPTION</label>
                    <textarea name="description" class="form-control"></textarea><br>

                    <label class="form-label">PRIX</label>
                    <input type="number"  class="form-control" required><br>

                    <label class="form-label">QUANTITÉ</label>
                    <input type="number" name="quantite" class="form-control" required><br>

                    <button type="submit" name="ajouter" class="btn btn-primary w-100">ENREGISTRER</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>