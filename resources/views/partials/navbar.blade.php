<!--- CSS --->
@php
	$user = Auth::user();
@endphp
<style type="text/css">
    hr { 
        height: 1px; 
        border: 0; 
    }

    .img-profile{
        width: 250px; height: 250px
    }

    .inline-icon {
       vertical-align: bottom;
       border: 0;
    }  

    .dropdown-menu{
        position: absolute;
    }

    .form-search{
        border: 0;
        text-align:center; 
        color: #615E5E;
    }

    .form-control::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #615E5E;
            opacity: 1; /* Firefox */
    }

    .form-control::-ms-input-placeholder { /* Microsoft Edge */
            color: #615E5E;
    } 

    .cursor{
        cursor: pointer;
    }

</style>
<nav class="navbar navbar-expand-lg py-3" style="background-color: #F7A440;">
    <div class="container-fluid" >
        <div class="container d-flex flex-row">
            <div class="me-auto" id="logo">
                <a class="navbar-brand" href="/user">
                    <img src="/img/logo-iti.png" alt="UPBU" width="40px" class="me-2">
                </a>
            </div>

            <!--- Input Search --->
            <div class="mx-auto" style="padding-right: 16.5%; width: 50%;">
                @if(url()->current() == 'http://127.0.0.1:8000/user' or url()->current() == 'http://127.0.0.1:8000/moderator' or url()->current() == 'http://127.0.0.1:8000/user/search-thread' or 'http://127.0.0.1:8000/moderator/search-thread' and $user->idnumber != 1)
                    <form class="form-group" action="@if($user->idnumber == 2){{route('search-threadModerator')}}@elseif($user->idnumber == 3){{route('search-threadUser')}}@endif" method="post">
                        @csrf
                        <div class="input-group mb-3">
                        <input type="text" class="form-control form-search" name="cari" value="" placeholder="Kamu nyari?" aria-label="search" aria-describedby="basic-addon1">
                        <input type="hidden" name="id" value="{{$user->idnumber}}">
                        <span class="input-group-text inline-icon material-icons" id="basic-addon1" style="background-color: white;">search</span>
                        </div>
                    </form>
                @endif
            </div>

            <!--- Profile Dropdown --->
            <div id="logout" class="cursor">
                <div class="dropdown">
                  <!--- Profile Icon --->
                  <img class="dropdown-toggle rounded-circle"  data-bs-toggle="dropdown" aria-expanded="false" src="http://localhost/user/pix.php/{{$user->id}}/f1.jpg" width="40" height="40">
                  <!--- Profile Dropdown Content --->
                  <div class="dropdown-menu dropdown-menu-dark dropdown-menu-end" style="padding-right: 5%">
                    <div class="dropdown-item">
                        <table>
                            <tr>
                                <td rowspan="2">
                                <!--- Profile Icon --->
                                    <img class="dropdown-toggle rounded-circle"  data-bs-toggle="dropdown" src="http://localhost/user/pix.php/{{$user->id}}/f1.jpg" width="40" height="40" >  
                                </td>
                                <td style="padding-left: 4%;">
                                    <!--- Email --->
                                    <span class="inline-icon material-icons">mail</span> {{$user->email}}
                                    <tr>
                                        <td style="padding-left: 4%;">
                                            {{-- <!--- Prodi ---> --}}
                                            <span class="inline-icon material-icons">hub</span> Program Studi {{$user->institution}}
                                        </td>  
                                    </tr>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <p><hr class="dropdown-divider" style="background-color: #AAAAAA"></p>
                    <!--- Profile Page --->
                    @if ($user->idnumber == 2 or $user->idnumber == 3)
                        <a class="dropdown-item" href="@if($user->idnumber == 2) /moderator/profile @elseif($user->idnumber == 3) /user/profile @endif"><span class="inline-icon material-icons">account_circle</span>Profile</a>
                    @endif
                    <!--- Logout --->
                    <a class="dropdown-item" href="{{url('/logout')}}"><span class="inline-icon material-icons">exit_to_app</span>Logout</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</nav>