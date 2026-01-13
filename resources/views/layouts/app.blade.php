<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'COGLINE - Line of Future')</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/img/logo.png">
    <link rel="apple-touch-icon" href="/img/logo.png">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
                <a href="/" class="logo">
            <img src="/img/cogline.png" class="logo-img">
        </a>
                <span class="tagline">Line of Future</span>
            </div>
            
            <div class="navbar-menu" id="navbarMenu">
                <a href="#home" class="nav-link">Beranda</a>
                <a href="#about" class="nav-link">Tentang Kami</a>
                <a href="#features" class="nav-link">Fitur</a>
                <a href="#pricing" class="nav-link">Harga</a>
                <a href="#contact" class="btn btn-primary">Hubungi Kami</a>
            </div>
            
            <div class="navbar-burger" id="navbarBurger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <!-- Column 1 - Logo & Description & Map -->
            <div class="footer-col-left">
                <div class="footer-brand">
                    <i class="fas fa-tv"></i>
                    <div>
                        <h3>COGLINE</h3>
                        <p class="footer-tagline">Line of Future</p>
                    </div>
                </div>
                
                <p class="footer-description">COGLINE – Menyediakan layanan IPTV berkualitas untuk hotel di seluruh Indonesia dengan teknologi streaming modern dan manajemen konten yang mudah.</p>
                
                <!-- Google Maps Embed -->
                <div class="footer-map">
                    <div class="map-header">
                        <h4>GUSTI BUSINESS DISTRICT</h4>
                        <a href="https://maps.google.com/?q=GUSTI+BUSINESS+DISTRICT" target="_blank" class="map-link">Lihat peta lebih besar</a>
                    </div>
                    <div class="map-container">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6876.814492671382!2d108.26575!3d-7.118395!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f47ebd90881f3%3A0xc1c94a4cfe7571a!2sGUSTI%20BUSINESS%20DISTRICT!5e1!3m2!1sid!2sid!4v1767582013209!5m2!1sid!2sid" 
                            width="100%" 
                            height="250" 
                            style="border:0; border-radius: 12px;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
            
            <!-- Column 2 - Tautan (Links) -->
            <div class="footer-col-middle">
                <h4>Tautan</h4>
                <div class="footer-links-wrapper">
                    <a href="#home" class="footer-link-item">
                        <span>Beranda</span>
                    </a>
                    <a href="#about" class="footer-link-item">
                        <span>Tentang Kami</span>
                    </a>
                    <a href="#features" class="footer-link-item">
                        <span>Fitur</span>
                    </a>
                    <a href="#pricing" class="footer-link-item">
                        <span>Harga</span>
                    </a>
                </div>
            </div>
            
            <!-- Column 3 - Kontak -->
            <div class="footer-col-right">
                <h4>Kontak</h4>
                <ul class="footer-contact">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Panjalu, Ciamis, Jawa Barat, Indonesia</span>
                    </li>
                    <li>
                        <i class="fas fa-phone"></i>
                        <span>+62 812-xxxx-xxxx</span>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <span>info@cogline.id</span>
                    </li>
                    <li>
                        <i class="fas fa-clock"></i>
                        <span>Senin – Sabtu: 08:00 – 17:00 WIB<br>Minggu: Libur</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Footer Bottom - Social Links -->
        <div class="footer-bottom">
            <div class="social-links">
                <a href="#" class="social-icon" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-icon" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="social-icon" aria-label="WhatsApp">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="#" class="social-icon" aria-label="Website">
                    <i class="fas fa-globe"></i>
                </a>
            </div>
            
            <p class="copyright">&copy; {{ date('Y') }} COGLINE - Line of Future. All rights reserved.</p>
        </div>
    </div>
</footer>

<style>
/* Footer Styles */
.footer {
    background: #1a1d2e;
    color: #a0aec0;
    padding: 4rem 0 2rem;
}

.footer-content {
    display: grid;
    grid-template-columns: 1.5fr 0.7fr 1fr;
    gap: 3rem;
    margin-bottom: 3rem;
}

/* Column 1 - Left */
.footer-col-left {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.footer-brand {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 0.5rem;
}

.footer-brand i {
    font-size: 2.5rem;
    background: linear-gradient(135deg, #FF6B35 0%, #E84855 50%, #DA627D 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.footer-brand h3 {
    font-size: 1.75rem;
    font-weight: 800;
    background: linear-gradient(135deg, #7B2CBF 0%, #9D4EDD 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin: 0;
    line-height: 1;
}

.footer-tagline {
    font-size: 0.75rem;
    color: #718096;
    margin: 0;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.footer-description {
    font-size: 0.95rem;
    line-height: 1.7;
    color: #a0aec0;
}

/* Google Maps */
.footer-map {
    margin-top: 0.5rem;
}

.map-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.75rem;
}

.map-header h4 {
    font-size: 0.85rem;
    font-weight: 700;
    color: #e2e8f0;
    letter-spacing: 1px;
    margin: 0;
}

.map-link {
    font-size: 0.85rem;
    color: #FF6B35;
    text-decoration: none;
    transition: color 0.3s;
}

.map-link:hover {
    color: #E84855;
}

.map-container {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    background: #0f1419;
}

.map-container iframe {
    display: block;
    border: 0;
    border-radius: 12px;
}

/* Column 2 - Middle (Tautan) - Layout Vertikal seperti Kontak */
.footer-col-middle h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: #e2e8f0;
    margin-bottom: 1.5rem;
}

.footer-links-wrapper {
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
}

.footer-link-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    color: #a0aec0;
    text-decoration: none;
    font-size: 0.95rem;
    transition: all 0.3s;
}

.footer-link-item i {
    font-size: 1.1rem;
    color: #FF6B35;
    width: 20px;
    flex-shrink: 0;
}

.footer-link-item:hover {
    color: #FF6B35;
    transform: translateX(5px);
}

.footer-link-item:hover i {
    color: #E84855;
}

/* Column 3 - Right (Kontak) */
.footer-col-right h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: #e2e8f0;
    margin-bottom: 1.5rem;
}

.footer-contact {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-contact li {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.25rem;
    align-items: flex-start;
}

.footer-contact i {
    font-size: 1.1rem;
    color: #FF6B35;
    width: 20px;
    flex-shrink: 0;
    margin-top: 2px;
}

.footer-contact span {
    color: #a0aec0;
    font-size: 0.95rem;
    line-height: 1.6;
}

/* Footer Bottom */
.footer-bottom {
    padding-top: 2rem;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1.5rem;
}

.social-links {
    display: flex;
    gap: 1rem;
}

.social-icon {
    width: 45px;
    height: 45px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #a0aec0;
    font-size: 1.1rem;
    transition: all 0.3s;
    text-decoration: none;
}

.social-icon:hover {
    background: linear-gradient(135deg, #FF6B35 0%, #E84855 100%);
    color: white;
    transform: translateY(-3px);
}

.copyright {
    color: #718096;
    font-size: 0.9rem;
    text-align: center;
    margin: 0;
}

/* Responsive Design */
@media (max-width: 992px) {
    .footer-content {
        grid-template-columns: 1fr;
        gap: 2.5rem;
    }
    
    .footer-col-middle,
    .footer-col-right {
        padding-left: 0;
    }
}

@media (max-width: 768px) {
    .footer {
        padding: 3rem 0 2rem;
    }
    
    .footer-brand {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
    
    .footer-brand i {
        font-size: 2rem;
    }
    
    .footer-brand h3 {
        font-size: 1.5rem;
    }
    
    .map-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
    
    .social-links {
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .social-icon {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
}
</style>
    <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>