@extends('layouts.app')

@section('title', 'Cogline - Solusi IPTV untuk Hotel di Indonesia
')

@section('content')
<!-- Hero Section -->
<section id="home" class="hero">
    <div class="hero-background">
        <div class="hero-overlay"></div>
    </div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">Solusi IPTV Modern untuk Hotel Anda</h1>
                <p class="hero-subtitle">Tingkatkan pengalaman tamu dengan sistem IPTV interaktif, streaming berkualitas tinggi, dan manajemen konten yang mudah.</p>
                <div class="hero-buttons">
                    <a href="#pricing" class="btn btn-primary btn-lg">Lihat Paket</a>
                    <a href="#contact" class="btn btn-secondary btn-lg">Hubungi Kami</a>
                </div>
                <div class="hero-stats">
                    <div class="stat-item">
                        <h3>500+</h3>
                        <p>Hotel Partner</p>
                    </div>
                    <div class="stat-item">
                        <h3>50K+</h3>
                        <p>Kamar Terlayani</p>
                    </div>
                    <div class="stat-item">
                        <h3>99.9%</h3>
                        <p>Uptime</p>
                    </div>
                </div>
            </div>
            <div class="hero-image">
                <div class="hero-graphic">
                    <div class="floating-card card-1">
                        <i class="fas fa-tv"></i>
                        <span>Live TV</span>
                    </div>
                    <div class="floating-card card-2">
                        <i class="fas fa-film"></i>
                        <span>VOD</span>
                    </div>
                    <div class="floating-card card-3">
                        <i class="fas fa-mobile-alt"></i>
                        <span>Mobile Cast</span>
                    </div>
                    <div class="floating-card card-4">
                        <i class="fas fa-chart-line"></i>
                        <span>Analytics</span>
                    </div>
                    <div class="center-icon">
                        <i class="fas fa-broadcast-tower"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section (Minimalis) -->
<section id="about" class="about-minimal">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <span class="section-label">Tentang Kami</span>
                <h2>COGLINE - Line of Future</h2>
                <p>Kami adalah penyedia solusi IPTV terkemuka di Indonesia dengan pengalaman lebih dari 10 tahun dalam industri teknologi broadcasting dan streaming. COGLINE hadir untuk menghadirkan transformasi digital bagi industri perhotelan dengan teknologi IPTV yang inovatif, reliable, dan mudah digunakan.</p>
                <div class="about-features">
                    <div class="about-feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Pengalaman 10+ tahun di industri IPTV</span>
                    </div>
                    <div class="about-feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Melayani 500+ hotel di seluruh Indonesia</span>
                    </div>
                    <div class="about-feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Dukungan teknis 24/7 yang responsif</span>
                    </div>
                    <div class="about-feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Teknologi cloud modern dengan 99.9% uptime</span>
                    </div>
                </div>
            </div>
            <div class="about-values">
                <div class="value-box">
                    <i class="fas fa-eye"></i>
                    <h4>Visi</h4>
                    <p>Menjadi penyedia solusi IPTV terdepan di Indonesia yang menghadirkan pengalaman digital terbaik bagi tamu hotel.</p>
                </div>
                <div class="value-box">
                    <i class="fas fa-bullseye"></i>
                    <h4>Misi</h4>
                    <p>Menghadirkan teknologi IPTV berkualitas tinggi, memberikan dukungan terbaik, dan terus berinovasi untuk kesuksesan hotel partner.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="features">
    <div class="container">
        <div class="section-header">
            <h2>Fitur Unggulan</h2>
            <p>Teknologi terkini untuk memberikan pengalaman terbaik bagi tamu hotel Anda</p>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-play-circle"></i>
                </div>
                <h3>Streaming HD/4K</h3>
                <p>Kualitas video tinggi dengan teknologi adaptive streaming untuk pengalaman menonton yang sempurna.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-satellite-dish"></i>
                </div>
                <h3>Live TV Channels</h3>
                <p>Ratusan saluran TV lokal dan internasional dengan EPG terintegrasi.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-film"></i>
                </div>
                <h3>Video On Demand</h3>
                <p>Koleksi film dan series dengan update konten berkala.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <h3>Hotel Information</h3>
                <p>Tampilkan informasi hotel, fasilitas, menu restoran, dan promosi khusus.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-concierge-bell"></i>
                </div>
                <h3>Interactive Services</h3>
                <p>Pemesanan layanan kamar, spa, restoran langsung dari TV.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-language"></i>
                </div>
                <h3>Multi-Language</h3>
                <p>Dukungan berbagai bahasa untuk tamu internasional.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3>Mobile Casting</h3>
                <p>Cast konten dari smartphone tamu ke TV kamar dengan mudah.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Analytics Dashboard</h3>
                <p>Monitor penggunaan, preferensi tamu, dan revenue dari layanan interaktif.</p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section id="pricing" class="pricing">
    <div class="container">
        <div class="section-header">
            <h2>Paket Harga Transparan</h2>
            <p>Pilih paket yang sesuai dengan kebutuhan hotel Anda</p>
        </div>
        
        <div class="pricing-grid">
            @foreach($packages as $package)
            <div class="pricing-card {{ $package->is_featured ? 'featured' : '' }}">
                @if($package->badge)
                <div class="badge">{{ $package->badge }}</div>
                @endif
                
                <h3>{{ $package->name }}</h3>
                
                <div class="price">
                    @if($package->period)
                        <span class="currency">Rp</span>
                        <span class="amount">{{ $package->price }}</span>
                        <span class="period">{{ $package->period }}</span>
                    @else
                        <span class="amount">{{ $package->price }}</span>
                    @endif
                </div>
                
                <ul class="pricing-features">
                    @foreach($package->features as $feature)
                    <li class="{{ !$feature->is_included ? 'disabled' : '' }}">
                        <i class="fas {{ $feature->is_included ? 'fa-check' : 'fa-times' }}"></i>
                        {{ $feature->feature_text }}
                    </li>
                    @endforeach
                </ul>
                
                <a href="#contact" class="btn {{ $package->is_featured ? 'btn-primary' : 'btn-outline' }}">
                    Mulai Sekarang
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials">
    <div class="container">
        <div class="section-header">
            <h2>Dipercaya oleh Hotel Terkemuka</h2>
            <p>Lihat apa kata mereka tentang layanan kami</p>
        </div>
        
        <div class="testimonials-grid">
            @foreach($testimonials as $testimonial)
            <div class="testimonial-card">
                <div class="stars">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star {{ $i <= $testimonial->rating ? '' : 'text-gray' }}"></i>
                    @endfor
                </div>
                
                <p>"{{ $testimonial->content }}"</p>
                
                <div class="testimonial-author">
                    <div class="author-info">
                        <h4>{{ $testimonial->name }}</h4>
                        <p>{{ $testimonial->position }}, {{ $testimonial->company }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta">
    <div class="container">
        <div class="cta-content">
            <h2>Siap Meningkatkan Pengalaman Tamu Hotel Anda?</h2>
            <p>Dapatkan demo gratis dan konsultasi dengan tim ahli kami</p>
            <div class="cta-buttons">
                <a href="#pricing" class="btn btn-primary btn-lg">Lihat  Paket</a>
                <a href="#contact" class="btn btn-secondary btn-lg">Jadwalkan Konsultasi</a>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section - New Design -->
<section id="contact" class="contact">
    <div class="container">
        <div class="contact-wrapper">
            <!-- Left Side - Contact Info -->
            <div class="contact-left">
                <h2>Hubungi Kami</h2>
                <p class="contact-description">Punya pertanyaan? Tim kami siap membantu Anda. Hubungi kami melalui channel yang tersedia atau kunjungi kantor kami langsung.</p>
                
                <div class="contact-info-list">
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Alamat Kantor</h4>
                            <p>Panjalu, Ciamis<br>Jawa Barat, Indonesia</p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Telepon / WhatsApp</h4>
                            <p>+62 812-xxxx-xxxx</p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Email</h4>
                            <p>info@cogline.id</p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Jam Operasional</h4>
                            <p>Senin - Sabtu: 08:00 - 17:00 WIB<br>Minggu: Libur</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Side - Contact Form -->
            <div class="contact-right">
                <div class="promo-box">
                    <h3>Dapatkan Promo Spesial</h3>
                    <p class="promo-description">Daftar sekarang dan nikmati diskon hingga 25% untuk 2 bulan pertama!</p>
                    
                    <form class="contact-form" id="contactForm">
                        @csrf
                        <div class="form-group">
                            <input type="text" id="name" name="name" placeholder="Nama lengkap *" required>
                        </div>
                        
                        <div class="form-group">
                            <input type="tel" id="phone" name="phone" placeholder="Nomor WhatsApp *" required>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" id="address" name="address" placeholder="Alamat lengkap *" required>
                        </div>
                        
                        <div class="form-group">
                            <input type="email" id="email" name="email" placeholder="Email (opsional)">
                        </div>
                        
                        <div class="form-group">
                            <select id="room_count" name="room_count" required>
                                <option value="">Jumlah Kamar *</option>
                                <option value="10-50">10-50 kamar</option>
                                <option value="51-100">51-100 kamar</option>
                                <option value="101-200">101-200 kamar</option>
                                <option value="200+">200+ kamar</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <textarea id="message" name="message" rows="4" placeholder="Pesan (opsional)"></textarea>
                        </div>
                        
                        <button type="submit" class="btn-daftar" id="submitBtn">
                            <i class="fas fa-paper-plane"></i> Hubungi Sekarang
                        </button>
                        
                        <p class="form-note">* Syarat dan ketentuan berlaku. Tim kami akan menghubungi Anda dalam 1×24 jam.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Notification Modal HTML -->
<div class="notification-overlay" id="notificationOverlay">
    <div class="notification-modal">
        <div class="notification-icon success" id="notificationIcon">
            <div class="checkmark"></div>
        </div>
        <h2 class="notification-title" id="notificationTitle">Berhasil!</h2>
        <p class="notification-message" id="notificationMessage">Pesan Anda telah dikirim.</p>
        <button class="notification-button" onclick="closeNotification()">OK, Mengerti</button>
    </div>
</div>

<!-- Notification JavaScript -->
<script>
function showNotification(type, title, message) {
    const overlay = document.getElementById('notificationOverlay');
    const icon = document.getElementById('notificationIcon');
    const titleEl = document.getElementById('notificationTitle');
    const messageEl = document.getElementById('notificationMessage');
    
    // Reset icon classes
    icon.className = 'notification-icon';
    
    // Set content based on type
    if (type === 'success') {
        icon.classList.add('success');
        icon.innerHTML = '<div class="checkmark"></div>';
        titleEl.textContent = title || 'Berhasil!';
    } else if (type === 'error') {
        icon.classList.add('error');
        icon.innerHTML = '<div class="cross"></div>';
        titleEl.textContent = title || 'Oops...';
    }
    
    messageEl.textContent = message;
    
    // Show overlay
    overlay.classList.add('active');
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
}

function closeNotification() {
    const overlay = document.getElementById('notificationOverlay');
    overlay.classList.remove('active');
    
    // Restore body scroll
    document.body.style.overflow = '';
}

// Close on overlay click
document.getElementById('notificationOverlay').addEventListener('click', function(e) {
    if (e.target === this) {
        closeNotification();
    }
});

// Close on ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeNotification();
    }
});
</script>

<!-- Contact Form Script dengan Custom Notification -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalHtml = submitBtn.innerHTML;
            
            // Disable button and show loading
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
            
            // Get form data
            const formData = new FormData(this);
            
            // Send AJAX request
            fetch('{{ route("contact.store") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show custom success notification
                    showNotification(
                        'success',
                        'Terima Kasih!',
                        data.message
                    );
                    
                    // Reset form
                    contactForm.reset();
                } else {
                    throw new Error(data.message || 'Terjadi kesalahan');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                
                // Show custom error notification
                showNotification(
                    'error',
                    'Terjadi Kesalahan',
                    error.message || 'Mohon coba lagi dalam beberapa saat.'
                );
            })
            .finally(() => {
                // Re-enable button
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalHtml;
            });
        });
    }
});
</script>

@endsection

@push('styles')
@endpush