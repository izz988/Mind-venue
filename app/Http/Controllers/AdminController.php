<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = DB::table('mdl_user')
            ->orderBy('lastname', 'asc')
            ->select('lastname', 'institution')
            ->where('idnumber', '2')
            ->orWhere('idnumber', '3')
            ->paginate(3);

        return view('admin.index')->with('user', $user);
    }

    public function moderator()
    {

        $moderator = DB::table('mdl_user')
            ->orderBy('lastname', 'asc')
            ->select('lastname', 'institution')
            ->where('idnumber', '2')
            ->paginate(1);

        return view('admin.moderator_admin')->with('moderator', $moderator);
    }

    public function thread()
    {

        $thread = DB::table('threads')
            ->orderBy('threads.created_at', 'desc')
            ->join('mdl_user', 'user_id', '=', 'mdl_user.id')
            ->select('title', 'mdl_user.lastname')
            ->paginate(3);

        return view('admin.thread_admin')->with('thread', $thread);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
