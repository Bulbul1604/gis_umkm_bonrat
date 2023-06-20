<?php

namespace App\Http\Controllers;

use App\Models\KelompokUsaha;
use App\Models\Kelurahan;
use App\Models\UMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $umkm = UMKM::all();
        $kel_usaha = KelompokUsaha::all();
        $kelurahan = Kelurahan::all();
        $user = Auth::user()->id;
        $umkmPelaku = UMKM::where('user_id', $user)->get();

        return view('home', compact('umkm', 'kel_usaha', 'kelurahan', 'umkmPelaku'));
    }
}
