<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendance = Attendance::latest()->paginate(5);
        return view('attendance.index', compact('attendance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawan = Employee::all();
        return view('attendance.create', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|integer|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required|date_format:H:i',
            'waktu_keluar' => 'required|date_format:H:i',
            'status_absensi' => 'required|string|max:40'
        ]);

        Attendance::create($request->all());
        return redirect()->route('attendance.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attendance = Attendance::find($id);
        return view('attendance.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attendance = Attendance::find($id);
        return view('attendance.edit', compact('attendance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'karyawan_id' => 'required|integer|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required|date_format:H:i:s',
            'waktu_keluar' => 'required|date_format:H:i:s',
            'status_absensi' => 'required|string|max:40'
        ]);
        $attendance = Attendance::find($id);
        $attendance->update($request->only([
            'karyawan_id',
            'tanggal',
            'waktu_masuk', 
            'waktu_keluar', 
            'status_absensi'
        ]));

        return redirect()->route('attendance.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attendance = Attendance::find($id);
        $attendance->delete();
        return redirect()->route('attendance.index');
    }
}
