@extends('admin.layout')

@section('title', isset($pricing) ? 'Edit Paket' : 'Tambah Paket')
@section('page-title', isset($pricing) ? 'Edit Paket' : 'Tambah Paket')

@section('content')
<div class="card">
    <form action="{{ isset($pricing) ? route('admin.pricing.update', $pricing) : route('admin.pricing.store') }}" method="POST">
        @csrf
        @if(isset($pricing))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Nama Paket *</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $pricing->name ?? '') }}" required>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group">
                <label for="price">Harga *</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ old('price', $pricing->price ?? '') }}" placeholder="150K atau Custom" required>
            </div>

            <div class="form-group">
                <label for="period">Periode</label>
                <input type="text" name="period" id="period" class="form-control" value="{{ old('period', $pricing->period ?? '') }}" placeholder="/kamar/bulan">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group">
                <label for="badge">Badge</label>
                <input type="text" name="badge" id="badge" class="form-control" value="{{ old('badge', $pricing->badge ?? '') }}" placeholder="Terpopuler">
            </div>

            <div class="form-group">
                <label for="order">Order *</label>
                <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $pricing->order ?? 1) }}" required>
            </div>
        </div>

        <div class="form-group">
            <div class="checkbox-wrapper">
                <input type="checkbox" name="is_featured" id="is_featured" {{ old('is_featured', $pricing->is_featured ?? false) ? 'checked' : '' }}>
                <label for="is_featured">Featured Package</label>
            </div>
        </div>

        <hr style="margin: 2rem 0;">

        <div class="form-group">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                <label style="margin: 0;">Features *</label>
                <button type="button" class="btn btn-sm btn-primary" onclick="addFeature()">
                    <i class="fas fa-plus"></i> Tambah Feature
                </button>
            </div>

            <div id="features-container">
                @if(isset($pricing) && $pricing->features->count() > 0)
                    @foreach($pricing->features as $index => $feature)
                    <div class="feature-item" style="display: flex; gap: 0.75rem; margin-bottom: 0.75rem; align-items: center;">
                        <input type="text" name="features[{{ $index }}][text]" class="form-control" value="{{ $feature->feature_text }}" placeholder="Nama feature" required style="flex: 1;">
                        <div class="checkbox-wrapper" style="min-width: 120px;">
                            <input type="checkbox" name="features[{{ $index }}][included]" id="feature_{{ $index }}" {{ $feature->is_included ? 'checked' : '' }}>
                            <label for="feature_{{ $index }}">Included</label>
                        </div>
                        <button type="button" class="btn btn-sm btn-danger" onclick="removeFeature(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    @endforeach
                @else
                    <div class="feature-item" style="display: flex; gap: 0.75rem; margin-bottom: 0.75rem; align-items: center;">
                        <input type="text" name="features[0][text]" class="form-control" placeholder="Nama feature" required style="flex: 1;">
                        <div class="checkbox-wrapper" style="min-width: 120px;">
                            <input type="checkbox" name="features[0][included]" id="feature_0" checked>
                            <label for="feature_0">Included</label>
                        </div>
                        <button type="button" class="btn btn-sm btn-danger" onclick="removeFeature(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="{{ route('admin.pricing.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Batal
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
let featureIndex = {{ isset($pricing) ? $pricing->features->count() : 1 }};

function addFeature() {
    const container = document.getElementById('features-container');
    const featureHtml = `
        <div class="feature-item" style="display: flex; gap: 0.75rem; margin-bottom: 0.75rem; align-items: center;">
            <input type="text" name="features[${featureIndex}][text]" class="form-control" placeholder="Nama feature" required style="flex: 1;">
            <div class="checkbox-wrapper" style="min-width: 120px;">
                <input type="checkbox" name="features[${featureIndex}][included]" id="feature_${featureIndex}" checked>
                <label for="feature_${featureIndex}">Included</label>
            </div>
            <button type="button" class="btn btn-sm btn-danger" onclick="removeFeature(this)">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', featureHtml);
    featureIndex++;
}

function removeFeature(button) {
    const container = document.getElementById('features-container');
    if (container.children.length > 1) {
        button.parentElement.remove();
    } else {
        alert('Minimal harus ada 1 feature!');
    }
}
</script>
@endpush