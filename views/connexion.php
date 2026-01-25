<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light d-flex align-items-center" style="height: 100vh;">
    <div class="container">
        <div class="card mx-auto shadow-sm" style="max-width: 400px;">
            <div class="card-header bg-primary text-white text-center"><h1>CONNEXION</h1></div>
            <div class="card-body">
                <form action="../controllers/traitement_aut.php" method="post">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required><br>
                    <label class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control" required><br>
                    <button type="submit" name="se_connecter" class="btn btn-primary w-100">Se connecter</button>
                </form>
                <div class="mt-3 text-center">
                    Pas de compte ? <a href="inscription.php">S'inscrire</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>