<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodi';
    protected $fillable = [
        'fakultas_id',
        'name_prodi',
        'abbr_prodi',
        'is_aktif'
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

    public function fakultas() : BelongsTo
    {
        return $this->belongsTo(Fakultas::class,'fakultas_id');
    }

    public function mahasiswa() : HasMany
    {
        return $this->hasMany(Mahasiswa::class,'prodi_id');
    }



}
