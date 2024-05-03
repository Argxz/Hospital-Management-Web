@extends('layouts.' . config('app.layout'), ['title' => 'Data Pasien'])

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
                            <td>Pencarian Pasien : </td>
                            <input type="text" name="q" value="{{ request('q') }}">
                        </form>

                        {{ $deskripsi }}

                    </div>

                    <div>
                        Total Data : {{ $pasien->count() }}
                    </div>


                    <table class="table table-light table-bordered ">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Pasien</td>
                                <td>Kode Pasien</td>
                                <td>Jenis Kelamin</td>
                                <td>Status</td>
                                <td>Alamat</td>
                                <td>Dibuat Pada</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasien as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_pasien }}</td>
                                    <td>{{ $item->kode_pasien }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('pasien.edit', $item->id) }}" class="btn btn-primary">
                                            Edit
                                        </a>
                                        {!! Form::open([
                                            'route' => ['pasien.destroy', $item->id],
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
                    <a href="{{ route('pasien.create') }}" class="btn btn-success">Tambah Pasien</a>
                    <br>
                    {{ $pasien->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection
