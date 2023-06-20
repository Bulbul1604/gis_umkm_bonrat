<?php

namespace App\Http\Controllers;

use App\Models\KelompokUsaha;
use App\Models\Kelurahan;
use App\Models\UMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class  DataUMKMController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $umkmall = UMKM::where('user_id', $user)->get();
        return view('umkm.data.index', compact('umkmall'));
    }
    public function create()
    {
        $userId = Auth::user()->id;
        $userName = Auth::user()->name;
        $kelurahan = Kelurahan::all();
        $kelompok_usaha = KelompokUsaha::all();
        return view('umkm.data.create', compact('userId', 'userName', 'kelurahan', 'kelompok_usaha'));
    }
    public function store(Request $request)
    {
        $request->validate([
            "user_id" => 'required',
            "nama_usaha" => 'required',
            "alamat" => 'required',
            "kelurahan_id" => 'required',
            "kelompok_usaha_id" => 'required',
            "jenis_usaha" => 'required',
            "location" => 'required',
            "keterangan" => 'required',
        ]);
        UMKM::create($request->all());
        return redirect()->route('umkm.data.index')->with(['message' => 'Data umkm berhasil ditambahkan.']);
    }
    public function show($id)
    {
        $umkm = UMKM::findOrFail($id);
        return view('umkm.data.show', compact('umkm'));
    }
    public function edit($id)
    {
        $userId = Auth::user()->id;
        $userName = Auth::user()->name;
        $kelurahan = Kelurahan::all();
        $kelompok_usaha = KelompokUsaha::all();
        $umkm = UMKM::findOrFail($id);
        return view('umkm.data.edit', compact('userId', 'userName', 'kelurahan', 'kelompok_usaha', 'umkm'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "user_id" => 'required',
            "nama_usaha" => 'required',
            "alamat" => 'required',
            "kelurahan_id" => 'required',
            "kelompok_usaha_id" => 'required',
            "jenis_usaha" => 'required',
            "location" => 'required',
            "keterangan" => 'required',
        ]);
        $umkm = UMKM::findOrFail($id);
        $umkm->update($request->all());
        return redirect()->route('umkm.data.index')->with(['message' => 'Data umkm berhasil dirubah.']);
    }
    public function destroy($id)
    {
        $umkm = UMKM::findOrFail($id);
        $umkm->delete();
        return redirect()->route('umkm.data.index')->with(['message' => 'Data umkm berhasil dihapus.']);
    }
}
