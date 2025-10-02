@extends('layouts.app')

@section('content')
<div class="card shadow-lg border-0 rounded-3">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar User</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-dark text-center align-middle">
                    <tr>
                        <th style="width:70px;">ID</th>
                        <th style="width:250px;">Nama</th>
                        <th style="width:150px;">NPM</th>
                        <th style="width:100px;">Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="align-middle">
                            <td class="text-center">
                                <span class="badge bg-secondary d-inline-flex align-items-center justify-content-center" style="font-size: 0.75rem; min-width: 28px; height: 28px;">
                                    {{ $user->id }}
                                </span>
                            </td>
                            <td class="fw-semibold text-start">
                                {{ $user->nama }}
                            </td>
                            <td class="text-center">
                                {{ $user->nim }}
                            </td>
                            <td class="text-center">
                                <span class="badge bg-success px-2 py-1" style="font-size: 0.8rem;">
                                    {{ $user->nama_kelas }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada user</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
