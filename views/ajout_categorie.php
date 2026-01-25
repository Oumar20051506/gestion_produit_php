<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-5">
    <div class="card mx-auto shadow" style="max-width: 500px;">
        <div class="card-header bg-primary text-white"><h1>NOUVELLE CATÉGORIE</h1></div>
        <div class="card-body">
            <form action="../controllers/traitement_categorie.php" method="post">
                <label>ID</label>
                <input type="number" name="id" class="form-control" required><br>
                
                <label>Nom de la catégorie</label>
                <input type="text" name="name" class="form-control" required><br>
                
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea><br>

                <button type="submit" name="ajouter_cat" class="btn btn-primary w-100">ENREGISTRER</button>
            </form>
        </div>
    </div>
</body>
</html>