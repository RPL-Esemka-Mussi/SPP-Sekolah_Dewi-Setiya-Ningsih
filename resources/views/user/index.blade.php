@extends('main.bootstrap')
@section('content')
<div class="text-center py-5 h-100 bg-dark text-white">
    <h1>Kelola User</h1>
</div>
<div class="container mt-4">
    <div class="d-flex justify-content-between">
        <div>
            <h4>Data User</h4>
        </div>
        <div>
            <a href="{{url ('user/tambah')}}" class="btn btn-success">Tambah</a>
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
                <th>Nama</th>
                <th>Email</th>
                <th>Level</th>
                <th>Kelola</th>

            </tr>
        </thead>
        <tbody>
            @foreach($users as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td><span class="badge bg-secondary">{{ ucfirst ($data->level) }}</span></td>
                <td>
                    <a href='{{ url("/user/hapus/$data->id")}}' class="btn btn-danger">Hapus</a>
                    <a href='{{ url("/user/edit") }}' class="btn btn-primary">Edit</a>

                </td>

            </tr>

            @endforeach
        </tbody>
</div>
</table>
@endsection