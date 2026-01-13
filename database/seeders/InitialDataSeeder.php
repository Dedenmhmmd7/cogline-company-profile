<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PricingPackage;
use App\Models\PricingFeature;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@cogline.id',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // Pricing Package 1 - Starter
        $starter = PricingPackage::create([
            'name' => 'Starter',
            'price' => '150K',
            'period' => '/kamar/bulan',
            'is_featured' => false,
            'order' => 1,
        ]);

        $starterFeatures = [
            ['feature_text' => '50+ TV Channels', 'is_included' => true],
            ['feature_text' => 'Basic VOD (500+ titles)', 'is_included' => true],
            ['feature_text' => 'Hotel Information', 'is_included' => true],
            ['feature_text' => 'HD Streaming', 'is_included' => true],
            ['feature_text' => 'Email Support', 'is_included' => true],
            ['feature_text' => 'Interactive Services', 'is_included' => false],
            ['feature_text' => 'Mobile Casting', 'is_included' => false],
        ];

        foreach ($starterFeatures as $index => $feature) {
            PricingFeature::create([
                'pricing_package_id' => $starter->id,
                'feature_text' => $feature['feature_text'],
                'is_included' => $feature['is_included'],
                'order' => $index + 1,
            ]);
        }

        // Pricing Package 2 - Professional
        $professional = PricingPackage::create([
            'name' => 'Professional',
            'price' => '250K',
            'period' => '/kamar/bulan',
            'is_featured' => true,
            'badge' => 'Terpopuler',
            'order' => 2,
        ]);

        $professionalFeatures = [
            ['feature_text' => '150+ TV Channels', 'is_included' => true],
            ['feature_text' => 'Premium VOD (2000+ titles)', 'is_included' => true],
            ['feature_text' => 'Hotel Information', 'is_included' => true],
            ['feature_text' => '4K Streaming', 'is_included' => true],
            ['feature_text' => 'Interactive Services', 'is_included' => true],
            ['feature_text' => 'Mobile Casting', 'is_included' => true],
            ['feature_text' => 'Priority Support', 'is_included' => true],
            ['feature_text' => 'Analytics Dashboard', 'is_included' => true],
        ];

        foreach ($professionalFeatures as $index => $feature) {
            PricingFeature::create([
                'pricing_package_id' => $professional->id,
                'feature_text' => $feature['feature_text'],
                'is_included' => $feature['is_included'],
                'order' => $index + 1,
            ]);
        }

        // Pricing Package 3 - Enterprise
        $enterprise = PricingPackage::create([
            'name' => 'Enterprise',
            'price' => 'Custom',
            'period' => null,
            'is_featured' => false,
            'order' => 3,
        ]);

        $enterpriseFeatures = [
            ['feature_text' => 'Unlimited Channels', 'is_included' => true],
            ['feature_text' => 'Custom Content Library', 'is_included' => true],
            ['feature_text' => 'Full Customization', 'is_included' => true],
            ['feature_text' => '4K/8K Streaming', 'is_included' => true],
            ['feature_text' => 'All Interactive Features', 'is_included' => true],
            ['feature_text' => 'Multi-Property Support', 'is_included' => true],
            ['feature_text' => 'Dedicated Account Manager', 'is_included' => true],
            ['feature_text' => '24/7 Support', 'is_included' => true],
            ['feature_text' => 'White-Label Option', 'is_included' => true],
        ];

        foreach ($enterpriseFeatures as $index => $feature) {
            PricingFeature::create([
                'pricing_package_id' => $enterprise->id,
                'feature_text' => $feature['feature_text'],
                'is_included' => $feature['is_included'],
                'order' => $index + 1,
            ]);
        }

        // Testimonials
        Testimonial::create([
            'name' => 'Budi Santoso',
            'position' => 'General Manager',
            'company' => 'Grand Hotel Jakarta',
            'content' => 'Sistem IPTV dari COGLINE sangat meningkatkan kepuasan tamu kami. Interface yang mudah dan konten yang lengkap membuat tamu betah di kamar.',
            'rating' => 5,
            'order' => 1,
        ]);

        Testimonial::create([
            'name' => 'Sarah Chen',
            'position' => 'IT Director',
            'company' => 'Paradise Resort Bali',
            'content' => 'Instalasi cepat, support responsif, dan fitur analytics membantu kami memahami kebutuhan tamu. ROI tercapai dalam 6 bulan!',
            'rating' => 5,
            'order' => 2,
        ]);

        Testimonial::create([
            'name' => 'Ahmad Rahman',
            'position' => 'Owner',
            'company' => 'Boutique Hotel Bandung',
            'content' => 'Solusi terbaik untuk hotel butik kami. Harga terjangkau dengan fitur lengkap. Tamu international sangat appreciate multi-language support.',
            'rating' => 5,
            'order' => 3,
        ]);
    }
}