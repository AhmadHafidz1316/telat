<?php

namespace App\Http\Controllers;

use App\Models\rayon;
use App\Models\User;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayons = rayon::with('user')->orderBy('rayon', 'ASC')->simplePaginate(5);
        $users = User::where('role', 'ps')->get();
        return view('data.rayon.index', compact('rayons', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'ps')->get();
        return view('data.rayon.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]);

        rayon::create([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('rayon.index')->with('success', 'Berhasil Menambah !!! ');
    }

    /**
     * Display the specified resource.
     */
    public function show(rayon $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rayon = rayon::find($id);
        $users = User::where('role', 'ps')->get();
        return view('data.rayon.edit', compact('rayon', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        rayon::where('id', $id)->update([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('rayon.index')->with('success', 'Berhasil mengubah data pengguna !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        rayon::where('id', $id)->delete();
        return redirect()->route('rayon.index')->with('deleted', 'Berhasil menghapus data!!!');
    }
}
