<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function index()
    {
        $kelurahan = Kelurahan::all();
        return view('admin.kelurahan.index', compact('kelurahan'));
    }

    public function create()
    {
        return view('admin.kelurahan.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name_kel' => 'required|unique:kelurahan,name_kel']);
        $result = Kelurahan::create([
            'name_kel' => htmlspecialchars(strtolower($request->name_kel)),
        ]);
        if ($result) {
            return redirect()->route('admin.kelurahan.index')->with(['message' => 'Data kelurahan berhasil ditambahkan.']);
        } else {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $kel = Kelurahan::findOrFail($id);
        return view('admin.kelurahan.edit', compact('kel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_kel' => 'required',
        ]);
        $kel = Kelurahan::findOrFail($id);
        $kel->name_kel = htmlspecialchars(strtolower($request->name_kel));
        $result = $kel->save();
        if ($result) {
            return redirect()->route('admin.kelurahan.index')->with(['message' => 'Data kelurahan berhasil dirubah.']);
        } else {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $kel = Kelurahan::findOrFail($id);
        $result = $kel->delete();
        if ($result) {
            return redirect()->route('admin.kelurahan.index')->with(['message' => 'Data kelurahan berhasil dihapus.']);
        } else {
            return redirect()->back();
        }
    }
}
