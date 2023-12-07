<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function __construct()
    {
        $this->middleware
        (['checkRole:A'])
            ->except('index');
    }
    /*

Display a listing of the resource.*/
    public function index()
    {
        $fakultas = Fakultas::all();
        return view("fakultas.index")->with("fakultas", $fakultas);
    }

    /*

Show the form for creating a new resource.*/
    public function create()
    {
        return view('fakultas.create');
    }

    /*

Store a newly created resource in storage.*/
    public function store(Request $request)
    {
        //dd($request);

        //validasi data dari inputan
        $validasi = $request->validate([
            "nama" => "required | unique:Fakultas"
        ]);

        // simpan data ke table Fakultas
        Fakultas::create($validasi);
        return redirect('fakultas')->with("Success", "Data fakultas berhasil disimpan");
    }

    /*

Display the specified resource.*/
    public function show(Fakultas $fakultas)
    {
    }

    /*

Show the form for editing the specified resource.*/
    public function edit($id)
    {
        $fakultas = Fakultas::find($id);
        return view('fakultas.edit')->with("fakultas", $fakultas);
    }

    /*

Update the specified resource in storage.*/
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            "nama" => "required | unique:Fakultas"
        ]);

        // simpan data ke table Fakultas
        Fakultas::find($id)->update($validasi);
        return redirect('fakultas')->with("Success", "Data fakultas berhasil disimpan");
    }

    /*

Remove the specified resource from storage.*/
    public function destroy($id)
    {
        $fakultas = Fakultas::find($id);
        $fakultas->delete();
        return redirect()->route('fakultas.index')->with('Success', 'Data Berhasil Dihapus');
    }
}
