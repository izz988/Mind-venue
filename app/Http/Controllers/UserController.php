<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Thread;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thread = thread::orderBy('threads.created_at', 'desc')
            ->join('mdl_user', 'user_id', '=', 'mdl_user.id')
            ->select('threads.id', 'title', 'body', 'mdl_user.lastname', 'mdl_user.picture', 'mdl_user.institution','created_at','user_id')
            ->get();

        return view('user.home')->with('thread', $thread);
    }

    function search(Request $request)
    {
        $id = $request->id;
        $cari = $request->cari;
        $thread = thread::orderBy('threads.created_at', 'desc')
            ->where('title', 'like', "%" . $cari . "%")
            ->join('mdl_user', 'user_id', '=', 'mdl_user.id')
            ->select('threads.id', 'title', 'body', 'mdl_user.lastname', 'mdl_user.picture', 'mdl_user.institution','created_at','user_id')
            ->get();
        return view('user.search_thread')->with('thread', $thread)->with('cari', $cari);
    }

    function delete($id)
    {
        thread::where('id', $id)
            ->delete();
        return redirect('moderator');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', ['user' => $user]);
    }

    public function create()
    {
        //
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
