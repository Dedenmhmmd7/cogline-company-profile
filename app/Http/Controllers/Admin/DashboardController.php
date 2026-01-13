<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPackage;
use App\Models\Testimonial;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pricingCount = PricingPackage::count();
        $testimonialCount = Testimonial::count();
        
        // Check if ContactSubmission model exists
        $contactCount = 0;
        $newContactCount = 0;
        $latestContacts = collect(); // Empty collection
        
        if (class_exists(ContactSubmission::class)) {
            try {
                $contactCount = ContactSubmission::count();
                $newContactCount = ContactSubmission::where('status', 'new')->count();
                $latestContacts = ContactSubmission::orderBy('created_at', 'desc')
                    ->limit(5)
                    ->get();
            } catch (\Exception $e) {
                // Table doesn't exist yet, use default values
            }
        }
        
        return view('admin.dashboard', compact(
            'pricingCount', 
            'testimonialCount', 
            'contactCount', 
            'newContactCount',
            'latestContacts'
        ));
    }
}