<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    public $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'tahun',
        'daftar_buka',
        'daftar_tutup',
        'is_aktif'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function pengajuan() : HasMany
    {
        return $this->hasMany(Pengajuan::class,'jadwal_id');
    }
}
