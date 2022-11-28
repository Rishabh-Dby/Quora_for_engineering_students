<?php
$server="localhost";
$username="id19927184_root";
$password="{Y~||c!X?D5qEJ06";
$database="id19927184_qes";

$conn=mysqli_connect($server,$username,$password,$database);
session_start();
$uname=$_SESSION['username'];
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $subject=$_POST['subject'];
    $greviance=$_POST['greviance'];
    $sql="INSERT INTO `greviances` (`username`, `subject`, `greviance`) VALUES ('$uname','$subject','$greviance')";
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
    <title>greviances</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="grievances.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Licorice&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Quora for engineers</h1>
    <h2>Greviances</h2>
    <form id="signupform" action="https://quora-for-engineeing-students.000webhostapp.com/grievances.php" method="post">
        
        <div class="input-group">
            <span class="input-group-text" id="subject" >Subject</span>
            <input type="text" class="form-control" placeholder="Enter the subject" aria-label="Username" aria-describedby="basic-addon1" name="subject">
          </div>
          
          <div class="input-group"  >
            <span class="input-group-text"  id="description">Description</span>
            <textarea class="form-control"  aria-label="With textarea" placeholder="Describe your problem" name="greviance"></textarea>
          </div>
        <button  class="btn btn-light btn-lg" id="button-feedback">Raise ticket</button> 
    </form>
</body>
</html>