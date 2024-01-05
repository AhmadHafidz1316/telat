<?php

namespace App\Http\Controllers;

use App\Models\late;
use App\Models\Student;
use App\Models\rayon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
use Excel;
use App\Exports\StudentExports;
use App\Exports\lateExportPs;
use Illuminate\Support\Facades\Auth;

class LateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $late = late::with('student')->orderBy('student_id', 'ASC')->simplePaginate(5);
        $groupedLates = $late->groupBy('student_id');
        return view('keterlambatan.index', compact('late', 'groupedLates'));
    }

    public function data(Request $request)
    {
        $userIdLogin = Auth::id();
        $rayonIdLogin = rayon::where('user_id', $userIdLogin)->value('id');

        $perPage = $request->input('perPage', 5);
        $search = $request->input('search');

        $query = Student::with(['rayon', 'rombel'])
            ->where('rayon_id', $rayonIdLogin);

        $query->when($search, function ($query) use ($search) {
            $query->where('nis', 'LIKE', '%' . $search . '%')
                ->orWhere('name', 'LIKE', '%' . $search . '%');
        });

        $students = $query->get();

        $students->each(function ($student) {
            $student->lates = late::where('student_id', $student->id)->get();
        });

        $latesQuery = late::whereIn('student_id', $students->pluck('id'))->orderBy('created_at', 'ASC');

        $late = ($perPage === 'all') ? $latesQuery->get() : $latesQuery->simplePaginate($perPage);

        return view('ps.keterlambatan', compact('students', 'late', 'search', 'perPage'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = Student::all();
        return view('keterlambatan.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'student_id' => 'required',
            'information' => 'required',
            'bukti' => 'required'
        ]);

        $extension = $request->name . '.' . $request->bukti->extension();
        $input = $request->file('bukti')->storeAs('public/buktis', $extension);

        late::create([
            'student_id' => $request->student_id,
            'date_time_late' => Carbon::now(),
            'information' => $request->information,
            'bukti' => 'buktis/' . $extension
        ]);

        return redirect()->route('telat.index')->with('success', 'berhasil menambahkan data!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show($student_id)
    {
        $lateStudentId = Late::where('id', $student_id)->value('student_id');
        $student = Student::where('id', $lateStudentId)->first();
        $lates = late::where('student_id', $lateStudentId)->get();
        return view('keterlambatan.bukti', compact('student', 'lates'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $students = Student::all();
        $late = late::where('student_id', $id)->first();
        return view('keterlambatan.edit', compact('late', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        late::where('id', $id)->update([
            'student_id' => $request->student_id,
            'date_time_late' => Carbon::now(),
            'information' => $request->information,
            'bukti' => $request->bukti,
        ]);

        return redirect()->route('telat.index')->with('success', 'Berhasil mengubah data pengguna !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        late::where('id', $id)->delete();
        student::where('id', $id)->delete();
        return redirect()->route('telat.index')->with('deleted', 'Berhasil menghapus data!!!');
    }

    public function downloadPDF($id)
    {
        $late = Late::with('student')->where('student_id', $id)->first();

        if (!$late) {
            return response()->json(['error' => 'ID not found'], 404);
        }

        $relatedLates = Late::where('student_id', $late->student_id)->orderBy('date_time_late', 'ASC')->get();
        $students = $relatedLates->pluck('student')->unique('id')->values();

        $lateByStudent = $relatedLates->groupBy('student.id');

        view()->share('late', $relatedLates);
        view()->share('students', $students);
        view()->share('lateByStudent', $lateByStudent);

        $pdf = PDF::loadView('keterlambatan.download-pdf', compact('relatedLates', 'students', 'lateByStudent'));

        return $pdf->download('telat.pdf');
    }


    public function exportExcel()
    {
        $role = auth()->user()->role;

        if ($role === 'admin') {
            return Excel::download(new StudentExports, 'keterlambatan.xlsx');
        } else {
            $userIdLogin = Auth::id();
            $rayonIdLogin = rayon::where('user_id', $userIdLogin)->value('id');

            return Excel::download(new lateExportPs($userIdLogin, $rayonIdLogin), 'keterlambatan.xlsx');
        }
    }
}
