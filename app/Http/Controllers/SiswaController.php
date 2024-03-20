<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index()
{
    $siswas = DB::table('siswa')
        ->join('jurusan', 'siswa.id_jurusan', '=', 'jurusan.id_jurusan')
        ->select('siswa.*', 'jurusan.nama_jurusan')
        ->get();
    $jurusans = Jurusan::pluck('nama_jurusan', 'id_jurusan');

    return view('siswa.index', compact('siswas', 'jurusans'));
}


    public function create()
    {
        $jurusans = Jurusan::pluck('nama_jurusan', 'id_jurusan');

        return view('siswa.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $siswa = new Siswa();
        $siswa->nisn = $request->nisn;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->alamat = $request->alamat;
        $siswa->id_jurusan = $request->nama_jurusan;
        $siswa->save();

        return redirect()->route('siswa.index');
    }




}
