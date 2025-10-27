<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller {

    public function index()
    {
        $position = Position::latest()->paginate(5);
        return view('position.index', compact('position'));
    }

    public function create()
    {
        return view('position.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "nama_jabatan" => 'required|string|max:255',
            "gaji_pokok" => 'required|integer'
        ]);

        Position::create([
            "nama_jabatan" => $request->nama_jabatan,
            "gaji_pokok" => $request->gaji_pokok
        ]);

        return redirect()->route('position.index')->with('success', 'Jabatan berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $position = Position::find($id);
        return view('position.show', compact('position'));
    }

    public function edit(string $id)
    {
        $position = Position::find($id);
        return view('position.edit', compact('position'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            "nama_jabatan" => 'required|string|max:255',
            "gaji_pokok" => 'required|numeric|min:0'
        ]);
        $position = Position::find($id);
        $position->update($request->only([
            "nama_jabatan",
            "gaji_pokok"
        ]));
        return redirect()->route('position.index');
    }

    public function destroy(string $id)
    {
        $position = Position::find($id);
        $position->delete();
        return redirect()->route('position.index');
    }
}