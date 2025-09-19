<?php
include 'conexao.php';

// Verifica se há uma pesquisa
$termo_pesquisa = '';
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
if (empty($termo_pesquisa)) {
    // Exibe produtos aleatórios na primeira página
    $sql = "SELECT * FROM produtos ORDER BY RAND() LIMIT :offset, :limit";
} else {
    // Exibe resultados da pesquisa ordenados por relevância
    $sql = "SELECT * FROM produtos $where ORDER BY 
            CASE 
                WHEN nome LIKE :pesquisa_exata THEN 1
                WHEN nome LIKE :pesquisa_inicio THEN 2
                WHEN categoria LIKE :pesquisa_categoria THEN 3
                ELSE 4
            END
            LIMIT :offset, :limit";
}

$stmt = $pdo->prepare($sql);

if (!empty($termo_pesquisa)) {
    $stmt->bindValue(':pesquisa', '%' . $termo_pesquisa . '%');
    $stmt->bindValue(':pesquisa_exata', $termo_pesquisa . '%');
    $stmt->bindValue(':pesquisa_inicio', '%' . $termo_pesquisa . '%');
    $stmt->bindValue(':pesquisa_categoria', '%' . $termo_pesquisa . '%');
}

$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->bindValue(':limit', $produtos_por_pagina, PDO::PARAM_INT);
$stmt->execute();
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Função para buscar imagens de um produto
function buscarImagensProduto($codigo) {
    $imagens = array();
    $pasta = 'imgs-products/';
    
    // Verifica se existem imagens para este código
    for ($i = 1; $i <= 4; $i++) {
        $arquivo = $pasta . $codigo . '-' . $i . '.jpg';
        if (file_exists($arquivo)) {
            $imagens[] = $arquivo;
        }
    }
    
    // Se não encontrou imagens, usa uma imagem padrão
    if (empty($imagens)) {
        $imagens[] = $pasta . 'default.jpg';
    }
    
    return $imagens;
}
?>