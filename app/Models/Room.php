<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['floor_id', 'name'];

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function officeBoyMonitorings()
    {
        return $this->hasMany(OfficeBoyMonitoring::class);
    }

    public function monitorings()
    {
        return $this->hasMany(OfficeBoyMonitoring::class, 'room_id');
    }
}