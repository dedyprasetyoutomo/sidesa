<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    public function index()
    {
        $residents = Resident::all();
        return view('pages.resident.index',['residents'=>$residents,]);
    }

    public function create()
    {
        return view('pages.resident.index');
    }

     public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => ['required', 'min:16', 'max:16'],
            'name' => ['required', 'max:100'],

        ]);
    }

    public function edit($id)
    {
        $residents = Resident::findOrFail($id);
        
        return view('pages.resident.index', ['resident'=>$residents,]);
    }

     public function destroy($id)
    {
        $residents = Resident::findOrFail($id);
        $residents -> delete();
        
        return redirect('/resident')->with('success', 'Berhasil menghapus data');
    }
}
