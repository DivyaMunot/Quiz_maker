<!DOCTYPE html>
<html>
<head>
	<title>Quiz</title>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<style type="text/css">
  .animateuse{
      animation: leelaanimate 0.5s infinite;
    }

@keyframes leelaanimate{
      0% { color: red },
      10% { color: yellow },
      20%{ color: blue }
      40% {color: green },
      50% { color: pink }
      60% { color: orange },
      80% {  color: black },
      100% {  color: brown }
    }
</style>
</head>
<body background="a9JbHw.jpg">

	<div class="container">
	
		<br>

		<h1 align="center" class="animateuse"> Welcome to Quiz! </h1>
		<br>
		<br>
		<h3 align="center"> First signin with your username then login with the same username </h3>
		<br>
		<div class="row">
			<div class="col-lg-6">
				<div class="card">

				<h2 class="text-center card-header"> Login Form </h2>

				<form action="validation.php" method="post">
					
					<div class="form-group">
						<label>username	</label>
						<input type="test" name="user" class="form-control">
					</div>

					<div class="form-group">
						<label>password	</label>
						<input type="password" name="password" class="form-control">
					</div>

					<button type="submit" class="btn btn-primary"> Login </button>
				</form>	
				</div>
			</div>

			<div class="col-lg-6">
				<div class="card">
				<h2 class="text-center card-header"> Sign-in Form </h2>

				<form action="registration.php" method="post">
					
					<div class="form-group">
						<label>username	</label>
						<input type="test" name="user" class="form-control">
					</div>

					<div class="form-group">
						<label>password	</label>
						<input type="password" name="password" class="form-control">
					</div>

					<button type="submit" class="btn btn-primary"> Sign-in </button>
				</form>	
				</div>
			</div>

		</div>
	</div>

</body>
</html>