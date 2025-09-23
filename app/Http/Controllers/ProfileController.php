<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $data = [
            'Nama'  => 'Egista Fatmawati',
            'NPM' => '2357051002',
            'Kelas'   => 'C'
        ];

        return view('profile', $data);
    }
}
