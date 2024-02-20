<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeBoyMonitoring extends Model
{
    use HasFactory;

    // Pastikan Anda memiliki fillable untuk kolom yang diisi
    protected $fillable = ['office_boy_id', 'building_id', 'floor_id', 'room_id', 'shift_id', 'date', 'status', 'proof_photo', 'sumber_informasi', 'catatan', 'catatan_tugas', 'catatan_ob'];

    // Relasi ke OfficeBoy
    public function officeBoy()
    {
        return $this->belongsTo(OfficeBoy::class, 'office_boy_id');
    }

    // Relasi ke Building
    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }


    // Relasi ke Floor
    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id');
    }

    // Relasi ke Room
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    // Relasi ke Shift
    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id');
    }

    public function report()
    {
        return $this->hasOne(OfficeBoyReport::class, 'monitoring_id');
    }

    // Di dalam model OfficeBoyMonitoring.php

    public function trackings()
    {
        return $this->hasMany(Tracking::class);
    }
}