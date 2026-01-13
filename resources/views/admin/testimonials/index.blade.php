@extends('admin.layout')

@section('title', 'Kelola Testimonials')
@section('page-title', 'Kelola Testimonials')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Daftar Testimonials</h3>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Testimonial
        </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Posisi & Perusahaan</th>
                <th>Rating</th>
                <th>Status</th>
                <th>Order</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($testimonials as $testimonial)
            <tr>
                <td><strong>{{ $testimonial->name }}</strong></td>
                <td>{{ $testimonial->position }}<br><small style="color: #94a3b8;">{{ $testimonial->company }}</small></td>
                <td>
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star" style="color: {{ $i <= $testimonial->rating ? '#f59e0b' : '#e2e8f0' }};"></i>
                    @endfor
                </td>
                <td>
                    @if($testimonial->is_active)
                        <span class="badge badge-success">Aktif</span>
                    @else
                        <span class="badge badge-danger">Nonaktif</span>
                    @endif
                </td>
                <td>{{ $testimonial->order }}</td>
                <td>
                    <div style="display: flex; gap: 0.5rem;">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-primary" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        
                        <form action="{{ route('admin.testimonials.toggle-active', $testimonial) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm {{ $testimonial->is_active ? 'btn-danger' : 'btn-success' }}" title="{{ $testimonial->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                <i class="fas fa-{{ $testimonial->is_active ? 'eye-slash' : 'eye' }}"></i>
                            </button>
                        </form>
                        
                        <form id="delete-form-{{ $testimonial->id }}" action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" title="Hapus" onclick="confirmDelete('delete-form-{{ $testimonial->id }}', '{{ $testimonial->name }}')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; padding: 2rem; color: #94a3b8;">
                    <i class="fas fa-inbox" style="font-size: 3rem; margin-bottom: 1rem; display: block;"></i>
                    Belum ada data testimonial
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection