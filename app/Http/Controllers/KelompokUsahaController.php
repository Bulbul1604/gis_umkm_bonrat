<?php

namespace App\Http\Controllers;

use App\Models\KelompokUsaha;
use Illuminate\Http\Request;

class KelompokUsahaController extends Controller
{
    public function index()
    {
        $kelompok_usaha = KelompokUsaha::all();
        return view('admin.kel_usaha.index', compact('kelompok_usaha'));
    }

    public function create()
    {
        return view('admin.kel_usaha.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kel_usaha' => 'required|unique:kelompok_usaha,kel_usaha',
        ]);
        $result = KelompokUsaha::create([
            'kel_usaha' => htmlspecialchars(strtolower($request->kel_usaha)),
        ]);
        if ($result) {
            return redirect()->route('admin.kelompok_usaha.index')->with(['message' => 'Data kelompok usaha berhasil ditambahkan.']);
        } else {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $usaha = KelompokUsaha::findOrFail($id);
        return view('admin.kel_usaha.edit', compact('usaha'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kel_usaha' => 'required',
        ]);
        $usaha = KelompokUsaha::findOrFail($id);
        $usaha->kel_usaha = htmlspecialchars(strtolower($request->kel_usaha));
        $result = $usaha->save();
        if ($result) {
            return redirect()->route('admin.kelompok_usaha.index')->with(['message' => 'Data kelompok usaha berhasil dirubah.']);
        } else {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $usaha = KelompokUsaha::findOrFail($id);
        $result = $usaha->delete();
        if ($result) {
            return redirect()->route('admin.kelompok_usaha.index')->with(['message' => 'Data kelompok usaha berhasil dihapus.']);
        } else {
            return redirect()->back();
        }
    }
}
