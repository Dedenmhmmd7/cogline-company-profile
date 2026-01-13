@extends('admin.layout')

@section('title', 'Kontak Masuk')
@section('page-title', 'Kontak Masuk')

@section('content')
<div class="card">
    <div class="card-header">
        <div style="display: flex; align-items: center; gap: 1rem;">
            <h3>Daftar Kontak Masuk</h3>
            @if($newCount > 0)
                <span class="badge badge-warning">{{ $newCount }} Baru</span>
            @endif
        </div>
        <a href="{{ route('admin.contacts.export') }}" class="btn btn-success btn-sm">
            <i class="fas fa-download"></i> Export CSV
        </a>
    </div>

    <!-- Filter Status -->
    <div style="padding: 0 1.5rem 1rem;">
        <form action="{{ route('admin.contacts.index') }}" method="GET">
            <div style="display: flex; gap: 1rem; align-items: center;">
                <label style="margin: 0;">Filter Status:</label>
                <select name="status" class="form-control" style="width: 200px;" onchange="this.form.submit()">
                    <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua</option>
                    <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>Baru</option>
                    <option value="contacted" {{ request('status') == 'contacted' ? 'selected' : '' }}>Dihubungi</option>
                    <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Jumlah Kamar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($submissions as $submission)
            <tr style="{{ $submission->status == 'new' ? 'background: #fef3c7;' : '' }}">
                <td>
                    <small>{{ $submission->created_at->format('d/m/Y') }}</small><br>
                    <small style="color: #94a3b8;">{{ $submission->created_at->format('H:i') }}</small>
                </td>
                <td>
                    <strong>{{ $submission->name }}</strong>
                    @if($submission->status == 'new')
                        <span class="badge badge-warning" style="font-size: 0.7rem; margin-left: 0.5rem;">NEW</span>
                    @endif
                </td>
                <td>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $submission->phone) }}" target="_blank" style="color: #10b981; text-decoration: none;">
                        <i class="fab fa-whatsapp"></i> {{ $submission->phone }}
                    </a>
                </td>
                <td>{{ $submission->room_count }}</td>
                <td>
                    <span class="badge {{ $submission->status_badge }}">
                        {{ $submission->status_text }}
                    </span>
                </td>
                <td>
                    <div style="display: flex; gap: 0.5rem;">
                        <a href="{{ route('admin.contacts.show', $submission) }}" class="btn btn-sm btn-primary" title="Detail">
                            <i class="fas fa-eye"></i>
                        </a>
                        
                        <form id="delete-form-{{ $submission->id }}" action="{{ route('admin.contacts.destroy', $submission) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" title="Hapus" onclick="confirmDelete('delete-form-{{ $submission->id }}', '{{ $submission->name }}')">
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
                    Belum ada kontak masuk
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @if($submissions->hasPages())
    <div style="padding: 1.5rem; border-top: 1px solid var(--gray-light);">
        {{ $submissions->links() }}
    </div>
    @endif
</div>

@push('styles')
<style>
    .badge-primary {
        background: #ddd6fe;
        color: #7B2CBF;
    }
</style>
@endpush
@endsection