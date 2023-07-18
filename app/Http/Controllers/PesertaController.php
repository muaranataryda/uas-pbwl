<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Kategori;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('peserta.index', [
            "title" => "Peserta",
            "dataPeserta" => Peserta::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peserta.create', [
            "title" => "Peserta",
            "dataKategori" => Kategori::all(),
            "no_peserta" => Peserta::all()->count() + 1
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_kategori' => '',
            'nik' => 'required|unique:peserta',
            'no_peserta' => 'required|unique:peserta',
            'nama' => '',
            'hp' => '',
            'jenis_kelamin' => '',
            'tgl_lahir' => '',
            'alamat' => ''
        ]);
        
        Peserta::create($data);
        
        return redirect('/peserta')->with('berhasil', "<strong>Data berhasil ditambahkan!</strong>");
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
        return view('peserta.edit', [
            "title" => "Peserta",
            "dataKategori" => Kategori::all(),
            "dataPeserta" => Peserta::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'id_kategori' => '',
            'no_peserta' => '',
            'nama' => '',
            'hp' => '',
            'jenis_kelamin' => '',
            'tgl_lahir' => '',
            'alamat' => ''
        ];
        
        $dataPeserta = Peserta::where('id', $id)->first();
        
        if ($request->nik != $dataPeserta->nik) {
            $data['nik'] = 'required|unique:peserta';
        }
        
        $validatedData = $request->validate($data);
        Peserta::where('id', $id)->first()->update($validatedData);
                
        return redirect('/peserta')->with('berhasil', '<strong>Data berhasil diubah!</strong>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Peserta::where('id', $id)->delete();
        
        return redirect('/peserta')->with('berhasil', '<strong>Data berhasil dihapus!</strong>');
    }
}
