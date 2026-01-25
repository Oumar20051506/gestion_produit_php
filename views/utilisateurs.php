<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Utilisateurs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-4">
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h2>Gestion des Utilisateurs</h2>
            <a href="dashboard.php" class="btn btn-secondary">Retour Dashboard</a>
        </div>
        
        <table class="table table-bordered table-striped bg-white shadow-sm">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>NOM D'UTILISATEUR</th>
                    <th>EMAIL</th>
                    <th>RÔLE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once("db.php");
                $conn = openConnexion();
                if($conn){
                    $sql = "SELECT id, username, email, role FROM utilisateur";
                    $stm = $conn->query($sql);
                    while($u = $stm->fetch()){
                        $badge = ($u['role'] == 'admin') ? 'bg-danger' : 'bg-primary';
                        ?>
                        <tr class="text-center">
                            <td><?php echo $u["id"] ?></td>
                            <td><?php echo $u["username"] ?></td>
                            <td><?php echo $u["email"] ?></td>
                            <td><span class="badge <?php echo $badge; ?>"><?php echo $u["role"] ?></span></td>
                        </tr>       
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>