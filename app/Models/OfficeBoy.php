<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class OfficeBoy extends Model implements Authenticatable
{
    use HasFactory;

    use AuthenticatableTrait;

    protected $fillable = ['nik', 'nama_lengkap', 'user_id', 'tahun_masuk', 'tempat_lahir', 'tanggal_lahir', 'status', 'no_telepon', 'password', 'status_profile',];
    protected $table = 'office_boys';

    public function monitorings()
    {
        return $this->hasMany(OfficeBoyMonitoring::class, 'office_boy_id');
    }
}
