<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ThreadComment;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    function insert(Request $request)
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $threadComment = new ThreadComment;
        $threadComment->body = $request->body;
        $threadComment->user_id = $request->userId;
        $threadComment->thread_id = $request->threadId;
        $threadComment->save();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return back();
    }
}
