<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tour</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<style type="text/css">
		form{
			width: 500px;
		}
	</style>
</head>
<body>
    <center>
        <h1>INSERT TOUR</h1>

		<form method="post">
			@csrf
		    <br>
		    <input type="" class="form-control" placeholder="name" name="name">
		    <br>
            <input type="" class="form-control" placeholder="typetour " name="typetour">
            <br>
            <input type="" class="form-control" placeholder="schedule " name="schedule">
            <br>
            <input type="date" class="form-control" placeholder="depart " name="depart">
            <br>
            <input type="" class="form-control" placeholder="number " name="number">
            <br>
            <input type="" class="form-control" placeholder="price " name="price">
            <br>
            <input type="file" name="myFile" id="myFile">
            <br>
		    <button type="submit" class="btn btn-success" name="ok">OK</button>
		</form>
		<div>
        	@include('error')
    	</div>
	</center>
</body>
</html>
