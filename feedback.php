<?php
$server="localhost";
$username="id19927184_root";
$password="{Y~||c!X?D5qEJ06";
$database="id19927184_qes";

$conn=mysqli_connect($server,$username,$password,$database);
session_start();
$uname=$_SESSION['username'];
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $feedback=$_POST['feedback'];
    $sql="INSERT INTO `feedback` (`username`, `feedback`) VALUES ('$uname','$feedback')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "succesfully entered";
    }
    else{
        echo "error";
    }
}
if($conn){
}
else{
    die("Error" . mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="feedback.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Licorice&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Quora for engineers</h1>
    <h2>Feedback</h2>
    <p>Please tell us about your experience<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
      </svg></p>
    <form id="ratingbtn" action="https://quora-for-engineeing-students.000webhostapp.com/feedback.php" method="post">
          
          <div class="input-group" >
            <span class="input-group-text" id="description">Description</span>
            <textarea class="form-control" aria-label="With textarea" required name="feedback"></textarea>
          </div>
        <button  class="btn btn-light btn-lg" id="button-feedback">Post</button> 
    </form>
</body>
</html>