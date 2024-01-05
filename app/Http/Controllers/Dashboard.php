<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\rayon;
use App\Models\User;
use App\Models\Student;
use App\Models\late;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function index()
    {

        return view('dashboard');
    }

    public function indexPS()
    {
        $userIdLogin = Auth::id();
        $rayonIdLogin = rayon::where('user_id', $userIdLogin)->value('id');
        $totalStudents = Student::where('rayon_id', $rayonIdLogin)->count();

        $totalLates = Student::where('rayon_id', $rayonIdLogin)
            ->with('late')
            ->get()
            ->sum(function ($student) {
                return $student->late->count();
            });

        $todayLates = Student::where('rayon_id', $rayonIdLogin)
            ->whereHas('late', function ($query) {
                $query->whereDate('created_at', now()->toDateString());
            })
            ->count();

        return view('ps.dashboard', compact('totalStudents', 'totalLates', 'todayLates', 'rayonIdLogin'));
    }
}
