<?php
// ==========================================================
// CONFIGURAÇÕES DE CAMINHOS - Isso evita erros de diretórios
// ==========================================================
// Configurações do site
define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/nestsafe/');
define('SITE_NAME', 'nestsafe');

// Configurações de caminhos
define('UPLOAD_PATH', SITE_URL . 'uploads/');
define('IMG_PATH', UPLOAD_PATH . 'imgs/');

// Iniciar sessão se não estiver iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Função para gerar URLs absolutas
function url($path = '') {
    return SITE_URL . ltrim($path, '/');
}

// Função para gerar caminhos de imagens
function img_url($image) {
    return IMG_PATH . $image;
}

