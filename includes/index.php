<?php
$page_title = "Início";
$meta_description = "A Nestsafe é uma distribuidora de produtos médicos com alta qualidade, entrega ágil e suporte especializado. Soluções para revenda e atendimento seguro.";
include('includes/header.php');
?>
<main>
    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Produtos Médicos com Qualidade Garantida, entrega ágil e suporte especializado é na <strong>Nestsafe</strong></h1>
                    <p>Se você busca uma distribuidora confiável, com produtos médicos de alta qualidade, chegou ao lugar certo! Na Nestsafe, você conta com entrega rápida, suporte dedicado e total garantia de procedência. Tudo para que seu atendimento continue seguro, eficiente e sem imprevistos.</p>
                    <div class="hero-buttons">
                        <a href="<?php echo url('produtos'); ?>" class="cta-button">
                            <img src="<?php echo img_url('botao-quero-conhecer.svg'); ?>" alt="Quero conhecer">
                        </a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="<?php echo img_url('familia-capa.svg'); ?>" alt="Família - Produtos médicos de qualidade" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- DIVIDER -->
    <div class="page-divider">
        <div class="container">
            <img src="<?php echo img_url('frame-divisor.svg'); ?>" alt="" class="divider-arrow">
        </div>
    </div>

    <!-- BENEFITS SECTION -->
    <section class="benefits-section">
        <div class="container">
            <div class="section-header">
                <h2>Por que escolher a <strong>Nestsafe?</strong></h2>
            </div>
            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <img src="<?php echo img_url('checkmark.svg'); ?>" alt="Ícone de benefício">
                    </div>
                    <div class="benefit-content">
                        <h3>Produtos médicos com verdadeiro custo-benefício</h3>
                        <p>Soluções acessíveis, com segurança e confiabilidade garantidas.</p>
                    </div>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <img src="<?php echo img_url('checkmark.svg'); ?>" alt="Ícone de benefício">
                    </div>
                    <div class="benefit-content">
                        <h3>Suporte técnico especializado sempre disponível</h3>
                        <p>Equipe preparada para oferecer atendimento ágil e eficiente.</p>
                    </div>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <img src="<?php echo img_url('checkmark.svg'); ?>" alt="Ícone de benefício">
                    </div>
                    <div class="benefit-content">
                        <h3>Presença nacional com ampla cobertura</h3>
                        <p>Atendemos com qualidade e segurança em todo o território nacional.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PRODUCTS SECTION -->
    <section class="featured-products">
        <div class="container">
            <div class="section-header">
                <h2>Conheça os produtos mais <br><strong>vendidos pela Nestsafe</strong></h2>
                <a href="<?php echo url('home-produtos.php'); ?>" class="view-all-btn">
                    <img src="<?php echo img_url('botao-conheca-todos-os-produtos.svg'); ?>" alt="Conheça todos os produtos">
                </a>
            </div>
            
            <div class="products-grid">
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?php echo img_url('eletrodo-ecg.svg'); ?>" alt="Eletrodo para ECG Eletrocardiograma" loading="lazy">
                    </div>
                    <div class="product-info">
                        <div class="product-rank">
                            <img src="<?php echo img_url('produto1.svg'); ?>" alt="1º lugar">
                        </div>
                        <h3>Eletrodo para ECG<br>Eletrocardiograma</h3>
                    </div>
                </div>
                
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?php echo img_url('cpap.svg'); ?>" alt="Cpap Automático para Apneia do Sono" loading="lazy">
                    </div>
                    <div class="product-info">
                        <div class="product-rank">
                            <img src="<?php echo img_url('produto2.svg'); ?>" alt="2º lugar">
                        </div>
                        <h3>Cpap Automático para<br>Apneia Do Sono</h3>
                    </div>
                </div>
                
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?php echo img_url('mascara-venturi.svg'); ?>" alt="Máscara Venturi Adulto para Oxigenoterapia" loading="lazy">
                    </div>
                    <div class="product-info">
                        <div class="product-rank">
                            <img src="<?php echo img_url('produto3.svg'); ?>" alt="3º lugar">
                        </div>
                        <h3>Máscara Venturi Adulto para<br>Oxigenoterapia</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section class="about-section">
        <div class="container">
            <div class="about-content">
                <h2>Sobre nós</h2>
                <div class="about-text">
                    <p>Na Nestsafe, desenvolvemos soluções médicas com alta performance, precisão e cuidado. Tudo para que você tenha a certeza de fazer a escolha certa para a sua revenda.</p>
                    <p>Nosso olhar está sempre voltado para o futuro. Buscamos soluções eficientes continuamente, porque acreditamos que quem cuida precisa receber e oferecer o melhor para seus pacientes, sempre. Cada item carrega nossa responsabilidade, nossa competência e, acima de tudo, o desejo de oferecer tranquilidade a quem confia em nós.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ADVANTAGES SECTION -->
                <section class="advantages">
                  <div class="advantages-iten">
                    <div class="icon-img">
                      <img src="<?php echo img_url('icon-map.svg'); ?>" alt="icone região" loading="lazy">
                    </div>
                    <div class="texto-advantage">
                      <p>Com distribuição ágil e cobertura nacional, garantimos que nossos produtos cheguem com segurança e rapidez onde você estiver.
                      </p>
                    </div>
                  </div>

                  <div class="advantages-iten">
                    <div class="icon-img">
                      <img src="<?php echo img_url('icon-headset.svg'); ?>" alt="icone headset" loading="lazy">
                    </div>
                    <div class="texto-advantage">
                      <p>Conte com uma equipe técnica preparada para oferecer orientação e suporte completo, antes e depois da venda.
                      </p>
                    </div>
                  </div>

                  <div class="advantages-iten">
                    <div class="icon-img">
                      <img src="<?php echo img_url('icon-percentage.svg'); ?>" alt="icone percentual" loading="lazy">
                    </div>
                    <div class="texto-advantage">
                      <p>Oferecemos condições exclusivas para revendedores, com margem competitiva e suporte comercial dedicado.
                      </p>
                    </div>
                  </div>

                </section>

    <!-- PARTNERS SECTION -->
    <section class="partners-section">
        <div class="container">
            <div class="partners-content">
                <h2>Parceiros</h2>
                <p>Na Nestsafe, acreditamos que grandes resultados são construídos em parceria. Se você é distribuidor, revendedor ou profissional da área da saúde, queremos você com a gente nessa missão de levar soluções seguras e eficientes para todo o Brasil.</p>
                
                <div class="partners-logos">
                    <div class="partner-logo">
                    </div>
                    <!-- Adicionar mais logos de parceiros aqui -->
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section class="contact-sac">
        <div class="contact-info">
                    <div class="contact-text"><h3>Deseja ser um revendedor Nestsafe ou <br> precisa de informações técnicas?</h3>
                    <p>Nossa equipe está pronta para responder <br> suas perguntas e oferecer o suporte ideal.</p>
                        <div class="phone-email">
                            <a href=""> <img src="<?php echo img_url('email.svg'); ?>" alt="">comercial@nestsafe.com.br</a>
                            <a href=""> <img src="<?php echo img_url('phone.svg'); ?>" alt="">(11) 9 4882 - 0012</a>
                        </div>
                    </div>
                    <div class="sac-img">
                    <img src="<?php echo img_url('sac.svg'); ?>" alt="">
                    </div>                   
        </div>         
    </section>
</main>
<?php include('includes/footer.php'); ?>