<?php
$server="localhost";
$username="id19927184_root";
$password="{Y~||c!X?D5qEJ06";
$database="id19927184_qes";

$conn=mysqli_connect($server,$username,$password,$database);
if($conn){
}
else{
    die("Error" . mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $usrname=$_POST["username"];
    $pwd=$_POST["pwd"];
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $sql="INSERT INTO `user` (`fname`, `lname`, `username`, `password`) VALUES ('$fname', '$lname', '$usrname', '$pwd')";
    $result=mysqli_query($conn,$sql);
    if($result){
        header('location:login.php');
    }
    else{
        echo "error";
    }
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
    <link rel="stylesheet" href="signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Licorice&display=swap" rel="stylesheet">
<script src="database.js"></script>
</head>
<body>
    <h1>Quora for engineers</h1>
    <form id="signupform" action="https://quora-for-engineeing-students.000webhostapp.com/signup.php" method="post">
        <div class="input-group">
            <span class="input-group-text">First and last name</span>
            <input type="text" id="fname" aria-label="First name" class="form-control" name="fname">
            <input type="text" id="lname" aria-label="Last name" class="form-control" name="lname" >
          </div>
          
        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg">Username</span>
            <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Eg-rishabh_dubey@gmail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="please enter correct format (eg=rishabh_dubey@gmail.com)"
            required  name="username">
        </div>
        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg">Password</span>
            <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="pwd">
        </div>
        <button  class="btn btn-light btn-lg">Sign up</button> 
    </form>
    <p>Already have an account? <a href="https://quora-for-engineeing-students.000webhostapp.com/login.php"> Click here </a></p>
</body>
</html>
