<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request(key: 'q') != '') {
            $data['dokter'] = \App\Models\Dokter::limit(3)
                // ->latest()
                ->orderBy('nama_dokter', 'asc')
                ->where('nama_dokter', 'like', '%' . request(key: 'q') . '%')
                ->orWhere('kode_dokter', 'like', '%' . request(key: 'q') . '%')
                ->paginate(3);
        } else {
            $data['dokter'] = \App\Models\Dokter::limit(3)
                // ->latest()

                ->paginate(3);
        }


        //import ke indexs

        $data['judul'] = 'DATA DOKTER';
        $data['deskripsi'] = 'Berikut adalah data-data dokter';


        return view('dokter_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['dokter'] = new \App\Models\Dokter();
        $data['route'] = 'dokter.store';
        $data['method'] = 'post';
        $data['tombol'] = 'Simpan';
        $data['judul'] = 'Tambah Data';
        $data['list_sp'] = \App\Models\Spesialis::pluck('nama', 'id');
        // [
        //     'Umum' => 'Umum',
        //     'Gigi' => 'Gigi',
        //     'Kandungan' => 'Kandungan',
        //     'Anak' => 'Anak',
        //     'Bedah' => 'Bedah',
        // ]
        return view('dokter_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'kode_dokter' => 'required|unique:dokters,kode_dokter|max:10',
            'nama_dokter' => 'required',
            'spesialis_id' => 'required',
            'nomor_hp' => 'required'
        ]);
        $dokter = new \App\Models\Dokter();
        $dokter->fill($validasiData);
        $dokter->save();

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
        $data['dokter'] = \App\Models\Dokter::findOrFail($id);
        $data['route'] = ['dokter.update', $id];
        $data['method'] = 'put';
        $data['tombol'] = 'Perbarui';
        $data['judul'] = 'Edit Data Dokter';
        $data['list_sp'] = \App\Models\Spesialis::pluck('nama', 'id');
        return view('dokter_form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasiData = $request->validate([
            'kode_dokter' => 'required|unique:dokters,kode_dokter' . $id,
            'nama_dokter' => 'required',
            'spesialis_id' => 'required',
            'nomor_hp' => 'required'
        ]);
        $dokter = \App\Models\Dokter::findOrFail($id);
        $dokter->fill($validasiData);
        $dokter->save();

        flash('Data Berhasil Diperbarui');
        return redirect()->route('dokter.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokter = \App\Models\Dokter::findOrFail($id);
        $dokter->delete();
        flash('Data berhasil dihapus');
        return back();
    }

    public function laporan()
    {
        $data['dokter'] = \App\Models\Dokter::all();
        $data['judul'] = 'Laporan Data Dokter';
        return view('dokter_laporan', $data);
    }
}
