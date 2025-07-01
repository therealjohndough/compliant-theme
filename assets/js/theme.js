// --- 1. Initialize Mobile Menu ---
// Handles the hamburger menu functionality on smaller screens.
function initMobileMenu() {
    const menuToggle = document.querySelector('.menu-toggle');
    const mainNav = document.querySelector('.main-navigation');

    if (menuToggle && mainNav) {
        menuToggle.addEventListener('click', function() {
            mainNav.classList.toggle('is-active');
            // Optional: Prevents scrolling when the mobile menu is open
            document.body.classList.toggle('no-scroll');
        });
    }
}

// --- 2. Initialize Header on Scroll ---
// Adds a class to the header when the user scrolls down,
// allowing for styling changes (e.g., shrink, change background).
function initHeaderOnScroll() {
    const header = document.getElementById('masthead');
    if (!header) return;

    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
    });
}

// --- 3. Initialize Cursor Glow Effect ---
// Creates a soft glow that follows the user's mouse for a cool aesthetic.
function initCursorGlow() {
    const glow = document.createElement('div');
    glow.className = 'cursor-glow';
    document.body.appendChild(glow);

    window.addEventListener('mousemove', function(e) {
        // Use translate3d for hardware acceleration and better performance
        glow.style.transform = `translate3d(${e.clientX}px, ${e.clientY}px, 0)`;
    });
}

// --- 4. Initialize Interactive 3D Card Tilt ---
// Makes product cards tilt based on mouse position for a 3D effect.
function initCardTilt() {
    const cards = document.querySelectorAll('.product-card');
    if (cards.length === 0) return;
    
    cards.forEach(card => {
        const maxTilt = 10; // Max tilt in degrees

        card.addEventListener('mousemove', function(e) {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left; // x position inside the element
            const y = e.clientY - rect.top;  // y position inside the element

            // Calculate tilt based on cursor position from the center
            const tiltX = (maxTilt / 2) - (y / rect.height) * maxTilt;
            const tiltY = (x / rect.width) * maxTilt - (maxTilt / 2);

            // Use requestAnimationFrame for smoother rendering
            requestAnimationFrame(() => {
                card.style.transform = `perspective(1000px) rotateX(${tiltX}deg) rotateY(${tiltY}deg) scale3d(1.05, 1.05, 1.05)`;
                card.style.transition = 'transform 0.1s ease-out';
            });
        });

        card.addEventListener('mouseleave', function() {
            requestAnimationFrame(() => {
                card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale3d(1, 1, 1)';
                card.style.transition = 'transform 0.6s cubic-bezier(0.23, 1, 0.32, 1)';
            });
        });
    });
}

// --- Run all initialization functions ---
initMobileMenu();
initHeaderOnScroll();
initCursorGlow();
initCardTilt();
