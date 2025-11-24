/* SIDEBAR TOGGLE */
const sidebar = document.getElementById('sidebar');
const main = document.getElementById('main');
const toggleBtn = document.getElementById('toggleBtn');

toggleBtn.addEventListener('click', () => {
  sidebar.classList.toggle('collapsed');
  main.classList.toggle('expanded');
});

/* CLOSE SIDEBAR ON OUTSIDE CLICK (mobile) */
document.addEventListener('click', (e) => {
  if (window.innerWidth <= 1100) {
    if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
      sidebar.classList.add('collapsed');
      main.classList.remove('expanded');
    }
  }
});

/* SEARCH FILTER */
const searchInput = document.getElementById('menuSearch');
const menuItems = document.querySelectorAll('#menuList li');

if (searchInput) {
  searchInput.addEventListener('input', () => {
    const value = searchInput.value.trim().toLowerCase();
    menuItems.forEach(li => {
      const text = li.innerText.toLowerCase();
      li.style.display = text.includes(value) ? 'flex' : 'none';
    });
  });
}

/* THEME SWITCHER (light -> dark -> device) */
const themeToggle = document.getElementById('themeToggle');
const savedTheme = localStorage.getItem('theme') || 'device';
if (savedTheme === 'dark') document.documentElement.classList.add('dark');

themeToggle.addEventListener('click', () => {
  if (document.documentElement.classList.contains('dark')) {
    // switch to device (remove dark)
    document.documentElement.classList.remove('dark');
    localStorage.setItem('theme', 'device');
  } else {
    // enable dark
    document.documentElement.classList.add('dark');
    localStorage.setItem('theme', 'dark');
  }
});
