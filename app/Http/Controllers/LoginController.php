<?php

namespace App\Http\Controllers;

use App\Models\MdlUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::user()) {
            $user = Auth::user();
            if (empty($user->idnumber)) {
                 return view('index');
            }
            if ($user->idnumber == '1') {
                return redirect('admin');
            } elseif ($user->idnumber == '2') {
                return redirect()->intended('moderator');
            } else {
                return redirect('user');
            }
        }
        return view('index');
    }

    public function process(Request $request)
    {
        $credential = $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ],
        );

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if (empty($user->idnumber)) {
                 return back()->with(['loginError' => 'Role user belum di set'])->onlyInput('username');
            }
            if ($user->idnumber == '1') {
                return redirect('admin');
            } else if ($user->idnumber == '2' || $user->idnumber == '3') {
                return redirect('user');
            }
        }
        return back()->with(['loginError' => 'Username atau password anda salah'])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }
}
