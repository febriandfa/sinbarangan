<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($role)
    {
        if ($role == "guru") {
            return view('admin.user.createGuru');
        } else {
            return view('admin.user.createSiswa');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $role)
    {
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalName();
            $fileName = date('YmdHis') . "." . $extension;
            $file->move(storage_path('app/public/profil'), $fileName);
        }

        if ($role == "guru") {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'kelas' => $request->kelas,
                'nip' => $request->nip,
                'foto' => $fileName,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole('guru');
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'kelas' => $request->kelas,
                'no_absen' => $request->no_absen,
                'foto' => $fileName,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole('siswa');
        }

        return redirect()->route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, $role)
    {
        $users = User::where('id', $id)->first();

        if ($role == "guru") {
            return view('admin.user.showGuru', compact('users'));
        } else {
            return view('admin.user.showSiswa', compact('users'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, $role)
    {
        $users = User::where('id', $id)->first();

        if ($role == "guru") {
            return view('admin.user.editGuru', compact('users'));
        } else {
            return view('admin.user.editSiswa', compact('users'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::findOrFail($id);

        if ($request->hasFile('foto')) {
            Storage::delete("public/profil/" . $users->file);

            $file = $request->file('foto');
            $extension = $file->getClientOriginalName();
            $fileName = date('YmdHis') . "." . $extension;
            $file->move(storage_path('app/public/profil'), $fileName);
        } else {
            $fileName = $users->file;
        };

        $usersUpdate = $request->all();
        $usersUpdate['foto'] = $fileName;

        $users->update($usersUpdate);

        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id);

        $users->delete();

        return redirect()->back();
    }
}
