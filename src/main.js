import './style.css';

const root = document.documentElement;

// ===== Dark mode (tersimpan di browser) =====
document.getElementById('themeToggle').addEventListener('click', () => {
    const dark = root.classList.toggle('dark');
    try {
        localStorage.setItem('theme', dark ? 'dark' : 'light');
    } catch (e) {}
});

// ===== Hamburger menu (mobile) =====
const burger = document.getElementById('burger');
const menu = document.getElementById('mobileMenu');

burger.addEventListener('click', () => {
    const open = menu.classList.toggle('hidden') === false;
    burger.setAttribute('aria-expanded', open);
});
menu.querySelectorAll('a').forEach((a) =>
    a.addEventListener('click', () => menu.classList.add('hidden'))
);

// ===== Filter kategori proyek =====
const filterButtons = document.querySelectorAll('[data-filter]');
const cards = document.querySelectorAll('[data-category]');

filterButtons.forEach((btn) =>
    btn.addEventListener('click', () => {
        const filter = btn.dataset.filter;
        filterButtons.forEach((b) => b.setAttribute('aria-pressed', b === btn));
        cards.forEach((card) =>
            card.classList.toggle('hidden', !(filter === 'all' || card.dataset.category === filter))
        );
    })
);

// ===== Animasi muncul saat scroll =====
const revealItems = document.querySelectorAll('.reveal');

revealItems.forEach((el) => {
    const siblings = [...el.parentElement.children].filter((c) => c.classList.contains('reveal'));
    el.style.animationDelay = Math.min(siblings.indexOf(el), 5) * 120 + 'ms';
});

const observer = new IntersectionObserver(
    (entries, obs) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('is-visible');
            obs.unobserve(entry.target);
        });
    },
    { threshold: 0.15 }
);
revealItems.forEach((el) => observer.observe(el));

// ===== Formulir kontak (belum mengirim data; validasi required oleh browser) =====
const form = document.getElementById('contactForm');
const status = document.getElementById('formStatus');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    status.textContent = 'Terima kasih! Formulir berfungsi, tetapi pengiriman asli dikerjakan pada milestone API.';
    status.classList.remove('hidden');
    form.reset();
});
