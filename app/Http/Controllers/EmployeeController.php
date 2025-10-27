<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller {
    public function index()
    {
        $employees = Employee::latest()->paginate(5);
        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        $department = Department::all();
        $position = Position::all();
        return view('employee.create', compact('department', 'position'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'departemen_id' => 'required|integer|exists:departments,id',
            'jabatan_id' => 'required|integer|exists:positions,id',
            'status' => 'required|string|max:50',
        ]);
        
        Employee::create($request->all());
        return redirect()->route('employees.index');
    }

    public function show(string $id)
    {
        $employee = Employee::find($id);
        return view('employee.show', compact('employee'));
    }

    public function edit(string $id)
    {
        $employee = Employee::find($id);
        $department = Department::all();
        $position = Position::all();
        return view('employee.edit', compact('employee', 'department', 'position'));
    }


    public function update(Request $request, string $id)
    {        
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'departemen_id' => 'required|integer',
            'jabatan_id' => 'required|integer',
            'status' => 'required|string|max:50',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->only([
            'nama_lengkap',
            'email',
            'nomor_telepon',
            'tanggal_lahir',
            'alamat',
            'tanggal_masuk',
            'departemen_id',
            'jabatan_id',
            'status',
        ]));
        
        return redirect()->route('employees.index');
    }

    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employees.index');
    }
}