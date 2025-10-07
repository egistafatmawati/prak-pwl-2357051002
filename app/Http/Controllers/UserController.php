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

    public function create()
    {
        $kelas = $this->kelasModel->getKelas();
        $title = "Create User";

        return view('create_user', compact('kelas', 'title'));
    }

    public function store(Request $request)
    {
        $this->userModel->create([
            'nama' => $request->nama,
            'nim' => $request->npm,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('user.index');
    }

    public function index()
    {
        $users = $this->userModel->getUser();
        $title = "Daftar User";

        return view('list_user', compact('users', 'title'));
    }
}
