@extends('layout.main')
@section('title', 'Tambah Program Studi')

@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Program Studi</h4>
                    <p class="card-description">
                        Daftar fakultas di Universitas MDP
                    </p>
                    <form class="forms-sample" method="POST" action="{{ route("prodi.store")}}">
                        @csrf
                        <div class="form-group">
                          <label>Nama Prodi</label>
                          <input type="text" class="form-control" name="name" placeholder="Nama Program Studi">
                          @error('fakultas_id')
                              <label class="text-danger">{{ $message }} </label>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Fakultas</label>
                            <select name="fakultas_id" class="form-control">
                                <option value="">Pilih Fakultas</option>
                                @foreach ($fakultas as $item)
                                    <option value="{{ $item->id }}">{{ $item-> nama }}</option>
                                @endforeach
                            </select>
                            @error('fakultas_id')
                                <label class="text-danger">{{ $message }} </label>
                            @enderror
                          </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ url('prodi')}}" class="btn btn-light">Batal</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
