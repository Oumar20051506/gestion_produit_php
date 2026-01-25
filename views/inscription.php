<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card mx-auto shadow" style="max-width: 400px;">
            <div class="card-header bg-success text-white"><h1>INSCRIPTION</h1></div>
            <div class="card-body">
                <form action="../controllers/traitement_aut.php" method="post">
                    <label>NOM D'UTILISATEUR</label>
                    <input type="text" name="username" class="form-control" required><br>
                    <label>EMAIL</label>
                    <input type="email" name="email" class="form-control" required><br>
                    <label>MOT DE PASSE</label>
                    <input type="password" name="password" class="form-control" required><br>
                    <button type="submit" name="sinscrire" class="btn btn-success w-100">S'INSCRIRE</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>