<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'room_count',
        'message',
        'status',
        'admin_notes',
        'contacted_at',
    ];

    protected $casts = [
        'contacted_at' => 'datetime',
    ];

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function scopeContacted($query)
    {
        return $query->where('status', 'contacted');
    }

    public function scopeClosed($query)
    {
        return $query->where('status', 'closed');
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'new' => 'badge-warning',
            'contacted' => 'badge-primary',
            'closed' => 'badge-success',
        ];

        return $badges[$this->status] ?? 'badge-secondary';
    }

    public function getStatusTextAttribute()
    {
        $texts = [
            'new' => 'Baru',
            'contacted' => 'Dihubungi',
            'closed' => 'Selesai',
        ];

        return $texts[$this->status] ?? $this->status;
    }
}