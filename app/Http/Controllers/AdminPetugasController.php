<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminPetugasController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.petugas.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //

        $input = $request -> all();
        if(trim($request->password)=='') {
            $input = $request->except('password');
        } else {
            $input = $request-> all();
            $input['password'] = bcrypt($request->password);
            $input['password'] = Hash::make($input['password']);
        }
        $input['password'] = bcrypt($request->password);

//        if($file = $request->file('photo')){
//
//
//            $name = time() . $file->getClientOriginalName();
//            $file->move('images', $name);
//
//            $input['photo'] = $name;
//        }

        User::create($input);
        return redirect()->route('dashboard.petugas.index')->withSuccess('saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user =User::findOrFail($id);
        return view('dashboard.petugas.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::findOrfail($id);
        if(trim($request->password)=='') {
            $input = $request->except('password');
        }
        $input = $request-> all();
        $input['password'] = bcrypt($request->password);


        $input = $request -> all();
        $input['password'] = bcrypt($request->password);
        $user -> update($input);
        return redirect()->route('dashboard.petugas.index')->withSuccess('saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $user = User::findOrfail($id);
        $user->delete();

//        Session::flash('the user has been deleted');

        return redirect()->route('dashboard.petugas.index')->withSuccess('saved');
    }
}
