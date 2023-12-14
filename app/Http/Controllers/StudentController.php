<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\rayon;
use App\Models\rombel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayon = rayon::all();
        $rombel = rombel::all();
        return view('data.siswa.index', compact('rayon', 'rombel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rayon = rayon::all();
        $rombel = rombel::all();
        return view('data.siswa.create', compact('rayon', 'rombel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);

        Student::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data berhasil di tambah !!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
