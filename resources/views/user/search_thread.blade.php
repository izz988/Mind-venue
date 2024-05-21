<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
    <style type="text/css"> 
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
    	.thread-card:hover {
            background-color: grey;
            color: white;
            box-shadow: 5px 10px #A0A0A0;
            cursor: pointer;
        }

    </style>

</head>
@include('partials.main')
<body>
    @include('partials.navbar')
     @php
        $user = Auth::user();
    @endphp

    <div style="margin-bottom: 5%; margin-top: 50px;">
        <div class="alert alert-primary">
                Hasil pencarian dari "<strong>{{ $cari }}</strong>"
            </div>
        @php
            $modal = 0;
        @endphp
        @forelse ($thread as $thr)
        @php
            $modal += 1;
        @endphp
    	<!--- Thread 1 --->
       <div class="row" style="margin-right: 5%; margin-left: 5%;">
            <div class="col-11" style="padding-left: 10%;">
                <div class="container thread-card" onclick="location.href='{{$thr->id}}/thread'">
                    <div class="thread-profile">
                        @php
                            $dibuat = $thr->created_at->diffForHumans();
                        @endphp
                        <div>
                            <table>
                            <tr>
                                <td rowspan="2">
                                <!--- Profile Icon --->
                                    <img class="dropdown-toggle rounded-circle" data-bs-toggle="dropdown" src="http://localhost/user/pix.php/{{$thr->user_id}}/f1.jpg" width="60" height="60" >
                                </td>
                                <td>
                                    <!--- Identity --->
                                    <span style="font-size: 24px; padding-left: 10px;"><strong> {{ $thr->lastname }}</strong> - {{ $thr->institution }}</span>
                                    <tr>
                                        <td>
                                            {{-- <!--- Date ---> --}}
                                             <span style="font-size: 14px; padding-left: 10px;">{{ $dibuat }}</span>
                                        </td>  
                                    </tr>
                                </td>
                            </tr>
                            </table>  
                        </div>   
                    </div>

                    <div class="thread-content">
                        <p style="font-size: 18px"><strong>{{ $thr->title }}</strong></p>
                        <div class="thread-question">
                            <p>{{ $thr->body }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"  style="padding-right: 70px;">
                @if ($user->idnumber == 2)
                     <div class="hps" style="margin-top: 20px">
                         <button class="btn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirm{{$modal}}">
                            <span class="inline-icon material-icons" style="color: black; font-size: 34px;">delete</span>
                         </button>
                         <!-- Modal -->
                            <div class="modal fade" id="confirm{{$modal}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus thread <i>{{$thr->title}}</i></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <strong>Hapus thread</strong> dari "{{$thr->lastname}}" yang berjudul <i>{{$thr->title}}</i>
                                  </div>                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a class="btn btn-danger" href="{{route('delete-thread', [$thr->id])}}" class="btn btn-primary">Hapus</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                     </div>
                @endif
            </div>
        </div>
         @empty
            <div class="alert alert-danger">
                Thread tidak ditemukan.
            </div>
        <!--- Thread 1 --->
         @endforelse

    </div>
</body>
</html>