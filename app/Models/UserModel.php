<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserModel extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'user';

    // Kolom yang tidak boleh diisi mass-assignment
    protected $guarded = ['id'];

    // Non-auto increment karena kita pakai UUID
    public $incrementing = false;

    // Tipe data primary key adalah string (bukan integer)
    protected $keyType = 'string';

    /**
     * Boot function untuk generate UUID otomatis saat create data baru
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * Relasi: setiap user punya satu kelas
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    /**
     * Ambil semua user beserta relasi kelas-nya (pakai eager loading)
     */
    public static function getUser()
    {
        return self::with('kelas')->get();
    }
}
