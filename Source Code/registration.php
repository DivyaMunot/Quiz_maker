<?php

session_start();
header('location:login.php');

$con = mysqli_connect('localhost', 'root');

if ($con){
	echo "connection successful";
}else{
	echo "connection unsuccessful";
}

mysqli_select_db($con, 'logindb');

$name = $_POST['user'];
$pass = $_POST['password'];

$q = " select * from signin where name='$name' && password = '$pass' ";

$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);

if($num == 1){
	echo "Already exists";
}else{

	$qy = "insert into signin (id, name, password) values(next value for id_seq, '$name', '$pass') ";
	mysqli_query($con, $qy);
}

?>