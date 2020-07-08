<?php

namespace App\Http\Controllers;

use App\Penyakit;
use Illuminate\Http\Request;

class AdminPenyakitController extends Controller
{
    //
    public function index()
    {
        $penyakit = Penyakit::all();
        return view('dashboard.penyakit.index', compact('penyakit'));
    }

    public function create()
    {
        //
        return view('dashboard.penyakit.create');
    }

    public function store(Request $request)
    {
        $input = $request -> all();
        Penyakit::create($input);
        return redirect()->route('dashboard.penyakit.index')->withSuccess('saved');
    }
}
