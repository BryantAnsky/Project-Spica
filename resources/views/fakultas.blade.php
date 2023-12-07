@extends('layout.main')
@section('title', 'fakultas')

@section('content')
    <h1>Halaman Fakultas</h1>
    <table class="table table-striped">
        <tr>
            <th>NAMA FAKULTAS</th>
        </tr>
            @foreach ($fakultas as $item)
        <tr>
            <td>{{ $item['nama']}}</td>
        </tr>
            @endforeach
    </table>


@endsection
