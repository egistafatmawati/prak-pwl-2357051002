<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
    {
        $users = $this->userModel->getUser();
        $title = "Daftar User";
        return view('list_user', compact('users', 'title'));
    }

    public function create()
    {
        $kelas = $this->kelasModel->getKelas();
        $title = "Create User";
        return view('create_user', compact('kelas', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'npm' => 'required|string|max:20',
            'kelas_id' => 'required'
        ]);

        $this->userModel->create([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('user.index')->with('success', 'Data user berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = $this->userModel->findOrFail($id);
        $kelas = $this->kelasModel->getKelas();
        $title = "Edit User";
        return view('edit_user', compact('user', 'kelas', 'title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'npm' => 'required|string|max:20',
            'kelas_id' => 'required',
        ]);

        $user = $this->userModel->findOrFail($id);
        $user->update([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('user.index')->with('success', 'Data user berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = $this->userModel->findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus!');
    }
}
