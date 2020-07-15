<?php

namespace App\Http\Controllers;

use App\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPenyakitController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            $penyakit = Penyakit::all();
            return view('dashboard.penyakit.index', compact('penyakit'));
        }
        return view('auth.login');

    }

    public function create()
    {
        //
        $user = Auth::user();

        if ($user) {
            return view('dashboard.penyakit.create');
        }
        return view('auth.login');

    }

    public function store(Request $request)
    {
        $input = $request -> all();
        Penyakit::create($input);
        return redirect()->route('dashboard.penyakit.index')->withSuccess('saved');
    }
}
