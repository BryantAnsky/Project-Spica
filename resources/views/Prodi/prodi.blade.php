@extends('layout.main')
@section('title', 'prodi')

@section('content')
    <div class="row">

<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">@yield('title')</h4>
        <p class="card-description">
            Daftar Program Studi di Univeritas MDP
        </p>
        <a href="{{ route('prodi.create')}}"
        class="btn btn-primary btn-rounded btn-fw"> Tambah </a>
        <div class="table-responsive pt-3">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>NAMA PRODI</th>
                        <th>NAMA FAKULTAS</th>
                        <th><center>AKSI</center></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prodi as $item)
                    <tr>
                        <td>{{ $item['name']}}</td>
                        <td>{{$item['fakultas']['nama']}}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('prodi.edit', $item->id) }}">
                                    <button type="submit" class="btn btn-success btn-rounded mx-3">Edit</button>
                                </a>

                                <form method="POST" action="{{ route('prodi.destroy', $item->id)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-rounded show-confirm" data-toggle="tooltip" title="Delete" data-name="{{ $item->nama}}">Hapus data</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>

@endsection
