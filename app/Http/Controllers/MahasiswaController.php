<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /*

Display a listing of the resource.*/
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view("mahasiswa.index")->with("mahasiswas", $mahasiswas);
    }

    /*

Show the form for creating a new resource.*/
    public function create()
    {
        $prodi = Prodi::all();
        return view('mahasiswa.create')->with("prodi", $prodi);
    }

    /*

Store a newly created resource in storage.*/
    public function store(Request $request)
    {
        $validasi = $request->validate([
            "npm" => "required | unique:mahasiswas",
            "nama" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required",
            "jk" => "required",
            "foto" => "required|image",
            "prodi_id" => "required"
        ]);

        //ambil extension
        $ext = $request->foto->getClientOriginalExtension();
        //rename file foto
        $validasi['foto'] = $request->npm . "." . $ext;
        // upload file foto ke dalam folder public/imgae
        $request->foto->move(public_path('image'), $validasi["foto"]);

        // simpan data ke table Mahasiswa
        Mahasiswa::create($validasi);
        return redirect('mahasiswa')->with("Success", "Data Program Studi berhasil disimpan");
    }

    /*

Display the specified resource.*/
    public function show(Mahasiswa $mahasiswa)
    {
    }

    /*

Show the form for editing the specified resource.*/
    public function edit(Mahasiswa $mahasiswa)
    {
        $prodi = Prodi::all();
        return view('mahasiswa.edit')->with("mahasiswa", $mahasiswa)->with("prodi", $prodi);
    }

    /*

Update the specified resource in storage.*/
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validasi = $request->validate([
            "npm" => "required",
            "nama" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required",
            "jk" => "required",
            "foto" => "image|nullable",
            "prodi_id" => "required"
        ]);


        if ($request->foto != null) {

            //ambil extension
            $ext = $request->foto->getClientOriginalExtension();
            //rename file foto
            $validasi['foto'] = $request->npm . "." . $ext;
            // upload file foto ke dalam folder public/imgae
            $request->foto->move(public_path('image'), $validasi["foto"]);

            // simpan data ke table Mahasiswa
        }
        $mahasiswa->update($validasi);
        return redirect('mahasiswa')->with("Success", "Data Program Studi berhasil disimpan");

    }

    /*

Remove the specified resource from storage.*/
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('Success', 'Berhasil Dihapus');

    }
}
