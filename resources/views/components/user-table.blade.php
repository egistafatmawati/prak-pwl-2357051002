@extends('layouts.app')

@section('content')
<div class="container py-4">

    {{-- Judul & Tombol Tambah --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">
            Daftar User
        </h2>
        <a href="{{ route('user.create') }}" class="btn btn-info text-white shadow-sm">
            ➕ Tambah User Baru
        </a>
    </div>

    {{-- Notifikasi sukses/error --}}
    @if (session('success'))
    <div class="alert alert-dismissible fade show shadow-sm" 
         role="alert"
         style="background-color: rgba(207, 249, 250, 0.6); color: #045C5C; border-left: 6px solid rgba(94, 211, 217, 0.8); backdrop-filter: blur(6px);">
        ✅ {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @elseif (session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" 
         role="alert"
         style="background-color: rgba(255, 99, 99, 0.15); color: #8B0000; border-left: 6px solid rgba(255, 99, 99, 0.5); backdrop-filter: blur(6px);">
        ❌ {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
@endif




    {{-- Cek jika data kosong --}}
    @if ($users->isEmpty())
        <div class="alert alert-warning text-center shadow-sm">
            Belum ada data user. Tambahkan user baru untuk memulai!
        </div>
    @else
        {{-- Tabel --}}
        <div class="table-responsive rounded-4 border border-info shadow-sm bg-white p-3">
            <table class="table table-hover align-middle text-center mb-0">
                <thead class="table-info text-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>NPM</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="text-secondary small">{{ Str::limit($user->id, 8, '...') }}</td>
                            <td class="fw-medium">{{ $user->nama }}</td>
                            <td>{{ $user->npm }}</td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
                                    {{ $user->kelas->nama_kelas ?? '-' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('user.edit', $user->id) }}" 
                                   class="btn btn-sm btn-outline-primary shadow-sm me-2">
                                     ✏️ Edit
                                </a>
                                <form action="{{ route('user.destroy', $user->id) }}" 
                                      method="POST" 
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-outline-danger shadow-sm"
                                            onclick="return confirm('Yakin ingin menghapus user ini?')">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
