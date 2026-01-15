// JavaScript für Interaktivität
const contactForm = document.getElementById('contactForm');
if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const message = document.getElementById('message').value;
        if (name && email && message) {
            alert('Vielen Dank für Ihre Nachricht! Wir melden uns bald.');
            // Hier könnte eine AJAX-Anfrage an einen Server erfolgen
        } else {
            alert('Bitte füllen Sie alle Felder aus.');
        }
    });
}

// Navbar beim Scrollen ausblenden/einblenden
const navbar = document.querySelector('.modern-navbar');
const navbarCollapse = document.getElementById('navbarNav');
const navbarToggler = document.querySelector('.navbar-toggler');
let lastScrollY = window.scrollY;
let ticking = false;

function handleNavbarScroll() {
    if (!navbar) {
        return;
    }

    const currentScrollY = window.scrollY;
    const scrollDelta = currentScrollY - lastScrollY;

    if (currentScrollY > 120 && scrollDelta > 0) {
        navbar.classList.add('is-hidden');
    } else if (scrollDelta < 0) {
        navbar.classList.remove('is-hidden');
    }

    lastScrollY = currentScrollY;
    ticking = false;
}

window.addEventListener('scroll', () => {
    if (!ticking) {
        window.requestAnimationFrame(handleNavbarScroll);
        ticking = true;
    }
});

if (navbarCollapse) {
    navbarCollapse.addEventListener('shown.bs.collapse', () => {
        document.body.classList.add('menu-open');
    });

    navbarCollapse.addEventListener('hidden.bs.collapse', () => {
        document.body.classList.remove('menu-open');
    });
}

document.querySelectorAll('.modern-nav .nav-link').forEach((link) => {
    link.addEventListener('click', () => {
        if (navbarCollapse && navbarCollapse.classList.contains('show') && navbarToggler) {
            navbarToggler.click();
        }
    });
});

// Cookie-Banner (einfach)
if (!localStorage.getItem('cookiesAccepted')) {
    const banner = document.createElement('div');
    banner.innerHTML = '<p>Diese Website verwendet Cookies. <button id="accept">Akzeptieren</button></p>';
    banner.style.position = 'fixed'; banner.style.bottom = '0'; banner.style.width = '100%'; banner.style.background = '#000'; banner.style.color = '#fff'; banner.style.textAlign = 'center';
    document.body.appendChild(banner);
    document.getElementById('accept').addEventListener('click', function() {
        localStorage.setItem('cookiesAccepted', 'true');
        banner.remove();
    });
}