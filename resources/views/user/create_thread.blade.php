<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <style type="text/css">
        .thread-create{
            margin-left: 10%;
            margin-right: 10%;   
        }
	
    </style>

</head>
<body style="background-color: #AAAAAA;">
    @include('partials.navbar')
    @php
	    $user = Auth::user();
    @endphp
    <div class="container" style="margin-top: 50px;">
    	<div class="row justify-content-md-center">
    		<div class="col col-lg-2" style="margin-right: 150px">
    			<a type="button" href="/user" class="btn btn-lg border border-secondary" style="background-color: #F6DCBF; border-radius: 24px;">Thread Baru</a>
    		</div>
    		<div class="col col-lg-2">
    			<a type="button" href="" style="background-color: #E1701A; color: white; border-radius: 24px;" class="btn btn-lg border border-secondary" >Buat Thread</a>
    		</div>
    	</div>
    </div>

    <div style="margin-bottom: 5%; margin-top: 50px;">
        <form class="form-group" action="@if($user->idnumber == 2){{route('insert-threadModerator')}}@elseif($user->idnumber == 3){{route('insert-threadUser')}}@endif" method="post">
        @csrf
        	<div class="form-floating mb-3 mt-3 thread-create">
                <input type="text" class="form-control" id="title" name="title" value="" required>
                <label for="title">Judul Thread</label>
            </div>
            <div class="form-floating mb-3 mt-3 thread-create">
                <textarea class="form-control" id="body" name="body" style="resize: none; height: 200px;" required></textarea>
                <label for="body">Deskripsi Thread</label>
            </div>
            <div class="container thread-create" style="margin-top: 50px;">
                <div class="row justify-content-between">
                    <div class="col col-lg-2">
                        <input type="reset" href="" class="btn btn-danger border border-secondary" style="; width: 100px; border-radius: 24px;" value="Batal">
                    </div>
                    <div class="col col-lg-2">
                        <input type="submit" href="" style="background-color: #E1701A; color: white; border-radius: 24px;" class="btn border border-secondary" value="Buat Thread" >
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>