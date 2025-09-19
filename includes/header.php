<?php
// Incluir configurações
require_once 'config.php';

// Definir valores padrão se não estiverem definidos
if (!isset($page_title)) $page_title = 'Início';
if (!isset($meta_description)) $meta_description = 'A Nestsafe é uma distribuidora de produtos médicos com alta qualidade, entrega ágil e suporte especializado.';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($meta_description); ?>">
    <meta name="keywords" content="produtos médicos, distribuidora médica, equipamentos hospitalares, NestSafe">
    <meta name="author" content="NestSafe">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL; ?>">
    <meta property="og:title" content="NestSafe | <?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($meta_description); ?>">
    <meta property="og:image" content="<?php echo img_url('NestSafeLogo.svg'); ?>">

    <title>NestSafe | <?php echo htmlspecialchars($page_title); ?></title>

    <link rel="icon" href="<?php echo img_url('favicon-nestsafe.png'); ?>" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
 
    <link rel="stylesheet" href="<?php echo url('style.css'); ?>?v=1.1">
    <script src="<?php echo url('js/scripts.js'); ?>" defer></script>
</head>
<body>
    <header class="main-header">
    <div class="container">
        <div class="logo">
            <a href="<?php echo url(); ?>">
                <img src="<?php echo img_url('NestSafeLogo.svg'); ?>" alt="NestSafe Logo" width="240" height="86">
            </a>
        </div>
        
        <button class="mobile-menu-toggle" aria-label="Abrir menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
        
        <nav class="main-nav">
            <ul>
                <li class="<?php echo ($page_title == 'Início') ? 'active' : ''; ?>">
                    <a href="<?php echo url(); ?>">Início</a>
                </li>
                <li><a href="<?php echo url('sobre'); ?>">Sobre nós</a></li>
                <li><a href="<?php echo url('home-produtos.php'); ?>">Produtos</a></li>
                <li><a href="<?php echo url('catalogo'); ?>">Catálogo</a></li>
                <li><a href="<?php echo url('blog'); ?>">Blog</a></li>
            </ul>
        </nav>
        
        <a href="<?php echo url('contato'); ?>" class="button-contatos">
            <img src="<?php echo img_url('botao-contato.svg'); ?>" alt="Botão de contato">
        </a>
    </div>
</header>