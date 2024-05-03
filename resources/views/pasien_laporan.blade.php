<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Dokter</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <center>
                    <h2>{{ $judul }}</h2>
                </center>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Kode Pasien</td>
                            <td>Nama Pasien</td>
                            <td>Jenis Kelamin</td>
                            <td>Status</td>
                            <td>Alamat</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pasien as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->kode_pasien }}</td>
                                <td>{{ $a->nama_pasien }}</td>
                                <td>{{ $a->jenis_kelamin }}</td>
                                <td>{{ $a->status }}</td>
                                <td>{{ $a->alamat }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h5>Mengetahui</h5>
                <br>
                <br>
                <br>
                <h5>Admin</h5>
            </div>
        </div>
    </div>
</body>

</html>
