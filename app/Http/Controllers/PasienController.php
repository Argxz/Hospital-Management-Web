<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request(key: 'q') != '') {
            $data['pasien'] = \App\Models\Pasien::limit(5)
                // ->latest()
                ->orderBy('nama_pasien', 'asc')
                ->where('nama_pasien', 'like', '%' . request(key: 'q') . '%')
                ->orWhere('kode_pasien', 'like', '%' . request(key: 'q') . '%')
                ->paginate(3);
        } else {
            $data['pasien'] = \App\Models\Pasien::limit(5)
                // ->latest()

                ->paginate(5);
        }
        $data['judul'] = 'DATA PASIEN';
        $data['deskripsi'] = 'Berikut adalah data-data Pasien';

        if(request()->wantsJson()) {
            return response()->json($data);
        }

        return view('pasien_index', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pasien'] = new \App\Models\Pasien();
        $data['route'] = 'pasien.store';
        $data['method'] = 'post';
        $data['tombol'] = 'Simpan';
        $data['judul'] = 'Tambah Data';
        // $data['list_sp'] = [
        //     'Umum' => 'Umum',
        //     'Gigi' => 'Gigi',
        //     'Kandungan' => 'Kandungan',
        //     'Anak' => 'Anak',
        //     'Bedah' => 'Bedah',
        // ];
        
        return view('pasien_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'kode_pasien' => 'required|unique:pasiens,kode_pasien|max:10',
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'alamat' => 'required'
        ]);
        $pasien = new \App\Models\Pasien();
        $pasien->fill($validasiData);
        $pasien->save();
        if(request()->wantsJson()) {
            return response()->json([$pasien,201]);
        }
        flash('Data Berhasil Disimpan');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['pasien'] = \App\Models\Pasien::findOrFail($id);
        $data['route'] = ['pasien.update', $id];
        $data['method'] = 'put';
        $data['tombol'] = 'Perbarui';
        $data['judul'] = 'Edit Data Pasien';

        return view('pasien_form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasiData = $request->validate([
            'kode_pasien' => 'required|unique:pasiens,kode_pasien' . $id,
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'alamat' => 'required'
        ]);
        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->fill($validasiData);
        $pasien->save();

        flash('Data Berhasil Diperbarui');
        return redirect()->route('dokter.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->delete();
        flash('Data berhasil dihapus');
        return back();
    }

    public function laporan()
    {
        $data['pasien'] = \App\Models\Pasien::all();
        $data['judul'] = 'Laporan Data Pasien';
        return view('pasien_laporan', $data);
    }
}
