<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Profil</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

	<style type="text/css">
		.avatar{
            border: 4px solid white;
            border-radius: 250px;
            -webkit-border-radius: 250px;
            -moz-border-radius: 250px;
            display: inline-block;
        }
	</style>

</head>
<body style="background-color: #AAAAAA;">
	@include('partials.navbar')
	@php
		global $DB, $OUTPUT;
        $user = Auth::user();
   
    @endphp
	<div class="container-fluid" style="margin-top: 7%;">
		<div class="row">
			<div class="col-4" style="padding-left: 15%;">
				<div class="avatar">
					<img src="http://localhost/user/pix.php/{{$user->id}}/f1.jpg" class="rounded-circle img-profile" alt="Avatar" />
				</div>
			</div>
			<div class="col-5" style="margin-left: 5%;">
				<div class="form-floating mb-3 mt-3">
				  <input type="text" class="form-control" id="nama" readonly="readonly" name="nama" value="{{$user->firstname.' '.$user->lastname}}">
				  <label for="name">Nama</label>
				</div>
				<div class="form-floating mb-3 mt-3">
				  <input type="text" class="form-control" id="email" readonly="readonly" name="email" value="{{$user->email}}">
				  <label for="email">Email</label>
				</div>
				<div class="form-floating mb-3 mt-3">
				  <input type="text" class="form-control" id="prodi" readonly="readonly" name="prodi" value="{{$user->institution}}">
				  <label for="prodi">Program Studi</label>
				</div>
				<div class="form-floating mb-3 mt-3">
				  <input type="text" class="form-control" id="status" readonly="readonly" name="status" value="{{$user->department}}">
				  <label for="mahasiswa">Status</label>
				</div>
			</div>
		</div>
	</div>
	

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>