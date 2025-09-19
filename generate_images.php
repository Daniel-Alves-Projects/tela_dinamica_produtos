<?php
// generate_images.php
// Script para gerar imagens placeholder para todos os produtos do banco

// Configurações
$imageWidth = 400;
$imageHeight = 300;
$imageFolder = 'imgs-products/';

// Conectar ao banco de dados
try {
    $pdo = new PDO("mysql:host=localhost;dbname=nestsafe;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Buscar todos os produtos
    $stmt = $pdo->query("SELECT codigo, nome FROM produtos");
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Criar pasta se não existir
    if (!file_exists($imageFolder)) {
        mkdir($imageFolder, 0777, true);
    }
    
    $cores = [
        [52, 152, 219], // Azul
        [46, 204, 113], // Verde
        [155, 89, 182], // Roxo
        [241, 196, 15], // Amarelo
        [230, 126, 34], // Laranja
        [231, 76, 60]   // Vermelho
    ];
    
    echo "<h1>Gerando imagens para produtos...</h1>";
    echo "<ul>";
    
    foreach ($produtos as $produto) {
        $codigo = $produto['codigo'];
        $nome = $produto['nome'];
        
        // Gerar de 1 a 4 imagens para cada produto
        $numImagens = rand(1, 4);
        
        for ($i = 1; $i <= $numImagens; $i++) {
            $filename = $imageFolder . $codigo . '-' . $i . '.jpg';
            
            // Escolher uma cor aleatória
            $corIndex = array_rand($cores);
            $cor = $cores[$corIndex];
            
            // Criar imagem
            $image = imagecreate($imageWidth, $imageHeight);
            
            // Definir cores
            $backgroundColor = imagecolorallocate($image, $cor[0], $cor[1], $cor[2]);
            $textColor = imagecolorallocate($image, 255, 255, 255);
            
            // Adicionar texto
            imagestring($image, 5, 20, 50, $codigo, $textColor);
            imagestring($image, 3, 20, 80, $nome, $textColor);
            imagestring($image, 2, 20, 120, "Imagem $i de $numImagens", $textColor);
            
            // Salvar imagem
            imagejpeg($image, $filename, 80);
            imagedestroy($image);
            
            echo "<li>Imagem gerada: <strong>$filename</strong></li>";
        }
    }
    
    echo "</ul>";
    echo "<p><strong>Todas as imagens foram geradas com sucesso!</strong></p>";
    echo '<p><a href="index.php">Voltar para a página principal</a></p>';
    
} catch (PDOException $e) {
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}
?>