<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salaries;
use App\Models\Employee;

class SalariesController extends Controller
{
    
    public function index()
    {
        $salaries = Salaries::latest()->paginate(5);
        return view('salaries.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawan = Employee::all();
        return view('salaries.create', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|integer|exists:employees,id',
            'bulan' => 'required|date',
            'tunjangan' => 'required|integer|min:0',
            'potongan' => 'required|integer|min:0',
        ]);

        $employee = \App\Models\Employee::with('position')->find($request->karyawan_id);
        $gaji_pokok = $employee->position->gaji_pokok ?? 0;

        $total_gaji = $gaji_pokok + $request->tunjangan - $request->potongan;

        Salaries::create([
            'karyawan_id' => $request->karyawan_id,
            'bulan' => $request->bulan,
            'gaji_pokok' => $gaji_pokok,
            'tunjangan' => $request->tunjangan,
            'potongan' => $request->potongan,
            'total_gaji' => $total_gaji,
        ]);

        return redirect()->route('salaries.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
