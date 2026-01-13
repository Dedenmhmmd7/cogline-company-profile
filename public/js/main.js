// ==================== MOBILE MENU TOGGLE ====================
document.addEventListener('DOMContentLoaded', function() {
    const burger = document.getElementById('navbarBurger');
    const menu = document.getElementById('navbarMenu');
    
    if (burger && menu) {
        // Toggle menu when burger clicked
        burger.addEventListener('click', function() {
            menu.classList.toggle('active');
            burger.classList.toggle('active');
        });
        
        // Close menu when clicking ANY link inside navbar menu
        const allMenuLinks = menu.querySelectorAll('a');
        allMenuLinks.forEach(link => {
            link.addEventListener('click', function() {
                // Close menu with a small delay for smooth transition
                setTimeout(() => {
                    menu.classList.remove('active');
                    burger.classList.remove('active');
                }, 100);
            });
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            const isClickInsideMenu = menu.contains(event.target);
            const isClickOnBurger = burger.contains(event.target);
            
            if (!isClickInsideMenu && !isClickOnBurger && menu.classList.contains('active')) {
                menu.classList.remove('active');
                burger.classList.remove('active');
            }
        });
    }
});

// ==================== SMOOTH SCROLLING ====================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        
        // Don't prevent default for links that only have '#'
        if (href === '#') return;
        
        e.preventDefault();
        
        const target = document.querySelector(href);
        if (target) {
            const offsetTop = target.offsetTop - 80; // 80px offset for fixed navbar
            
            window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            });
            
            // Close mobile menu after scrolling
            const menu = document.getElementById('navbarMenu');
            const burger = document.getElementById('navbarBurger');
            if (menu && burger) {
                menu.classList.remove('active');
                burger.classList.remove('active');
            }
        }
    });
});

// ==================== NAVBAR SCROLL EFFECT ====================
let lastScroll = 0;
const navbar = document.querySelector('.navbar');

window.addEventListener('scroll', function() {
    const currentScroll = window.pageYOffset;
    
    if (currentScroll <= 0) {
        navbar.classList.remove('scroll-up');
        return;
    }
    
    if (currentScroll > lastScroll && !navbar.classList.contains('scroll-down')) {
        // Scrolling down
        navbar.classList.remove('scroll-up');
        navbar.classList.add('scroll-down');
    } else if (currentScroll < lastScroll && navbar.classList.contains('scroll-down')) {
        // Scrolling up
        navbar.classList.remove('scroll-down');
        navbar.classList.add('scroll-up');
    }
    
    lastScroll = currentScroll;
});

// ==================== STATS COUNTER ANIMATION ====================
function animateCounter(element, target) {
    let current = 0;
    const increment = target / 100;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target + '+';
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current) + '+';
        }
    }, 20);
}

// Trigger counter animation when stats section is visible
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const counters = entry.target.querySelectorAll('.stat-item h3');
            counters.forEach(counter => {
                const target = parseInt(counter.textContent);
                if (!isNaN(target)) {
                    animateCounter(counter, target);
                }
            });
            observer.unobserve(entry.target);
        }
    });
});

const statsSection = document.querySelector('.hero-stats');
if (statsSection) {
    observer.observe(statsSection);
}

// ==================== FEATURE CARDS ANIMATION ====================
const featureCards = document.querySelectorAll('.feature-card');
const cardObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
            setTimeout(() => {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }, index * 100);
        }
    });
}, {
    threshold: 0.1
});

featureCards.forEach(card => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(20px)';
    card.style.transition = 'all 0.5s ease';
    cardObserver.observe(card);
});

// ==================== PRICING CARDS HOVER EFFECT ====================
const pricingCards = document.querySelectorAll('.pricing-card');
pricingCards.forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-10px)';
    });
    
    card.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
    });
});

// ==================== TESTIMONIAL SLIDER (Optional) ====================
let currentTestimonial = 0;
const testimonials = document.querySelectorAll('.testimonial-card');

function showTestimonial(index) {
    testimonials.forEach((testimonial, i) => {
        if (i === index) {
            testimonial.style.display = 'block';
        } else {
            testimonial.style.display = 'none';
        }
    });
}

// Auto-rotate testimonials (optional, can be disabled)
// setInterval(() => {
//     currentTestimonial = (currentTestimonial + 1) % testimonials.length;
//     showTestimonial(currentTestimonial);
// }, 5000);

// ==================== FORM VALIDATION ====================
const contactForm = document.getElementById('contactForm');
if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form values
        const name = document.getElementById('name').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const hotel = document.getElementById('hotel').value.trim();
        const rooms = document.getElementById('rooms').value;
        
        // Basic validation
        if (!name || !phone || !hotel || !rooms) {
            alert('Mohon lengkapi semua field yang wajib diisi!');
            return;
        }
        
        // Phone validation (basic)
        const phoneRegex = /^[0-9+\s-]+$/;
        if (!phoneRegex.test(phone)) {
            alert('Nomor telepon tidak valid!');
            return;
        }
        
        // Show success message
        alert('Terima kasih! Pendaftaran Anda telah diterima. Tim kami akan segera menghubungi Anda dalam 1×24 jam.');
        
        // Reset form
        this.reset();
        
        // In production, send data to server via AJAX
        /*
        const formData = new FormData(this);
        
        fetch('/api/contact', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Terima kasih! Pendaftaran Anda telah diterima.');
                this.reset();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan. Silakan coba lagi.');
        });
        */
    });
}

// ==================== LAZY LOADING IMAGES ====================
if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                if (img.dataset.src) {
                    img.src = img.dataset.src;
                    img.classList.add('loaded');
                    observer.unobserve(img);
                }
            }
        });
    });
    
    const lazyImages = document.querySelectorAll('img[data-src]');
    lazyImages.forEach(img => imageObserver.observe(img));
}

// ==================== ACTIVE NAVBAR LINK ON SCROLL ====================
const sections = document.querySelectorAll('section[id]');
const navLinks = document.querySelectorAll('.nav-link');

window.addEventListener('scroll', () => {
    let current = '';
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        
        if (window.pageYOffset >= (sectionTop - 100)) {
            current = section.getAttribute('id');
        }
    });
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${current}`) {
            link.classList.add('active');
        }
    });
});

// ==================== BACK TO TOP BUTTON ====================
const backToTopButton = document.createElement('button');
backToTopButton.innerHTML = '<i class="fas fa-arrow-up"></i>';
backToTopButton.className = 'back-to-top';
backToTopButton.style.cssText = `
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: linear-gradient(135deg, #7B2CBF, #9D4EDD);
    color: white;
    border: none;
    cursor: pointer;
    display: none;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    box-shadow: 0 4px 12px rgba(123, 44, 191, 0.3);
    z-index: 999;
    transition: all 0.3s ease;
`;

document.body.appendChild(backToTopButton);

window.addEventListener('scroll', () => {
    if (window.pageYOffset > 300) {
        backToTopButton.style.display = 'flex';
    } else {
        backToTopButton.style.display = 'none';
    }
});

backToTopButton.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

backToTopButton.addEventListener('mouseenter', function() {
    this.style.transform = 'translateY(-5px)';
});

backToTopButton.addEventListener('mouseleave', function() {
    this.style.transform = 'translateY(0)';
});

// ==================== CONSOLE MESSAGE ====================
console.log('%c🚀 COGLINE - Line of Future', 'font-size: 20px; font-weight: bold; color: #7B2CBF;');
console.log('%cDeveloped with ❤️ for hospitality industry', 'font-size: 12px; color: #64748b;');