SISTEMA NESTSAFE - INSTRUÇÕES DE INSTALAÇÃO

1. ESTRUTURA DE PASTAS:
   - Coloque todos os arquivos na pasta do seu servidor (htdocs no XAMPP)
   - Crie uma pasta chamada "imgs-products" para armazenar as imagens

2. CONFIGURAÇÃO DO BANCO DE DADOS:
   - Execute o script SQL abaixo no phpMyAdmin para criar a tabela:

   CREATE TABLE produtos (
       id INT AUTO_INCREMENT PRIMARY KEY,
       nome VARCHAR(255) NOT NULL,
       codigo VARCHAR(50) NOT NULL UNIQUE,
       categoria VARCHAR(100) NOT NULL,
       descricao TEXT,
       data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );

3. CONFIGURAÇÃO DAS IMAGENS:
   - As imagens devem seguir o padrão: [código]-[número].jpg
   - Exemplo: ESP001-1.jpg, ESP001-2.jpg, etc.
   - Coloque as imagens na pasta "imgs-products"

4. CONFIGURAÇÃO DA CONEXÃO:
   - Edite o arquivo conexao.php com suas credenciais do MySQL
   - Usuário padrão do XAMPP: root
   - Senha padrão do XAMPP: (vazia)

5. ACESSO:
   - Acesse o sistema através de: http://localhost/nestsafe/index.php

6. FUNCIONALIDADES:
   - Exibição aleatória de produtos na primeira visita
   - Pesquisa por nome, código ou categoria
   - Paginação (máximo de 24 produtos por página)
   - Navegação entre múltiplas imagens por produto
   - Layout responsivo para mobile e desktop

Para suporte, entre em contato com o administrador do sistema.