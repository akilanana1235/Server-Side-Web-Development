<?php
session_start();
include("db.php");

$pagename = "Your Login Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>" . $pagename . "</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>" . $pagename . "</h4>"; //display name of the page on the web page
//display random text

$email = $_POST['email'];
$password = $_POST['password'];


if(!(empty($email) or empty($password))){


  $sqlEm="select * from Users where userEmail='".$email."'";
  $sqlVal = mysqli_query($conn,$sqlEm) or die (mysqli_error());

$valE = 0;
$valP = 0;

  while($arrayU = mysqli_fetch_array($sqlVal)){

    
      if(!($arrayU['userEmail'] == $email) ){

          echo"Email not recognised, <a href=login.php>login again</a>";


      }else{

       $valE+=1;

          if(!($arrayU['userPassword']==$password)){

              echo"Password not recognised,  <a href=login.php>login again</a>";

          }else{


              // $valp+=1;

              echo"Succefully Logged In <br><br>";

              $_SESSION['userid']=$arrayU['userId'];
              // $_SESSION['usertype']=$arrayU['userType'];
              $_SESSION['fname']=$arrayU['userFName'];
              $_SESSION['sname']=$arrayU['userSName'];
 
              echo"Welcome ".$_SESSION['fname']." ". $_SESSION['sname']." </br>";

              echo"Continue shopping for  <a href=index.php>Home Tech</a> </br>";
              echo"View Your  <a href=basket.php>Smart Basket</a>";

          }

      }

      


  }

  if($valE==0){
      echo"Email is Invalid,  <a href=login.php>login again</a>";
  }


}else{

  echo"Please enter both fields";
  echo"Go back to <a href=login.php>Login</a>";
}



include("footfile.html"); //include head layout
echo "</body>";
?>
