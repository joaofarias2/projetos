<?php
// auth.php

require_once 'Dbh.php'; 

class Auth {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function login($username, $password) {
        $stmt = $this->conn->prepare("SELECT nome_de_utilizador, palavra_passe FROM utilizadores WHERE nome_de_utilizador = ?");
        $stmt->execute([$username]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($password, $admin['palavra_passe'])) {
            session_start();
            $_SESSION['authenticated'] = true;
            return true;
        }

        return false;
    }

    public function isAuthenticated() {
        return isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true;
    }

    public function logout() {
        session_start();
        $_SESSION = array();
        session_destroy();
    }
}
