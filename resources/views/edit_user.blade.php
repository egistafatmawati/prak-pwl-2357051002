@extends('layouts.app')

@section('content')
<div class="container py-5 d-flex justify-content-center align-items-center">
    <div class="card shadow-sm p-4 rounded-4" style="width: 450px;">
        <h2 class="text-center text-primary mb-4 fw-bold">Edit Data User</h2>

        {{-- Form Edit User --}}
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Input Nama --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama:</label>
                <input type="text" 
                       name="nama" 
                       value="{{ old('nama', $user->nama) }}" 
                       class="form-control border-info-subtle" 
                       placeholder="Masukkan nama" 
                       required>
            </div>

            {{-- Input NPM --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">NPM:</label>
                <input type="text" 
                       name="npm" 
                       value="{{ old('npm', $user->npm) }}" 
                       class="form-control border-info-subtle" 
                       placeholder="Masukkan NPM" 
                       required>
            </div>

            {{-- Dropdown Kelas --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">Kelas:</label>
                <select name="kelas_id" class="form-select border-info-subtle" required>
                    <option value="">-- Pilih Kelas --</option>
                    @foreach($kelas as $k)
                        <option value="{{ $k->id }}" 
                            {{ old('kelas_id', $user->kelas_id) == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kelas ?? $k->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tombol --}}
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-info text-white fw-semibold shadow-sm">
                    Simpan Perubahan
                </button>
                <a href="{{ route('user.index') }}" class="btn btn-outline-secondary fw-semibold">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
