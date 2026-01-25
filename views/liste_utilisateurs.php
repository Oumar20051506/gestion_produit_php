<?php require_once("../MODELS/db.php"); ?>
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
            <h2>Utilisateurs du Système</h2>
            <a href="dashboard.php" class="btn btn-secondary">Retour Dashboard</a>
        </div>
        
        <table class="table table-bordered table-striped bg-white">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>NOM D'UTILISATEUR</th>
                    <th>EMAIL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once("../MODELS/db.php");
                $conn = openConnexion();
                if($conn){
                    $sql = "SELECT id, username, email FROM utilisateur";
                    $stm = $conn->query($sql);
                    while($u = $stm->fetch()){
                        ?>
                        <tr>
                            <td><?php echo $u["id"] ?></td>
                            <td><?php echo $u["username"] ?></td>
                            <td><?php echo $u["email"] ?></td>
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