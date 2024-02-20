<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeBoyTask extends Model
{
    use HasFactory;

    // Nama tabel yang dihubungkan dengan model
    protected $table = 'office_boy_tasks';

    // Field yang bisa diisi
    protected $fillable = [
        'monitoring_id',
        'task_name',
        'is_completed'
    ];

    /**
     * Mendefinisikan relasi dengan OfficeBoyMonitoring
     */
    public function monitoring()
    {
        return $this->belongsTo(OfficeBoyMonitoring::class, 'monitoring_id');
    }
}
