@extends('admin.layout')

@section('title', 'Detail Kontak')
@section('page-title', 'Detail Kontak')

@section('content')
<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem;">
    <!-- Detail Kontak -->
    <div class="card">
        <div class="card-header">
            <h3>Informasi Kontak</h3>
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div style="padding: 0 1.5rem 1.5rem;">
            <table style="width: 100%;">
                <tr>
                    <td style="padding: 0.75rem 0; font-weight: 600; width: 180px;">Tanggal Masuk</td>
                    <td style="padding: 0.75rem 0;">{{ $contact->created_at->format('d F Y, H:i') }} WIB</td>
                </tr>
                <tr style="border-top: 1px solid var(--gray-light);">
                    <td style="padding: 0.75rem 0; font-weight: 600;">Nama Lengkap</td>
                    <td style="padding: 0.75rem 0;">{{ $contact->name }}</td>
                </tr>
                <tr style="border-top: 1px solid var(--gray-light);">
                    <td style="padding: 0.75rem 0; font-weight: 600;">No. Telepon/WhatsApp</td>
                    <td style="padding: 0.75rem 0;">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}" target="_blank" class="btn btn-success btn-sm">
                            <i class="fab fa-whatsapp"></i> {{ $contact->phone }}
                        </a>
                    </td>
                </tr>
                <tr style="border-top: 1px solid var(--gray-light);">
                    <td style="padding: 0.75rem 0; font-weight: 600;">Email</td>
                    <td style="padding: 0.75rem 0;">
                        @if($contact->email)
                            <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                        @else
                            <span style="color: #94a3b8;">-</span>
                        @endif
                    </td>
                </tr>
                <tr style="border-top: 1px solid var(--gray-light);">
                    <td style="padding: 0.75rem 0; font-weight: 600;">Alamat Lengkap</td>
                    <td style="padding: 0.75rem 0;">{{ $contact->address }}</td>
                </tr>
                <tr style="border-top: 1px solid var(--gray-light);">
                    <td style="padding: 0.75rem 0; font-weight: 600;">Jumlah Kamar</td>
                    <td style="padding: 0.75rem 0;">
                        <span class="badge badge-primary">{{ $contact->room_count }}</span>
                    </td>
                </tr>
                @if($contact->message)
                <tr style="border-top: 1px solid var(--gray-light);">
                    <td style="padding: 0.75rem 0; font-weight: 600; vertical-align: top;">Pesan</td>
                    <td style="padding: 0.75rem 0;">
                        <div style="background: var(--gray-light); padding: 1rem; border-radius: 8px;">
                            {{ $contact->message }}
                        </div>
                    </td>
                </tr>
                @endif
            </table>
        </div>
    </div>

    <!-- Update Status -->
    <div class="card">
        <div class="card-header">
            <h3>Status & Notes</h3>
        </div>

        <form action="{{ route('admin.contacts.update-status', $contact) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="status">Status *</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="new" {{ $contact->status == 'new' ? 'selected' : '' }}>🆕 Baru</option>
                    <option value="contacted" {{ $contact->status == 'contacted' ? 'selected' : '' }}>📞 Dihubungi</option>
                    <option value="closed" {{ $contact->status == 'closed' ? 'selected' : '' }}>✅ Selesai</option>
                </select>
            </div>

            <div class="form-group">
                <label for="admin_notes">Catatan Admin</label>
                <textarea name="admin_notes" id="admin_notes" class="form-control" rows="5" placeholder="Tulis catatan follow-up, hasil komunikasi, dll...">{{ old('admin_notes', $contact->admin_notes) }}</textarea>
            </div>

            @if($contact->contacted_at)
            <div style="background: #d1fae5; padding: 1rem; border-radius: 8px; margin-bottom: 1rem; font-size: 0.875rem;">
                <strong style="color: #10b981;">Dihubungi pada:</strong><br>
                {{ $contact->contacted_at->format('d F Y, H:i') }} WIB
            </div>
            @endif

            <button type="submit" class="btn btn-primary" style="width: 100%;">
                <i class="fas fa-save"></i> Update Status
            </button>
        </form>
    </div>
</div>

<!-- Quick Actions -->
<div class="card" style="margin-top: 1.5rem;">
    <div style="padding: 1.5rem;">
        <h4 style="margin-bottom: 1rem;">Quick Actions</h4>
        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}?text=Halo%20{{ urlencode($contact->name) }}%2C%20terima%20kasih%20telah%20menghubungi%20COGLINE!" 
               target="_blank" 
               class="btn btn-success">
                <i class="fab fa-whatsapp"></i> Chat WhatsApp
            </a>

            @if($contact->email)
            <a href="mailto:{{ $contact->email }}?subject=COGLINE - Follow Up&body=Halo {{ $contact->name }}," 
               class="btn btn-primary">
                <i class="fas fa-envelope"></i> Kirim Email
            </a>
            @endif

            <a href="tel:{{ $contact->phone }}" class="btn btn-secondary">
                <i class="fas fa-phone"></i> Telepon
            </a>
        </div>
    </div>
</div>

@push('styles')
<style>
    .badge-primary {
        background: #ddd6fe;
        color: #7B2CBF;
        padding: 0.5rem 1rem;
        font-size: 1rem;
    }
</style>
@endpush
@endsection