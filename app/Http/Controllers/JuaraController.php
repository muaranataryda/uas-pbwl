<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juara;
use App\Models\Peserta;

class JuaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('juara.index', [
            "title" => "Juara",
            "dataJuara" => Juara::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('juara.create', [
            "title" => "Juara",
            "dataPeserta" => Peserta::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_peserta' => 'required|unique:juara',
            'keterangan' => ''
        ]);
        
        Juara::create($data);
        
        return redirect('/juara')->with('berhasil', "<strong>Data berhasil ditambahkan!</strong>");
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
        return view('juara.edit', [
            "title" => "Juara",
            "dataPeserta" => Peserta::all(),
            "dataJuara" => Juara::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'keterangan' => ''
        ];
        
        $dataJuara = Juara::where('id', $id)->first();
        
        if ($request->id_peserta != $dataJuara->id_peserta) {
            $data['id_peserta'] = 'required|unique:juara';
        }
        
        $validatedData = $request->validate($data);
        Juara::where('id', $id)->first()->update($validatedData);
                
        return redirect('/juara')->with('berhasil', '<strong>Data berhasil diubah!</strong>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Juara::where('id', $id)->delete();
        
        return redirect('/juara')->with('berhasil', '<strong>Data berhasil dihapus!</strong>');
    }
}
