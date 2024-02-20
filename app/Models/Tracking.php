<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;
    protected $fillable = [
        'office_boy_id',
        'tanggal',
        'sumber_informasi',
        'catatan',
        'lokasi',
    ];

    // Relasi ke OfficeBoyMonitoring
    public function monitoring()
    {
        return $this->belongsTo(OfficeBoyMonitoring::class, 'monitoring_id');
    }
}
