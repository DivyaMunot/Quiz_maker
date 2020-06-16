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
	<title>Admin</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body background="a9JbHw.jpg">
	<div class="container">
	
		<br>

		<h1 align="center"> Welcome Admin </h1>
		<br>
		<br>
		<br>
		
			<div id="content">
				<form method="POST">

					<legend>Insert Question:</legend>
					<textarea type="text" style="width:100%;" name="question" maxlength="100" required></textarea>
					<?php
						$ques = $_POST['question'];

						$q = " select * from ques_admin where ques='$ques' ";
						$result = mysqli_query($con, $q);
						$num = mysqli_num_rows($result);

						if($num == 1){
							echo "Already exists";
						}else{
							$qy = "insert into ques_admin values(next value for qid_seq, '$ques', next value for ansq_id_seq) ";
							mysqli_query($con, $qy);

						}

					?>

					<legend>Insert possible answers:</legend>
					<label>Option 1</label><input type="text" name="first" required><br>
					<?php
						$answer = $_POST['first'];

							$a = "select qid from ques_admin order by qid desc limit 1 ";
							$result=mysqli_query($con, $a);
							$row = mysqli_fetch_assoc($result);
							$id=$row['qid'];

							$ry = "insert into ans_admin values(next value for aid_seq, '$answer', $id) ";
							mysqli_query($con, $ry);

					?>
					<label>Option 2</label><input type="text" name="second" required><br>
					<?php
						$answer = $_POST['second'];

							$b = "select ans_id from ans_admin order by ans_id desc limit 1 ";
							$result=mysqli_query($con, $b);
							$row = mysqli_fetch_assoc($result);
							$id1=$row['ans_id'];

							$ry = "insert into ans_admin values(next value for aid_seq, '$answer', $id1) ";
							mysqli_query($con, $ry);

					?>
					<label>Option 3</label><input type="text" name="third" required><br>
					<?php
						$answer = $_POST['third'];

							$b = "select ans_id from ans_admin order by ans_id desc limit 1 ";
							$result=mysqli_query($con, $b);
							$row = mysqli_fetch_assoc($result);
							$id1=$row['ans_id'];

							$ry = "insert into ans_admin values(next value for aid_seq, '$answer', $id1) ";
							mysqli_query($con, $ry);

					?>
					<label>Option 4</label><input type="text" name="four" required><br>
					<?php
						$answer = $_POST['four'];

							$b = "select ans_id from ans_admin order by ans_id desc limit 1 ";
							$result=mysqli_query($con, $b);
							$row = mysqli_fetch_assoc($result);
							$id1=$row['ans_id'];

							$ry = "insert into ans_admin values(next value for aid_seq, '$answer', $id1) ";
							mysqli_query($con, $ry);
					?>

					<p align="center">
						<input type="submit" value="Add"> <input type="reset">
					</p>

				</form>
			</div>
			<a href="logout.php" class="btn btn-success"> LOGOUT </a>
	</div>
	
</body>
</html>