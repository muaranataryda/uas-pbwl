<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Peserta;
use App\Models\Juara;

class HomeController extends Controller
{
    public function index() {
        return view('home.index', [
            "title" => "Home",
            "totalUser" => count(User::all()),
            "totalKategori" => count(Kategori::all()),
            "totalJuara" => count(Juara::all()),
            "totalPeserta" => count(Peserta::all())
        ]);
    }
}
