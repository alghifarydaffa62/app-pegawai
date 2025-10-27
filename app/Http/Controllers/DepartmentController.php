<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller {

    public function index()
    {
        $department = Department::latest()->paginate(5);
        return view('department.index', compact('department'));
    }

    public function create()
    {
        return view('department.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:255'
        ]);

        Department::create([
            'nama_departemen' => $request->nama_departemen,
        ]);

        return redirect()->route('department.index')->with('success', 'Departemen berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $department = Department::find($id);
        return view('department.show', compact('department'));
    }

    public function edit(string $id)
    {
        $department = Department::find($id);
        return view('department.edit', compact('department'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:255'
        ]);
        $department = Department::findOrfail($id);
        $department->update($request->only([
            'nama_departemen'
        ]));

        return redirect()->route('department.index');
    }

    public function destroy(string $id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect()->route('department.index');
    }
}
