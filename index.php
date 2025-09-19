<?php
include 'buscar-produtos.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NESTSAFE - Produtos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">NESTSAFE</div>
            <p class="tagline">Sua saúde em primeiro lugar</p>
        </header>
        
        <div class="search-container">
            <form class="search-form" method="GET" action="">
                <input 
                    type="text" 
                    name="pesquisa" 
                    class="search-input" 
                    placeholder="Pesquisar por nome, código ou categoria..."
                    value="<?php echo htmlspecialchars($termo_pesquisa); ?>"
                >
                <button type="submit" class="search-button">
                    <i class="fas fa-search"></i> Pesquisar
                </button>
            </form>
        </div>
        
        <div class="results-info">
            <h2><?php echo $total_produtos; ?> produto(s) encontrado(s)</h2>
            <?php if ($total_paginas > 1): ?>
                <div>Página <?php echo $pagina; ?> de <?php echo $total_paginas; ?></div>
            <?php endif; ?>
        </div>
        
        <?php if (count($produtos) > 0): ?>
            <div class="products-grid">
                <?php foreach ($produtos as $produto): 
                    $imagens = buscarImagensProduto($produto['codigo']);
                    $data_cadastro = date('d/m/Y', strtotime($produto['data_cadastro']));
                ?>
                    <div class="product-card">
                        <div class="product-image-container">
                            <img src="<?php echo $imagens[0]; ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>" class="product-image">
                            <?php if (count($imagens) > 1): ?>
                                <div class="product-image-nav">
                                    <?php for ($i = 0; $i < count($imagens); $i++): ?>
                                        <div class="image-dot <?php echo $i == 0 ? 'active' : ''; ?>" data-image-src="<?php echo $imagens[$i]; ?>"></div>
                                    <?php endfor; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="product-info">
                            <h3 class="product-name"><?php echo htmlspecialchars($produto['nome']); ?></h3>
                            <div class="product-code">Código: <?php echo htmlspecialchars($produto['codigo']); ?></div>
                            <span class="product-category"><?php echo htmlspecialchars($produto['categoria']); ?></span>
                            <?php if (!empty($produto['descricao'])): ?>
                                <p class="product-description"><?php echo htmlspecialchars($produto['descricao']); ?></p>
                            <?php endif; ?>
                            <div class="product-meta">
                                <div class="product-date">Cadastrado em: <?php echo $data_cadastro; ?></div>
                                <a href="#" class="view-details">Ver detalhes</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <?php if ($total_paginas > 1): ?>
                <div class="pagination">
                    <?php if ($pagina > 1): ?>
                        <a href="?pagina=<?php echo $pagina-1; ?><?php echo !empty($termo_pesquisa) ? '&pesquisa=' . urlencode($termo_pesquisa) : ''; ?>">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    <?php endif; ?>
                    
                    <?php 
                    $inicio = max(1, $pagina - 2);
                    $fim = min($total_paginas, $inicio + 4);
                    $inicio = max(1, $fim - 4);
                    
                    for ($i = $inicio; $i <= $fim; $i++): ?>
                        <a href="?pagina=<?php echo $i; ?><?php echo !empty($termo_pesquisa) ? '&pesquisa=' . urlencode($termo_pesquisa) : ''; ?>" 
                           class="<?php echo $i == $pagina ? 'active' : ''; ?>">
                            <?php echo $i; ?>
                        </a>
                    <?php endfor; ?>
                    
                    <?php if ($pagina < $total_paginas): ?>
                        <a href="?pagina=<?php echo $pagina+1; ?><?php echo !empty($termo_pesquisa) ? '&pesquisa=' . urlencode($termo_pesquisa) : ''; ?>">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
        <?php else: ?>
            <div class="no-products">
                <i class="fas fa-search"></i>
                <h3>Nenhum produto encontrado</h3>
                <p>Tente alterar os termos da sua pesquisa ou explore nossa lista de produtos aleatórios.</p>
            </div>
        <?php endif; ?>
        
        <footer>
            <p>NESTSAFE &copy; <?php echo date('Y'); ?> - Todos os direitos reservados</p>
        </footer>
    </div>

    <script src="script.js"></script>
</body>
</html>