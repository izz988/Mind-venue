<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\ThreadComment;
use App\Models\ThreadCommentReply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ThreadController extends Controller
{
    function index($id)
    {
        $threadDetail = Thread::join('mdl_user', 'user_id', '=', 'mdl_user.id')
            ->select('threads.id', 'title', 'body', 'mdl_user.lastname', 'mdl_user.picture', 'mdl_user.institution', 'created_at','user_id')
            ->where('threads.id', '=', $id)
            ->get();

        $threadDetCom = ThreadComment::join('mdl_user', 'user_id', '=', 'mdl_user.id')
            ->select('thread_comments.id', 'body', 'mdl_user.lastname', 'mdl_user.picture', 'mdl_user.institution', 'created_at', 'user_id')
            ->where('thread_comments.thread_id', '=', $id)
            ->get();

        $threadDetComRep = ThreadCommentReply::join('mdl_user', 'user_id', '=', 'mdl_user.id')
            ->select('thread_comment_replies.id', 'thread_comment_replies.thread_comment_id', 'body', 'mdl_user.lastname', 'mdl_user.picture', 'mdl_user.institution', 'created_at', 'user_id')
            ->get();

        return view('user.thread', [
            'threadDetail' => $threadDetail,
            'threadDetCom' => $threadDetCom,
            'threadDetComRep' => $threadDetComRep,
        ]);
    }

    function delete_com($tid,$cid){
        DB::table('thread_comments')
            ->where('id', $cid)
            ->delete();
        return redirect('moderator/'.$tid.'/thread');
    }

    function delete_subcom($tid,$cid){
        DB::table('thread_comment_replies')
            ->where('id', $cid)
            ->delete();
        return redirect('moderator/'.$tid.'/thread');
    }


    function create()
    {
        return view('user.create_thread');
    }

    function insert(Request $request)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $user = Auth::user();
        $thread = new thread;
        $thread->title = $request->title;
        $thread->body = $request->body;
        $thread->user_id = $user->id;
        $thread->save();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return redirect('user')->with('status', 'Thread Has Been created');
    }
}
