@extends('main.bootstrap')
@section('content')
<div class="text-center py-5 h-100 bg-dark text-white">
    <h1>Kelola Siswa</h1>
</div>
<div class="container mt-4">
    <div class="d-flex justify-content-between">
        <div>
            <h4>Data Siswa</h4>
        </div>
        <div>
            <a href="{{url ('siswa/tambah')}}" class="btn btn-success">Tambah</a>
        </div>
    </div>
    @if(Session::has('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(Session::has('error'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Gagal!</strong> {{ Session::get('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>No.Hp</th>
                <th>Kelola</th>

            </tr>
        </thead>
        <tbody>
        @if($siswa->count() == 0)
            <tr class="text-center">
                <td colspan="7"><strong>Belum ada Data.</strong></td>
            </tr>
            @else
            @foreach($siswa as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nis }}</td>
                <td>{{ $data->user->name }}</td>
                <td>{{ $data->kelas->kelas }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->no_hp }}</td>

                <td>
                    <a href='{{ url("/siswa/hapus/$data->id")}}' class="btn btn-sm btn-danger">Hapus</a>
                    <a href='{{ url("/siswa/edit/") }}' class="btn btn-primary">Edit</a>

                </td>

            </tr>

            @endforeach
            @endif
        </tbody>
</div>
</table>
@endsection