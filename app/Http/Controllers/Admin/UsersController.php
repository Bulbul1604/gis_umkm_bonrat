<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => "required|min:4",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:6|confirmed",
            "level" => "required|in:admin,umkm",
        ]);
        if ($validate) {
            User::create([
                'name' => htmlspecialchars(strtolower($request->name)),
                'email' => htmlspecialchars(strtolower($request->email)),
                'password' => Hash::make($request->password),
                'level' => htmlspecialchars(strtolower($request->level)),
            ]);
            return redirect()->route('admin.users.index')->with(['message' => 'Data user berhasil ditambahkan.']);
        } else {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            "name" => "required|min:4",
            "email" => "required|email",
            "password" => "required|min:6|confirmed",
            "level" => "required|in:admin,umkm",
        ]);
        if ($validate) {
            $user = User::findOrFail($id);
            $user->name = htmlspecialchars(strtolower($request->name));
            $user->email = htmlspecialchars(strtolower($request->email));
            $user->password = Hash::make($request->password);
            $user->level = $request->level;
            $user->save();
            return redirect()->route('admin.users.index')->with(['message' => 'Data user berhasil dirubah.']);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = User::findOrFail($id);
        $id->delete();
        return redirect()->route('admin.users.index')->with(['message' => 'Data Berhasil Dihapus']);
    }
}
