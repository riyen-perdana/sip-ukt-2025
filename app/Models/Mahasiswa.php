<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;


class Mahasiswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nim',
        'password',
        'nama',
        'prodi_id',
        'ukt',
        'jml_ukt_awal',
        'jml_ukt_turun',
        'semester',
        'tgl_lhr',
        'tpt_lhr',
        'foto'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $table = 'mahasiswa';

    public $keyType = 'string';
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function prodi() : BelongsTo
    {
        return $this->belongsTo(Prodi::class,'prodi_id');
    }

    public function pengajuan() : HasMany
    {
        return $this->hasMany(Pengajuan::class,'mahasiswa_id');
    }

}
