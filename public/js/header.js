// header
document.addEventListener('DOMContentLoaded', function () {
  const openBtn = document.getElementById('openMenuBtn');
  const closeBtn = document.getElementById('closeMenuBtn');
  const menu = document.getElementById('mobileMenu');
  const overlay = document.getElementById('menuOverlay');

  openBtn.addEventListener('click', function () {
    menu.classList.add('open');
    overlay.style.display = 'block';
  });

  closeBtn.addEventListener('click', function () {
    menu.classList.remove('open');
    overlay.style.display = 'none';
  });

  overlay.addEventListener('click', function () {
    menu.classList.remove('open');
    overlay.style.display = 'none';
  });
});