<?php

namespace App\Http\Controllers;

use App\Models\PricingPackage;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data pricing dan testimonials dari database
        $packages = PricingPackage::with('features')
            ->active()
            ->ordered()
            ->get();
            
        $testimonials = Testimonial::active()
            ->ordered()
            ->get();
            
        return view('home', compact('packages', 'testimonials'));
    }
}