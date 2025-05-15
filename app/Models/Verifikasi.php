<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Verifikasi extends Model
{
    use HasFactory;

    protected $table = 'verifikasi';
    protected $fillable = [
        'pengajuan_id',
        'user_id',
        'is_setuju',
        'komentar'
    ];

    public $keyType = 'string';
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function pengajuan() : BelongsTo
    {
        return $this->belongsTo(Pengajuan::class,'pengajuan_id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
