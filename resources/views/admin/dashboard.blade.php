@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-card-icon primary">
            <i class="fas fa-tags"></i>
        </div>
        <h3>{{ $pricingCount }}</h3>
        <p>Paket Pricing</p>
    </div>

    <div class="stat-card">
        <div class="stat-card-icon secondary">
            <i class="fas fa-star"></i>
        </div>
        <h3>{{ $testimonialCount }}</h3>
        <p>Testimonials</p>
    </div>

    <div class="stat-card">
        <div class="stat-card-icon primary">
            <i class="fas fa-envelope"></i>
        </div>
        <h3>{{ $contactCount }}</h3>
        <p>Total Kontak</p>
    </div>

    <div class="stat-card">
        <div class="stat-card-icon secondary">
            <i class="fas fa-bell"></i>
        </div>
        <h3>{{ $newContactCount }}</h3>
        <p>Kontak Baru</p>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Selamat Datang di Admin Panel!</h3>
    </div>
    <p>Kelola konten pricing, testimonials, dan kontak untuk website COGLINE.</p>
    <div style="margin-top: 1.5rem; display: flex; gap: 1rem; flex-wrap: wrap;">
        <a href="{{ route('admin.pricing.index') }}" class="btn btn-primary">
            <i class="fas fa-tags"></i> Kelola Pricing
        </a>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
            <i class="fas fa-star"></i> Kelola Testimonials
        </a>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-success">
            <i class="fas fa-envelope"></i> Kelola Kontak
            @if($newContactCount > 0)
                <span class="badge badge-warning" style="margin-left: 0.5rem;">{{ $newContactCount }}</span>
            @endif
        </a>
    </div>
</div>

@if($latestContacts->count() > 0)
<div class="card">
    <div class="card-header">
        <h3>Kontak Terbaru</h3>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-primary">
            Lihat Semua <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Kamar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($latestContacts as $contact)
            <tr style="{{ $contact->status == 'new' ? 'background: #fef3c7;' : '' }}">
                <td>
                    <small>{{ $contact->created_at->format('d/m/Y H:i') }}</small>
                </td>
                <td>
                    <strong>{{ $contact->name }}</strong>
                    @if($contact->status == 'new')
                        <span class="badge badge-warning" style="font-size: 0.7rem;">NEW</span>
                    @endif
                </td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->room_count }}</td>
                <td>
                    <span class="badge {{ $contact->status_badge }}">
                        {{ $contact->status_text }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

@push('styles')
<style>
    .badge-primary {
        background: #ddd6fe;
        color: #7B2CBF;
    }
</style>
@endpush
@endsection