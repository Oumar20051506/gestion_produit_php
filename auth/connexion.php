<?php
require_once "../config/database.php";
session_start();

$db = new Database();
$conn = $db->connexion();

if (isset($_POST['connecter'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM utilisateurs WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {

  
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

   
        if ($user['role'] === 'admin') {
            header("Location: ../admin/dashboard.php");
        } else {
            header("Location: ../index.php");
        }
        exit;

    } else {
        $erreur = "Email ou mot de passe incorrect";
    }
}
?>
<link rel="stylesheet" href="../assets/css/style.css">
<h2>Connexion</h2>

<?php if (isset($erreur)) echo "<p style='color:red;'>$erreur</p>"; ?>

<form method="post">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br><br>
    <button name="connecter">Se connecter</button>
</form>