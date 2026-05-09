const burgerBtn = document.getElementById('burgerBtn');
const closeBtn = document.getElementById('closeBtn');
const mobileMenu = document.getElementById('mobileMenu');

function toggleMenu() {
    mobileMenu.classList.toggle('active');
    burgerBtn.style.display = mobileMenu.classList.contains('active') ? 'none' : 'block';
}

burgerBtn?.addEventListener('click', toggleMenu);
closeBtn?.addEventListener('click', toggleMenu);

// Закрытие при клике на ссылку
document.querySelectorAll('.mobile-menu a').forEach(link => {
    link.addEventListener('click', toggleMenu);
});
