<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fakultas extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbr',
        'is_aktif'
    ];

    protected $table = 'fakultas';
    public $keyType = 'string';
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function prodi() : HasMany
    {
        return $this->hasMany(Prodi::class,'fakultas_id');
    }

    public function user() : HasMany
    {
        return $this->hasMany(User::class,'fakultas_id');
    }

}
