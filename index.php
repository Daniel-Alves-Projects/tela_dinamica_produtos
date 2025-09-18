<?php
include 'conexao.php';

// Verifica se há uma pesquisa
$termo_pesquisa = '';
$categoria_pesquisa = '';
$where = '';

if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])) {
    $termo_pesquisa = $_GET['pesquisa'];
    $where = "WHERE (nome LIKE :pesquisa OR codigo LIKE :pesquisa OR categoria LIKE :pesquisa)";
}

// Consulta para contar o total de produtos
$sql_count = "SELECT COUNT(*) as total FROM produtos $where";
$stmt_count = $pdo->prepare($sql_count);

if (!empty($termo_pesquisa)) {
    $stmt_count->bindValue(':pesquisa', '%' . $termo_pesquisa . '%');
}

$stmt_count->execute();
$total_produtos = $stmt_count->fetch(PDO::FETCH_ASSOC)['total'];

// Paginação
$pagina = isset($_GET['pagina']) ? max(1, intval($_GET['pagina'])) : 1;
$produtos_por_pagina = 24;
$offset = ($pagina - 1) * $produtos_por_pagina;
$total_paginas = ceil($total_produtos / $produtos_por_pagina);

// Consulta para obter os produtos
$sql = "SELECT * FROM produtos $where ORDER BY RAND() LIMIT :offset, :limit";
$stmt = $pdo->prepare($sql);

if (!empty($termo_pesquisa)) {
    $stmt->bindValue(':pesquisa', '%' . $termo_pesquisa . '%');
}

$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->bindValue(':limit', $produtos_por_pagina, PDO::PARAM_INT);
$stmt->execute();
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NESTSAFE - Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">NESTSAFE</div>
            <p>Encontre os melhores produtos para sua saúde</p>
        </header>
        
        <form method="GET" action="" class="search-form">
            <input 
                type="text" 
                name="pesquisa" 
                class="search-input" 
                placeholder="Pesquisar por nome, código ou categoria..."
                value="<?php echo htmlspecialchars($termo_pesquisa); ?>"
            >
            <button type="submit" class="search-button">Pesquisar</button>
        </form>
        
        <?php if (count($produtos) > 0): ?>
            <div class="products-grid">
                <?php foreach ($produtos as $produto): ?>
                    <div class="product-card">
                        <img 
                            src="<?php echo !empty($produto['imagem']) ? htmlspecialchars($produto['imagem']) : 'placeholder.jpg'; ?>" 
                            alt="<?php echo htmlspecialchars($produto['nome']); ?>" 
                            class="product-image"
                        >
                        <div class="product-info">
                            <div class="product-name"><?php echo htmlspecialchars($produto['nome']); ?></div>
                            <div class="product-code">Código: <?php echo htmlspecialchars($produto['codigo']); ?></div>
                            <div class="product-category">Categoria: <?php echo htmlspecialchars($produto['categoria']); ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <?php if ($total_paginas > 1): ?>
                <div class="pagination">
                    <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                        <a 
                            href="?pagina=<?php echo $i; ?><?php echo !empty($termo_pesquisa) ? '&pesquisa=' . urlencode($termo_pesquisa) : ''; ?>" 
                            class="<?php echo $i == $pagina ? 'active' : ''; ?>"
                        >
                            <?php echo $i; ?>
                        </a>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
            
        <?php else: ?>
            <div class="no-products">
                Nenhum produto encontrado. Tente alterar os termos da sua pesquisa.
            </div>
        <?php endif; ?>
    </div>
</body>
</html>