@extends('layouts.' . config('app.layout'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $judul }}
                    </div>
                    <div class="card-body">

                        {!! Form::model($pasien, ['route' => $route, 'method' => $method]) !!}
                        <div class="card-body">
                            {!! Form::model($pasien, ['route' => $route, 'method' => $method]) !!}
                            <div class="form-group">
                                <label for="my-input">Kode Pasien</label>
                                {!! Form::text('kode_pasien', null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('kode_pasien') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="my-input">Nama Pasien</label>
                                {!! Form::text('nama_pasien', null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('nama_pasien') }}</span>
                            </div>

                            <div class="form-group">
                                <label for "my-input">Jenis Kelamin</label>
                                {!! Form::select('jenis_kelamin', ['Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan'], null, [
                                    'class' => 'form-control',
                                ]) !!}
                                <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="my-input">Status</label>
                                {!! Form::text('status', null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="my-input">Alamat</label>
                                {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                            </div>
                            <div class="form-group mt-2">
                                <br>
                                {!! Form::submit($tombol, ['class' => 'btn btn-primary']) !!}

                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
