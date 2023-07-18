<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kategori.index', [
            "title" => "Kategori",
            "dataKategori" => Kategori::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create', [
            "title" => "Kategori"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ];
        
        Kategori::create($data);
        
        return redirect('/kategori')->with('berhasil', "<strong>Data berhasil ditambahkan!</strong>");
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
        return view('kategori.edit', [
            "title" => "Kategori",
            "dataKategori" => Kategori::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ];
        
        Kategori::where('id', $id)->first()->update($data);
                
        return redirect('/kategori')->with('berhasil', '<strong>Data berhasil diubah!</strong>');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kategori::where('id', $id)->delete();
        
        return redirect('/kategori')->with('berhasil', '<strong>Data berhasil dihapus!</strong>');
    }
}
