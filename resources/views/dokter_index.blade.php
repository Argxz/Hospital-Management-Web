@extends('layouts.' . config('app.layout'), ['title' => 'Data Dokter'])

@section('content')
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">

                        {{ $judul }}

                    </div>
                    <div class="card-body">


                        <form action="">
                            <td>Pencarian Dokter : </td>
                            <input type="text" name="q" value="{{ request('q') }}">
                        </form>

                        {{ $deskripsi }}

                    </div>
                    <div>
                        Total Data : {{ $dokter->count() }}
                    </div>
                    <table class="table table-light table-bordered ">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Dokter</td>
                                <td>Kode Dokter</td>
                                <td>Spesialis</td>
                                <td>Nomor Hp</td>
                                <td>Dibuat Pada</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokter as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_dokter }}</td>
                                    <td>{{ $item->kode_dokter }}</td>
                                    <td>{{ $item->spesialis->nama }}</td>
                                    <td>{{ $item->nomor_hp }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('dokter.edit', $item->id) }}" class="btn btn-primary">
                                            Edit
                                        </a>
                                        {!! Form::open([
                                            'route' => ['dokter.destroy', $item->id],
                                            'method' => 'delete',
                                            'style' => 'display:inline',
                                        ]) !!}
                                        {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('dokter.create') }}" class="btn btn-success">Tambah Dokter</a>
                    <br>
                    {{ $dokter->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection
