<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeBoyReport extends Model
{
    public function monitoring()
    {
        return $this->belongsTo(OfficeBoyMonitoring::class, 'monitoring_id');
    }

}