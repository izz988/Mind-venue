<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <style type="text/css">
        .thread-comment{
            width: auto;
            height: auto;
            background-color: white;
            margin-right: 10%;
            margin-left: 10%;
            box-shadow: 5px 10px #888888;
            border-radius: 6px;
        }

        .thread-profile-comment{
            margin-right: 3%;
            margin-left: 3%;
            padding-top: 1%;
            padding-bottom: 1%;
        }

        .comment-input{
            margin-top: 10px;
            border-style: solid; 
            border-width: 1px; 
            border-color: black; 
            padding-left: 20px;
        }

        .comment-button{
            margin-top: 10px;
            border-style: solid; 
            border-width: 1px; 
            border-color: black; 
            border-radius: 16px;
        }

        .comment-button:hover{
            background-color: #AAAAAA;
            color: white;
            border-color: white; 
        }

        .material-icons {
            font-family: 'Material Icons';
            font-weight: normal;
            font-style: normal;
            display: inline-block;
            line-height: 1;
            text-transform: none;
            letter-spacing: normal;
            word-wrap: normal;
            white-space: nowrap;
            direction: ltr;
        }

        .content{
            height: auto;
        }
        
        .thread-card{
            background-color: white;
            width: auto;
            height: auto;
            margin-right: 10%;
            margin-left: 10%;
            margin-top: 25px;
            margin-bottom: 25px;
            padding-bottom: 1%;
            box-shadow: 5px 10px #888888;
            border-radius: 6px;
        }

        .thread-profile{
            margin-right: 3%;
            margin-left: 3%;
            padding-top: 1%;
            padding-bottom: 1%;
        }

        .thread-content{
            margin-left: 10.8%;
            margin-right: 3%;   
        }

        .thread-question{
            border-width: 1px;
            border-style: solid;
            border-radius: 6px; 
            padding :2%;
        }

        .panel {
            display: none;
        }

        .reply-input{
            margin-top: 10px;
            border-style: solid; 
            border-width: 1px; 
            border-color: black; 
            padding-left: 20px;
        }


        .thread-card{
            background-color: white;
            width: auto;
            height: auto;
            margin-right: 10%;
            margin-left: 10%;
            margin-top: 25px;
            margin-bottom: 25px;
            padding-bottom: 1%;
            box-shadow: 5px 10px #888888;
            border-radius: 6px;
        }

        .thread-profile{
            margin-right: 3%;
            margin-left: 3%;
            padding-top: 1%;
            padding-bottom: 1%;
        }

        .thread-content{
            margin-left: 10.8%;
            margin-right: 3%;   
        }

        .thread-question{
            border-width: 1px;
            border-style: solid;
            border-radius: 6px; 
            padding :2%;
        }
    </style>

</head>
<body style="background-color: #AAAAAA;">
    @include('partials.navbar')
    @php
        // dd($threadDetComRep);
	    $user = Auth::user();
    @endphp
    <div class="container-fluid" style="margin-bottom: 5%; margin-top: 50px;">
        <!--- Thread --->
    	<div class="container thread-card">
            <div class="thread-profile">
                @php
                    $dibuat = $threadDetail[0]->created_at->diffForHumans();
                @endphp
                <div>
                    <table>
                    <tr>
                        <td rowspan="2">
                            <!--- Profile Icon --->
                            <img class="dropdown-toggle rounded-circle" data-bs-toggle="dropdown" src="http://localhost/user/pix.php/{{$threadDetail[0]->user_id}}/f1.jpg" width="60" height="60" >
                        </td>
                        <td>
                            <!--- Identity --->
                            <span style="font-size: 24px; padding-left: 20px;"><strong> {{$threadDetail[0]->lastname}}</strong>-{{$threadDetail[0]->institution}}</span>
                            <tr>
                                <td>
                                    <!--- Date --->
                                    <i><span style="font-size: 14px; padding-left: 20px;">{{ $dibuat }}</span></i>
                                </td>  
                            </tr>
                        </td>
                    </tr>
                    </table>  
                </div>
            </div>

            <div class="thread-content">
                <p style="font-size: 18px"><strong>{{$threadDetail[0]->title}}</strong></p>
                <div class="thread-question">
                    <p>{{$threadDetail[0]->body}}</p>
                </div>
            </div>
        </div>
        <!--- Thread --->

        <!--- Kotak Komentar--->
        <div class="container-fluid thread-comment">
            <div class="thread-profile-comment" >
                 <form class="form-group" action="@if($user->idnumber == 2){{route('insert-commentModerator')}}@elseif($user->idnumber == 3){{route('insert-commentUser')}}@endif" method="post">
                    @csrf
                    <div class="row">
                        <!--- Profile--->
                        <div class="col-sm-1">
                            <img class="dropdown-toggle rounded-circle"  data-bs-toggle="dropdown" src="http://localhost/user/pix.php/{{$user->id}}/f1.jpg" width="60" height="60" >  
                        </div>
                        <!--- Input Komentar--->
                        <div class="col" >
                            <textarea name="body" class="form-control comment-input" required></textarea>
                            <input type="hidden" name="userId" value="{{$user->id}}">
                            <input type="hidden" name="threadId" value="{{$threadDetail[0]->id}}">
                        </div>
                        <!--- Button Kementar--->
                        <div class="col-2 div-cmnt">
                            <input type="submit" name="send" class="form-control comment-button" value="Komentar">
                        </div>
                    </div>
                 </form>
            </div>
        </div>
        <!--- Input Koemntar--->
        @if ($threadDetCom->isNotEmpty())
        <!--- Komentar --->
        <div class="content">
            <div class="container thread-card">
               @php
                    $modal = 0;
                    $modalin = 0;
                @endphp
                @foreach ($threadDetCom as $comment)
                <!--- Komentar 1 --->
                <div id="comment">
                    <!--- Profile --->
                    <div class="thread-profile">
                        @php
                            $dibuatcomment = $comment->created_at->diffForHumans();
                        @endphp
                        <div>
                            <table>
                            <tr>
                                <td rowspan="2">
                                <!--- Profile Icon --->
                                    <img class="dropdown-toggle rounded-circle" data-bs-toggle="dropdown" src="http://localhost/user/pix.php/{{$comment->user_id}}/f1.jpg" width="60" height="60" >
                                </td>
                                <td>
                                    <!--- Identity --->
                                    <span style="font-size: 24px; padding-left: 20px;"><strong> {{ $comment->lastname }}</strong> - {{ $comment->institution }}</span>
                                    <tr>
                                        <td>
                                            <!--- Date --->
                                            <i><span style="font-size: 14px; padding-left: 20px;">{{ $dibuatcomment }}</span></i>
                                        </td>  
                                    </tr>
                                </td>
                            </tr>
                            </table>  
                        </div>
                    </div>
                    <div class="thread-content">
                        <div class="thread-question">
                            <p>{{$comment->body}}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end" style="margin-top: 10px">
                        <!--- Button Komentar --->
                        <a href="#reply{{$comment->id}}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Balas" onclick="show({{$comment->id}})">
                            <span class="inline-icon material-icons" style="margin-right: 40px; margin-top: 10px; width: 20px; height: 40px; color: black; font-size: 34px;">reply</span>
                        </a>
                        @if ($user->idnumber == 2)
                        @php
                            $modal += 1;
                        @endphp
                        <button class="btn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirm{{$modal}}">
                            <span class="inline-icon material-icons" style="color: black; font-size: 30px;margin-right: 20px;">delete</span>
                         </button>
                         <div class="modal fade" id="confirm{{$modal}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$modal}}" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel{{$modal}}">Hapus comment <i>{{$comment->lastname}}</i></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <strong>Hapus comment</strong> dari "{{$comment->lastname}}" yang berisi <i>{{$comment->body}}</i>
                               </div>  
                             
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a class="btn btn-danger" href="delete-comment/ {{$comment->id}}/{{$threadDetail[0]->id}}" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                         @endif
                    </div>
                    <!--- Balas Komentar 1 --->
                    <div class="panel" id="reply{{$comment->id}}" style="margin-right: 5%; margin-left: 10%;">
                        <form class="form-group" action="@if($user->idnumber == 2){{route('insert-replyCommentModerator')}}@elseif($user->idnumber == 3){{route('insert-replyCommentUser')}}@endif" method="post">
                            @csrf
                            <div class="row">
                                <!--- Profile --->
                                <div class="col-sm-1">
                                    <div class="thread-profile">
                                         <img class="dropdown-toggle rounded-circle"  data-bs-toggle="dropdown" src="/img/default2.png" width="60" height="60" >
                                    </div>
                                </div>
                                <!--- Input Komentar --->
                                <div class="col" style="padding-left: 20px;">
                                    <textarea name="body" class="form-control reply-input">{{'@'}}{{$comment->lastname}}{{' '}}</textarea> 
                                    <input type="hidden" name="userId" value="{{$user->id}}">
                                    <input type="hidden" name="commentId" value="{{$comment->id}}">
                                </div>
                                <!--- Button Komentar Kirim dan batal --->
                                <div class="col-sm-1" style="margin-top: 10px">
                                    <button class="btn" type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kirim">
                                        <span class="inline-icon material-icons" style="color: black;">send</span>
                                    </button>
                                    <br>
                                    <button class="btn" type="button" href="#reply{{$comment->id}}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cancel" onclick="hide({{$comment->id}})">
                                        <span class="inline-icon material-icons" style="margin-top: 10px; color: black;">cancel</span>
                                    </button> 
                                </div>
                            </div>
                        </form>
                    </div>
                    @foreach($threadDetComRep as $commentReply)
                        @if($comment->id == $commentReply->thread_comment_id)
                        <!--- Sub Komentar 1 --->
                        <div class="thread-profile" style="padding-left: 55px; padding-right: 30px;">
                            <!--- Profile --->
                            @php
                                $dibuatreply = $commentReply->created_at->diffForHumans();
                            @endphp
                            <div>
                                <table>
                                <tr>
                                    <td rowspan="2">
                                    <!--- Profile Icon --->
                                        <img class="dropdown-toggle rounded-circle" data-bs-toggle="dropdown" src="http://localhost/user/pix.php/{{$commentReply->user_id}}/f1.jpg" width="60" height="60" >
                                    </td>
                                    <td>
                                        <!--- Identity --->
                                        <span style="font-size: 24px; padding-left: 35px;"><strong> {{ $commentReply->lastname }}</strong> - {{ $commentReply->institution }}</span>
                                        <tr>
                                            <td>
                                                <!--- Date --->
                                                <i><span style="font-size: 14px; padding-left: 35px;">{{ $dibuatreply }}</span></i>
                                            </td>  
                                        </tr>
                                    </td>
                                </tr>
                                </table>  
                            </div>
                            <!--- Isi Komentar --->
                            <div class="thread-content" style="margin-top: 10px;">
                                <div class="thread-question">
                                    <p>{{$commentReply->body}}</p>
                                </div>
                                <!--- Button Balasan --->
                                <div class="d-flex justify-content-end" style="margin-top: 10px">
                                    <a href="#subreply{{$commentReply->id}}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Balas" onclick="subshow({{$commentReply->id}})">
                                        <span class="inline-icon material-icons" style="margin-right: 20px;margin-top: 10px; width: 20px; height: 40px; color: black; font-size: 34px;">reply</span>
                                    </a>
                                    @if ($user->idnumber == 2)
                                    @php
                                        $modalin += 1;
                                    @endphp
                                    <button class="btn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmin{{$modalin}}">
                                        <span class="inline-icon material-icons" style="color: black; font-size: 30px;">delete</span>
                                     </button>
                                     <div class="modal fade" id="confirmin{{$modalin}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$modalin}}" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel{{$modalin}}">Hapus comment <i>{{$commentReply->lastname}}</i></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            <strong>Hapus comment</strong> dari "{{$commentReply->lastname}}" yang berisi <i>{{$commentReply->body}}</i>
                                           </div>  
                                         
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <a class="btn btn-danger" href="delete-subcomment/ {{$commentReply->id}}/{{$threadDetail[0]->id}}" class="btn btn-primary">Hapus</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                     @endif
                                </div>
                                <!--- Balas Sub Komentar --->
                                <div class="panel" id="subreply{{$commentReply->id}}">
                                    <form class="form-group" action="@if($user->idnumber == 2){{route('insert-replyCommentModerator')}}@elseif($user->idnumber == 3){{route('insert-replyCommentUser')}}@endif" method="post">
                                        @csrf
                                        <div class="row">
                                            <!--- Profile --->
                                            <div class="col-sm-1"padding-left: 5px;">
                                                <div class="thread-profile">
                                                    <img class="dropdown-toggle rounded-circle"  data-bs-toggle="dropdown" src="/img/default2.png" width="60" height="60" >
                                                </div>
                                            </div>
                                            <!--- Input Balasan --->
                                            <div class="col" style="padding-left: 20px;">
                                                <textarea name="body" class="form-control reply-input">{{'@'}}{{$commentReply->lastname}}{{' '}}</textarea>
                                                <input type="hidden" name="userId" value="{{$user->id}}">
                                                <input type="hidden" name="commentId" value="{{$comment->id}}">
                                            </div>
                                            <!--- Button Komentar Kirim dan batal --->
                                            <div class="col-sm-1" style="margin-top: 10px; padding-right: 65px;">
                                                <button class="btn" type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kirim">
                                                    <span class="inline-icon material-icons" style="color: black;">send</span>
                                                </button>
                                                <a href="#reply1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cancel" onclick="subhide({{$commentReply->id}})">
                                                    <span class="inline-icon material-icons" style="margin-top: 10px;margin-left: 10px; color: black;">cancel</span>
                                                </a>    
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    <!--- Sub Komentar 1 --->
                    @endforeach
                    {{-- @endif --}}
                </div>
                @endforeach

            </div>
        </div>
        <!--- Komentar --->            
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function show(id) {
            // console.log(id);
            document.getElementById("reply"+id).style.display = "block";
        }

        function subshow(id) {
            console.log(id);
            document.getElementById("subreply"+id).style.display = "block";
        }

        function hide(id) {
            // console.log(id);
            document.getElementById("reply"+id).style.display = "none";
        }

        function subhide(id) {
            // console.log(id);
            document.getElementById("subreply"+id).style.display = "none";
        }
    </script>
</body>
</html>