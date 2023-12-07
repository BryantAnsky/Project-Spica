@extends('layout.main')
@section('title', 'Tambah Mahasiswa')

@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Mahasiswa</h4>
                    <p class="card-description">
                        Daftar Mahasiswa di Universitas MDP
                    </p>
                    <form class="forms-sample" method="POST" action="{{ route('mahasiswa.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">NPM Mahasiswa</label>
                            <input type="text" class="form-control" name="npm" placeholder="NPM">
                            @error('npm')
                                <label class="text-danger">{{ $message }} </label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama Mahasiswa</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Mahasiswa">
                            @error('nama')
                                <label class="text-danger">{{ $message }} </label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                            @error('tempat_lahir')
                                <label class="text-danger">{{ $message }} </label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir">
                            @error('tanggal_lahir')
                                <label class="text-danger">{{ $message }} </label>
                            @enderror
                        </div>
                        <div>
                            <input type="radio" id="jk" name="jk" value="L" checked />
                            <label for="jk">Laki-Laki</label>
                            <input type="radio" id="jk" name="jk" value="P" />
                            <label for="jk">Perempuan</label>
                            @error('jk')
                                <label class="text-danger">{{ $message }} </label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Foto</label>
                            <input type="file" class="form-control" name="foto" placeholder="Foto">
                            @error('foto')
                                <label class="text-danger">{{ $message }} </label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Program Studi</label>
                            <select name="prodi_id" class="form-control">
                                <option value="">Pilih Program Studi</option>
                                @foreach ($prodi as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('prodi_id')
                                <label class="text-danger">{{ $message }} </label>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ url('mahasiswa') }}" class="btn btn-light">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
