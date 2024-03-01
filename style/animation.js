
const logo = document.querySelector('.colonne1 img');

logo.addEventListener('click', function() {
    this.style.transform = 'rotate(360deg)';
    
    setTimeout(() => {
        const buttonsContainer = document.getElementById('buttonsContainer');
        buttonsContainer.style.display = 'block';
    }, 500);
});