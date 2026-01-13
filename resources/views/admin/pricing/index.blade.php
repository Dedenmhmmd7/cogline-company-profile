@extends('admin.layout')

@section('title', 'Kelola Pricing')
@section('page-title', 'Kelola Pricing')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Daftar Paket Pricing</h3>
        <a href="{{ route('admin.pricing.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Paket
        </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Paket</th>
                <th>Harga</th>
                <th>Featured</th>
                <th>Status</th>
                <th>Order</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($packages as $package)
            <tr>
                <td>
                    <strong>{{ $package->name }}</strong>
                    @if($package->badge)
                        <span class="badge badge-warning">{{ $package->badge }}</span>
                    @endif
                </td>
                <td>
                    @if($package->period)
                        Rp {{ $package->price }} {{ $package->period }}
                    @else
                        {{ $package->price }}
                    @endif
                </td>
                <td>
                    @if($package->is_featured)
                        <span class="badge badge-success">Yes</span>
                    @else
                        <span class="badge badge-danger">No</span>
                    @endif
                </td>
                <td>
                    @if($package->is_active)
                        <span class="badge badge-success">Aktif</span>
                    @else
                        <span class="badge badge-danger">Nonaktif</span>
                    @endif
                </td>
                <td>{{ $package->order }}</td>
                <td>
                    <div style="display: flex; gap: 0.5rem;">
                        <a href="{{ route('admin.pricing.edit', $package) }}" class="btn btn-sm btn-primary" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        
                        <form action="{{ route('admin.pricing.toggle-active', $package) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm {{ $package->is_active ? 'btn-danger' : 'btn-success' }}" title="{{ $package->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                <i class="fas fa-{{ $package->is_active ? 'eye-slash' : 'eye' }}"></i>
                            </button>
                        </form>
                        
                        <form id="delete-form-{{ $package->id }}" action="{{ route('admin.pricing.destroy', $package) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" title="Hapus" onclick="confirmDelete('delete-form-{{ $package->id }}', '{{ $package->name }}')">
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
                    Belum ada data paket pricing
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection