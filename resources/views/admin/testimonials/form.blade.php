@extends('admin.layout')

@section('title', isset($testimonial) ? 'Edit Testimonial' : 'Tambah Testimonial')
@section('page-title', isset($testimonial) ? 'Edit Testimonial' : 'Tambah Testimonial')

@section('content')
<div class="card">
    <form action="{{ isset($testimonial) ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" method="POST">
        @csrf
        @if(isset($testimonial))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Nama Lengkap *</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $testimonial->name ?? '') }}" required>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group">
                <label for="position">Posisi *</label>
                <input type="text" name="position" id="position" class="form-control" value="{{ old('position', $testimonial->position ?? '') }}" placeholder="General Manager" required>
            </div>

            <div class="form-group">
                <label for="company">Perusahaan *</label>
                <input type="text" name="company" id="company" class="form-control" value="{{ old('company', $testimonial->company ?? '') }}" placeholder="Grand Hotel Jakarta" required>
            </div>
        </div>

        <div class="form-group">
            <label for="content">Konten Testimonial *</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $testimonial->content ?? '') }}</textarea>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group">
                <label for="rating">Rating *</label>
                <select name="rating" id="rating" class="form-control" required>
                    @for($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}" {{ old('rating', $testimonial->rating ?? 5) == $i ? 'selected' : '' }}>
                            {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="form-group">
                <label for="order">Order *</label>
                <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $testimonial->order ?? 1) }}" required>
            </div>
        </div>

        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Batal
            </a>
        </div>
    </form>
</div>
@endsection