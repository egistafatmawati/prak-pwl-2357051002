<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user';   // pastikan sesuai dengan nama tabel di database
    protected $guarded = ['id'];

    // Relasi: setiap user punya satu kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // Method untuk join ke tabel kelas
    public static function getUser()
    {
        return self::join('kelas', 'user.kelas_id', '=', 'kelas.id')
            ->select('user.id', 'user.nama', 'user.nim', 'kelas.nama_kelas')
            ->get();
    }
}
