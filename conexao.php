<?php
$host = 'localhost';
$dbname = 'nestsafe';
$username = 'root';     // Usuário padrão do XAMPP
$password = '';         // Senha padrão do XAMPP (vazia)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>