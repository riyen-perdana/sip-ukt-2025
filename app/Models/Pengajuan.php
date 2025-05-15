<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswa_id',
        'jadwal_id',
        'no_pengajuan',
        'no_wa_mhs',
        'no_wa_ortu',
        'surper_mhs',
        'kk_mhs',
        'ktp_ortu_mhs',
        'rknlstrk_mhs',
        'gjortu_mhs',
        'surkk_mhs',
        'ft_ruangtamu',
        'ft_kamartdr',
        'ft_ruangklrg',
        'ft_dapur',
        'ft_dpnrumah',
        'sk_tdkbs',
        'spkd',
        'status'
    ];

    protected $table = 'pengajuan';

    public $keyType = 'string';
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
            $model->no_pengajuan = (string) 'UKT-'.mt_rand(10000000,99999999);
        });
    }

    public function mahasiswa() : BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class,'mahasiswa_id');
    }

    public function jadwal() : BelongsTo
    {
        return $this->belongsTo(Jadwal::class,'jadwal_id');
    }

    protected function surperMhs() : Attribute
    {
        return Attribute::make(
            get: fn (string $value) => url('/storage/files/' .$value)
        );
    }

    protected function kkMhs() : Attribute
    {
        return Attribute::make(
            get: fn (string $value) => url('/storage/files/' .$value)
        );
    }

    protected function rknlstrkMhs() : Attribute
    {
        return Attribute::make(
            get: fn (string $value) => url('/storage/files/' .$value)
        );
    }

    protected function gjortuMhs() : Attribute
    {
        return Attribute::make(
            get: fn (string $value) => url('/storage/files/' .$value)
        );
    }

    protected function surkkMhs() : Attribute
    {
        return Attribute::make(
            get: fn (string $value) => url('/storage/files/' .$value)
        );
    }

    protected function ftRuangtamu() : Attribute
    {
        return Attribute::make(
            get: fn (string $value) => url('/storage/files/' .$value)
        );
    }

    protected function ftKamartdr() : Attribute
    {
        return Attribute::make(
            get: fn (string $value) => url('/storage/files/' .$value)
        );
    }

    protected function ftRuangklrg() : Attribute
    {
        return Attribute::make(
            get: fn (string $value) => url('/storage/files/' .$value)
        );
    }

    protected function ftDapur() : Attribute
    {
        return Attribute::make(
            get: fn (string $value) => url('/storage/files/' .$value)
        );
    }

    protected function ftDpnrumah() : Attribute
    {
        return Attribute::make(
            get: fn (string $value) => url('/storage/files/' .$value)
        );
    }

    protected function skTdkbs() : Attribute
    {
        return Attribute::make(
            get: fn (string $value) => url('/storage/files/' .$value)
        );
    }

    protected function spkd() : Attribute
    {
        return Attribute::make(
            get: fn (string $value) => url('/storage/files/' .$value)
        );
    }

    public function verifikasi() : HasMany
    {
        return $this->hasMany(Verifikasi::class, 'pengajuan_id');
    }

}
