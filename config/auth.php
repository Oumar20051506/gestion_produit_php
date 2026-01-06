<?php
session_start();

function estConnecte() {
    return isset($_SESSION['id']);
}

function estAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

function securiser() {
    if (!estConnecte()) {
        header("Location: /Projet_gestionProduit/auth/connexion.php");
        exit;
    }
}