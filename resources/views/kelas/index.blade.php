@extends('main.bootstrap')
@section('content')
<div class="text-center py-5 h-100 bg-dark text-white">
    <h1>Kelola Kelas</h1>
</div>
<div class="container mt-4">
    <div class="d-flex justify-content-between">
        <div>
            <h4>Data Kelas</h4>
        </div>
        <div>
            <a href="{{url ('kelas/tambah')}}" class="btn btn-success">Tambah</a>
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
                <th>Kelas</th>
                <th>Kompetensi_Keahlian</th>
                <th>Kelola</th>

            </tr>
        </thead>
        <tbody>
        @if($kelas->count() == 0)
            <tr class="text-center">
                <td colspan="4"><strong>Belum ada Data.</strong></td>
            </tr>
            @else
            @foreach($kelas as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->kelas }}</td>
                <td>{{ $data->kompetensi_keahlian }}</td>
                <td>
                    <a href='{{ url("/kelas/hapus/$data->id")}}' class="btn btn-sm btn-danger">Hapus</a>
                    <a href='{{ url("/kelas/edit") }}' class="btn btn-primary">Edit</a>

                </td>

            </tr>

            @endforeach
            @endif
        </tbody>
</div>
</table>
@endsection