<footer>
    <div class="container">
        <div class="footer-content">
            <div class="logo">
                <a href="<?php echo url(); ?>">
                    <img src="<?php echo img_url('NestSafeLogo.svg'); ?>" alt="NestSafe Logo" width="200" height="72">
                </a>
            </div>
            <p>Copyright © 2024 NestSafe. Todos os direitos reservados.</p>
        </div>
        
        <div class="footer-bottom">
            <p>© 2025 Nestsafe – Todos os direitos reservados. - CNPJ 06.103.1220002/70 – Inscrição Estadual: 255129500</p>
            <p>BALLIE PRODUTOS HOSPITALARES LTDA - CNPJ 09.0312200007/0 - Fone/WhatsApp: (11) 94882-0012 - E-mail: comercial@nestsafe.com.br</p>
            <p>Travessa Shenzono 70, Bairro Avogado, Concórdia/SC, 89701-496</p>
            <p>Responsável Técnico Farmacêutico: Maria Paula de Castro Zardo - CRF/SC 3964</p>
            <p>As informações contidas neste site não devem ser usadas para automedicação. Em hipótese alguma substituem as orientações dadas pelo profissional da área médica.</p>
        </div>
    </div>
</footer>

<!-- Cookie Banner -->
<div class="cookie-banner" id="cookieBanner">
    <div class="container">
        <div class="cookie-content">
            <p>Nosso site usa cookies para melhorar a navegação. 
                <a href="<?php echo url('privacidade'); ?>">Aviso de Privacidade</a>
            </p>
            <div class="cookie-buttons">
                <button class="cookie-btn accept" onclick="acceptCookies()">Aceitar</button>
                <button class="cookie-btn reject" onclick="rejectCookies()">Rejeitar</button>
            </div>
        </div>
    </div>
</div>

<script>
// Cookie banner functionality
function acceptCookies() {
    document.getElementById('cookieBanner').style.display = 'none';
    localStorage.setItem('cookiesAccepted', 'true');
}

function rejectCookies() {
    document.getElementById('cookieBanner').style.display = 'none';
    localStorage.setItem('cookiesAccepted', 'false');
}

// Check if user already made a choice
document.addEventListener('DOMContentLoaded', function() {
    if (localStorage.getItem('cookiesAccepted') !== null) {
        document.getElementById('cookieBanner').style.display = 'none';
    }
});
</script>
</body>
</html>