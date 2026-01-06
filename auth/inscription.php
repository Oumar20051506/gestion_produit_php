<?php
require_once "../config/database.php";

$db = new Database();
$conn = $db->connexion();

if (isset($_POST['inscrire'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilisateurs(username,email,password,role)
            VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username,$email,$password,'user']);

    header("Location: connexion.php");
}
?>

<form method="post">
    <input type="text" name="username" placeholder="Nom" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>
    <button name="inscrire">S'inscrire</button>
</form>