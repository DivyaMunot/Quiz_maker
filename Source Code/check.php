<?php
session_start();

   $con = mysqli_connect('localhost','root');
 
    mysqli_select_db($con,'quizbase');
   ?>


<!DOCTYPE html>
<html>
   <head>
      <title></title>
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
     <div class="container text-center" >
      <br><br>
      <h1 class="text-center text-success text-uppercase animateuse" > Quiz </h1>
      <br><br><br><br>
      <table class="table text-center table-bordered table-hover">
        <tr>
          <th colspan="2" class="bg-dark"> <h1 class="text-white"> Results </h1></th>
          
        </tr>
        <tr>
            <td>
              Questions Attempted
            </td>

           <?php
         // $counter = 0;
         $Resultans = 0;
            if(isset($_POST['submit'])){
              if(!empty($_POST['quizcheck'])) {
            // Counting number of checked checkboxes.
            $checked_count = count($_POST['quizcheck']);
            // print_r($_POST);
            ?>

          <td>
            <?php
            echo "Out of 5, You have attempted ".$checked_count." question."; ?>
            </td>
        
            
            <?php
            $i = 1;
            // Loop to store and display values of individual checked checkbox.
            $selected = $_POST['quizcheck'];
            
            $q1= " select * from questions ";
            $ansresults = mysqli_query($con,$q1);
        
            while($rows = mysqli_fetch_array($ansresults)) {
              $flag = $rows['aid'] == $selected[$i];
              
                  if($flag){

                    $Resultans++;
                  }       
                $i++;   
              }
              ?>
              
        
        <tr>
          <td>
            Your Total score
          </td>
          <td colspan="2">
        <?php 
              echo " Your score is ". $Resultans.".";
              }
              else{
              echo "<b>Please Select Atleast One Option.</b>";
              }
              } 
            ?>
            </td>
            </tr>

            <?php 

            $n = "select qid from questions order by qid desc limit 1";
            $get=mysqli_query($con, $n);
            $row = mysqli_fetch_assoc($get);
            $no_id=$row['qid'];

            $name = $_SESSION['username'];
            $finalresult = " insert into users(u_id, username, totalq, anscorrect) values (next value for uid_seq, '$name', $no_id, '$Resultans') ";
            $queryresult= mysqli_query($con, $finalresult); 
            // if($queryresult){
            //  echo "successssss";
            // }
            ?>
      </table>

        <a href="logout.php" class="btn btn-success"> LOGOUT </a>
      </div>
   </body>
</html>
