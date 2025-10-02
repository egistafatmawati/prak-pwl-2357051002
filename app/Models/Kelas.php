<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas'; // pastikan nama tabel sesuai di database
    protected $guarded = ['id'];

    // Tambahkan method ini
    public function getKelas()
    {
        return $this->all(); // ambil semua data dari tabel kelas
    }
}
