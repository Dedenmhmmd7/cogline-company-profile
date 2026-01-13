<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPackage;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pricingCount = PricingPackage::count();
        $testimonialCount = Testimonial::count();
        
        return view('admin.dashboard', compact('pricingCount', 'testimonialCount'));
    }
}