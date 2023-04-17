@extends('main.bootstrap')
@section('content')
<div class="text-center py-5 h-100 bg-dark text-white">
    <h1>Kelola Pembayaran</h1>
</div>
<div class="container mt-4">
    <div class="d-flex justify-content-between">
        <div>
            <h4>Data Pembayaran</h4>
        </div>
        <form class="row row-cols-lg-auto g-3 align-items-center" action="{{url('pembayaran')}}" method="get">
            <div class="col-12">
                <input type="text" name="cari" id="cari" name="cari" value="{{ $keyword != null ? $keyword  : ''}}" class="form-control" placeholder="Cari data...">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-success ms-3">Cari</a>
            </div>
            </form>
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
                    <th>Aksi</th>

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

                    <td>
                        <a href='{{ url("pembayaran/transaksi") }}' class="btn btn-primary">Transaksi</a>

                    </td>

                </tr>

                @endforeach
                @endif
            </tbody>
    </div>
    </table>
    @endsection