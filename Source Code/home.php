<?php

session_start();
if(!isset($_SESSION['username'])){
header('location:login.php');
}

$con = mysqli_connect('localhost','root');

mysqli_select_db($con, 'quizbase');

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
</head>
<body background="a9JbHw.jpg">
	<div class="container">


	<br> <h1 class="text-center text-primary"> QUIZ </h1><br>
	
	<h2 class="text-center text-success"> Welcome <?php echo $_SESSION['username']; ?> </h2> <br>

<div class="col-lg-20 m-auto d-block ">
	<div class="card" >

	<h3 class="text-center card-header">  Welcome <?php echo $_SESSION['username']; ?>, You have to solve the 5 questions.</h3>

	 </div><br>

	 <form action="check.php" method="post">

	 <?php


	$n = "select qid from questions order by qid desc limit 1";
	$get=mysqli_query($con, $n);
	$row = mysqli_fetch_assoc($get);
	$no_id=$row['qid'];

	 for($i=1 ; $i <= $no_id ; $i++){
	 $q = " select * from questions where qid = $i";
	 $query = mysqli_query($con, $q);

	 while ($rows = mysqli_fetch_array($query) ) {
	 	?>
	 	
	 	<div class="card">
	 		<h4 class="card-header"> <?php echo $rows['question']  ?>  </h4>

	 		<?php
	 			 $q = " select * from answers where ans_id = $i order by rand() limit 4";
				 $query = mysqli_query($con, $q);

				 while ($rows = mysqli_fetch_array($query) ) {
				 	?>

				 	<div class="card-body">
				 		<input type="radio" name="quizcheck[<?php echo $rows['ans_id']; ?>]" value="<?php echo $rows['aid']; ?>"> 
				 		<?php echo $rows['answer']; ?>

				 	</div>

<?php
	 }
	 }
	}

	 ?>

	 <input type="submit" name="submit" value="Submit" class="btn btn-success m-auto d-block">

</form>
</div>
</div><br><br>
	<br><br>
	</div>
	
</div>

</body>
</html>
