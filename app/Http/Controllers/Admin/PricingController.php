<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPackage;
use App\Models\PricingFeature;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $packages = PricingPackage::with('features')->ordered()->get();
        return view('admin.pricing.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.pricing.create');
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'period' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'features' => 'required|array|min:1',
            'features.*.text' => 'required|string',
        ]);

        try {
            // Buat package
            $package = PricingPackage::create([
                'name' => $request->name,
                'price' => $request->price,
                'period' => $request->period,
                'is_featured' => $request->has('is_featured'),
                'badge' => $request->badge,
                'order' => $request->order,
            ]);

            // Buat features
            if ($request->has('features')) {
                foreach ($request->features as $index => $feature) {
                    PricingFeature::create([
                        'pricing_package_id' => $package->id,
                        'feature_text' => $feature['text'],
                        'is_included' => isset($feature['included']),
                        'order' => $index + 1,
                    ]);
                }
            }

            return redirect()
                ->route('admin.pricing.index')
                ->with('success', 'Paket berhasil ditambahkan!');
                
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit(PricingPackage $pricing)
    {
        $pricing->load('features');
        return view('admin.pricing.edit', compact('pricing'));
    }

    public function update(Request $request, PricingPackage $pricing)
    {
        // Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'period' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'features' => 'required|array|min:1',
            'features.*.text' => 'required|string',
        ]);

        try {
            // Update package
            $pricing->update([
                'name' => $request->name,
                'price' => $request->price,
                'period' => $request->period,
                'is_featured' => $request->has('is_featured'),
                'badge' => $request->badge,
                'order' => $request->order,
            ]);

            // Delete old features
            $pricing->features()->delete();
            
            // Create new features
            if ($request->has('features')) {
                foreach ($request->features as $index => $feature) {
                    PricingFeature::create([
                        'pricing_package_id' => $pricing->id,
                        'feature_text' => $feature['text'],
                        'is_included' => isset($feature['included']),
                        'order' => $index + 1,
                    ]);
                }
            }

            return redirect()
                ->route('admin.pricing.index')
                ->with('success', 'Paket berhasil diupdate!');
                
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(PricingPackage $pricing)
    {
        try {
            $pricing->delete();
            return redirect()
                ->route('admin.pricing.index')
                ->with('success', 'Paket berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function toggleActive(PricingPackage $pricing)
    {
        try {
            $pricing->update(['is_active' => !$pricing->is_active]);
            return back()->with('success', 'Status berhasil diubah!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}