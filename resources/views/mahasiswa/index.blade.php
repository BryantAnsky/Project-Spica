<!DOCTYPE html>
@extends('layout.main')
@section('title', 'mahasiswa')
@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Mahasiswa</h4>
                    <p class="card-description">
                        Daftar Mahasiswa di Universitas MDP
                    </p>
                    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-rounded btn-fw"> Tambah </a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Npm</th>
                                    <th>Nama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Foto</th>
                                    <th>Nama Prodi</th>
                                    <th>Nama Fakultas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswas as $item)
                                    <tr>
                                        <td>{{ $item['npm'] }} </td>
                                        <td>{{ $item['nama'] }} </td>
                                        <td>{{ $item['tempat_lahir'] }} </td>
                                        <td>{{ $item['tanggal_lahir'] }} </td>
                                        <td>{{ $item['jk'] }} </td>
                                        <td>
                                            <img src="image/{{ $item['foto'] }}"class="rounded-circle" width="70px" />
                                        </td>
                                        <td>{{ $item['prodis']['name'] }} </td>
                                        <td>{{ $item['prodis']['fakultas']['nama'] }} </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('mahasiswa.edit', $item->id) }}">
                                                    <button type="submit"
                                                        class="btn btn-success btn-rounded mx-3">Edit</button>
                                                </a>

                                                <form method="POST" action="{{ route('mahasiswa.destroy', $item->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-rounded">Hapus
                                                        data</button>
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

@section('script')
    <script>
        @if (Session::get('Success'))
            toastr.success("{{ Session::get('Success') }}");
        @endif
    </script>
@endsection
