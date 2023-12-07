<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Fakultas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /*

Display a listing of the resource.*/
  public function index(){$prodi = Prodi::all();
      return view("prodi.prodi")->with("prodi", $prodi);}

    /*

Show the form for creating a new resource.*/
  public function create(){
    $fakultas = Fakultas::all();
    return view('prodi.create')->with("fakultas", $fakultas);
  }

    /*

Store a newly created resource in storage.*/
  public function store(Request $request){
    $validasi = $request->validate([
        "name" => "required | unique:prodis",
        "fakultas_id" => "required"
    ]);

    // simpan data ke table Prodi
    Prodi::create($validasi);
    return redirect('prodi')->with("Success", "Data Program Studi berhasil disimpan");

  }

    /*

Display the specified resource.*/
  public function show(Prodi $prodi){}

    /*

Show the form for editing the specified resource.*/
  public function edit(Prodi $prodi){
    $fakultas = Fakultas::all();
    return view('prodi.edit')->with("prodi", $prodi)->with("fakultas", $fakultas);
  }

    /*

Update the specified resource in storage.*/
  public function update(Request $request, Prodi $prodi){
    $validasi = $request->validate([
        "name" => "required | unique:prodis",
        "fakultas_id" => "required"
    ]);

    // simpan data ke table Prodi
    $prodi->update($validasi);
    return redirect('prodi')->with("Success", "Data Program Studi berhasil disimpan");

  }

    /*

Remove the specified resource from storage.*/
  public function destroy(Prodi $prodi){
    $prodi->delete();
    return redirect()->route('Prodi.prodi')->with('Success', 'Berhasil Dihapus');
  }
}
