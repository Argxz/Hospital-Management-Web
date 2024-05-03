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

                        {!! Form::model($dokter, ['route' => $route, 'method' => $method]) !!}
                        <div class="card-body">
                            {!! Form::model($dokter, ['route' => $route, 'method' => $method]) !!}
                            <div class="form-group">
                                <label for="my-input">Kode Dokter</label>
                                {!! Form::text('kode_dokter', null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('kode_dokter') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="my-input">Nama Dokter</label>
                                {!! Form::text('nama_dokter', null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('nama_dokter') }}</span>
                            </div>

                            <div class="form-group">
                                <label for ="spesialis_id">Spesialis</label>
                                {!! Form::select('spesialis_id', $list_sp, null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('spesialis_id') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="my-input">Nomor Hp</label>
                                {!! Form::text('nomor_hp', null, ['class' => 'form-control']) !!}
                                <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
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
