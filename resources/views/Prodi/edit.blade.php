@extends('layout.main')
@section('title', 'Edit Program Studi')

@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Mahasiswa</h4>
                    <p class="card-description">
                        Formulir Edit Program Studi Universitas MDP
                    </p>
                    <form class="forms-sample" method="POST" action="{{ route("prodi.update", $prodi->id)}}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama Program Studi</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama Program Studi" value="{{$prodi->name}}">
                            @error('npm')
                                <label class="text-danger">{{ $message }} </label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Fakultas</label>
                            <select name="fakultas_id" class="form-control">
                                <option value="">Pilih Fakultas</option>
                                @foreach ($fakultas as $item)
                                    <option value="{{ $item->id }}" {{$item->id == $prodi->fakultas_id ? 'selected' : null }}>{{ $item-> nama }}</option>
                                @endforeach
                            </select>
                            @error('fakultas_id')
                                <label class="text-danger">{{ $message }} </label>
                            @enderror
                          </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ url('prodi.prodi')}}" class="btn btn-light">Batal</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
