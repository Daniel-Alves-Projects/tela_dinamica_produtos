document.addEventListener('DOMContentLoaded', function() {
    // Navegação entre imagens dos produtos
    const productCards = document.querySelectorAll('.product-card');
    
    productCards.forEach(card => {
        const dots = card.querySelectorAll('.image-dot');
        const mainImage = card.querySelector('.product-image');
        
        if (dots.length > 0) {
            dots.forEach((dot, index) => {
                dot.addEventListener('click', function() {
                    // Atualiza dots ativos
                    dots.forEach(d => d.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Altera a imagem
                    const newSrc = this.getAttribute('data-image-src');
                    if (newSrc && newSrc !== mainImage.src) {
                        // Efeito de transição
                        mainImage.style.opacity = 0;
                        setTimeout(() => {
                            mainImage.src = newSrc;
                            mainImage.style.opacity = 1;
                        }, 300);
                    }
                });
            });
        }
    });
    
    // Validação do formulário de pesquisa
    const searchForm = document.querySelector('.search-form');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            const searchInput = this.querySelector('input[name="pesquisa"]');
            if (searchInput.value.trim().length < 2) {
                e.preventDefault();
                alert('Por favor, digite pelo menos 2 caracteres para pesquisar.');
                searchInput.focus();
            }
        });
    }
    
    // Destacar termos de pesquisa nos resultados
    function highlightSearchTerms() {
        const urlParams = new URLSearchParams(window.location.search);
        const searchTerm = urlParams.get('pesquisa');
        
        if (searchTerm && searchTerm.length >= 2) {
            const productNames = document.querySelectorAll('.product-name');
            const productCodes = document.querySelectorAll('.product-code');
            const productCategories = document.querySelectorAll('.product-category');
            
            const regex = new RegExp(searchTerm, 'gi');
            
            function highlightText(element) {
                const originalText = element.textContent;
                const highlightedText = originalText.replace(regex, match => 
                    `<span class="highlight">${match}</span>`
                );
                
                if (highlightedText !== originalText) {
                    element.innerHTML = highlightedText;
                }
            }
            
            productNames.forEach(highlightText);
            productCodes.forEach(highlightText);
            productCategories.forEach(highlightText);
        }
    }
    
    highlightSearchTerms();
});

// Adicionar estilo para os termos destacados
const highlightStyle = document.createElement('style');
highlightStyle.textContent = `
    .highlight {
        background-color: #fff8e1;
        padding: 2px 4px;
        border-radius: 3px;
        font-weight: bold;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
`;
document.head.appendChild(highlightStyle);