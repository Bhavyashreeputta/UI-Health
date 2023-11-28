const subBtn = document.querySelector('.sub-btn');
const subMenu = document.querySelector('.sub-menu');

subBtn.addEventListener('click', function() {
  subMenu.classList.toggle('hidden');
  subBtn.setAttribute('aria-expanded', subMenu.classList.contains('hidden') ? 'false' : 'true');
});