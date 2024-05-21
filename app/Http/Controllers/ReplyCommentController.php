<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ThreadCommentReply;
use Illuminate\Support\Facades\DB;

class ReplyCommentController extends Controller
{
    // die('hallow');
    function insert(Request $request)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $replyComment = new ThreadCommentReply;
        $replyComment->body = $request->body;
        $replyComment->user_id = $request->userId;
        $replyComment->thread_comment_id = $request->commentId;
        $replyComment->save();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return back();
    }
}
