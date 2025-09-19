<?php
$host = 'localhost';
$dbname = 'nestsafe';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Registrar o erro em um arquivo de log
    error_log("Erro de conexão: " . $e->getMessage());
    
    // Exibir mensagem amigável para o usuário
    die("Desculpe, estamos enfrentando problemas técnicos. Tente novamente mais tarde.");
}
?>