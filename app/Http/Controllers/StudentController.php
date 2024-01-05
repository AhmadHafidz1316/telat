<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\rayon;
use App\Models\rombel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::with('rombel', 'rayon')->orderBy('name', 'ASC')->simplePaginate(5);
        return view('data.siswa.index', compact('student'));
    }

    public function data(Request $request)
    {
        $userIdLogin = Auth::id();
        $rayonIdLogin = rayon::where('user_id', $userIdLogin)->value('id');

        $perPage = $request->input('perPage', 5);
        $search = $request->input('search');

        $students = Student::with('rayon', 'rombel')
            ->where('rayon_id', $rayonIdLogin)
            ->when($search, function ($query) use ($search) {
                $query->where('nis', 'LIKE', '%' . $search . '%')
                    ->orWhere('name', 'LIKE', '%' . $search . '%');
            })
            ->orderBy('created_at', 'ASC')
            ->paginate($perPage);

        return view('ps.siswa', compact('students', 'perPage', 'search'));
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
    public function edit($id)
    {

        $student = Student::find($id);
        $rombel = rombel::all();
        $rayon = rayon::all();
        return view('data.siswa.edit', compact('student', 'rombel', 'rayon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Student::where('id', $id)->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Berhasil mengubah data pengguna !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Student::where('id', $id)->delete();
        return redirect()->route('siswa.index')->with('deleted', 'Berhasil menghapus data!!!');
    }
}
