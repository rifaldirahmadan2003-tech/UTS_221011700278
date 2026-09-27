<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //
    public function index()
    {
        $mahasiswa = [
            'nim' => '221011700278',
            'nama' => 'RIFALDI RAHMADAN',
            'prodi' => 'Sistem Informasi',
            'kampus' => 'Universitas Pamulang',
            'email' => 'rifaldirahmadan2003@gmail.com',
            'status' => 'Aktif'
        ];
        
        return view('mahasiswa', compact('mahasiswa'));
    }
}
