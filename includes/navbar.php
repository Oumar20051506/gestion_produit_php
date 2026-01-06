<hr>
<a href="/Projet_gestionProduit/index.php">Accueil</a> |

<?php if (isset($_SESSION['user'])): ?>
    <a href="/Projet_gestionProduit/produits/liste.php">Produits</a> |
    <a href="/Projet_gestionProduit/categories/liste.php">Catégories</a> |
    <a href="/Projet_gestionProduit/utilisateurs/liste.php">Utilisateurs</a> |
    <strong><?= htmlspecialchars($_SESSION['user']['username']) ?></strong> |
    <a href="/Projet_gestionProduit/auth/deconnexion.php">Déconnexion</a>
<?php else: ?>
    <a href="/Projet_gestionProduit/auth/inscription.php">Inscription</a> |
    <a href="/Projet_gestionProduit/auth/connexion.php">Connexion</a>
<?php endif; ?>
<hr>