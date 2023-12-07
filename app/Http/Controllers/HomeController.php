<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();
        $mahasiswa = Mahasiswa::all();
        $grafik_mhs = DB::select('SELECT prodis.name as nama, COUNT(*) as jumlah FROM prodis JOIN mahasiswas ON prodis.id = mahasiswas.prodi_id GROUP BY prodis.name');
        $grafik_jk = DB::select('SELECT jk, COUNT(*) as jumlah FROM mahasiswas GROUP BY jk');
        $grafik_jk_prodi = DB::select("SELECT prodis.name,
        SUM(CASE WHEN mahasiswas.jk = 'L' THEN 1 ELSE 0 END) as laki,
        SUM(CASE WHEN mahasiswas.jk = 'P' THEN 1 ELSE 0 END) as Perempuan
        FROM `prodis`
        JOIN mahasiswas ON prodis.id = mahasiswas.prodi_id
        GROUP BY prodis.name");

        return view('home')
            ->with('fakultas', $fakultas)
            ->with('prodi', $prodi)
            ->with('mahasiswa', $mahasiswa)
            ->with('grafik_mhs', $grafik_mhs)
            ->with('grafik_jk', $grafik_jk)
            ->with('grafik_jk_prodi', $grafik_jk_prodi);
    }
}
