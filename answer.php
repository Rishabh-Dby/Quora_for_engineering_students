<?php
$server="localhost";
$username="id19927184_root";
$password="{Y~||c!X?D5qEJ06";
$database="id19927184_qes";

$conn=mysqli_connect($server,$username,$password,$database);
session_start();
$uname=$_SESSION['username'];
$qid=$_SESSION['qid'];
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['answer'])){
      $answer=$_POST['answer'];
      $answer = str_replace("'", "''", "$answer");
        $sql="INSERT INTO `ans`(`qid`,`answer`) VALUES ('$qid', '$answer')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "succesfully entered";
        }
        else{
            echo "error";
        }
    }
}
if($conn){
}
else{
    die("Error" . mysqli_connect_error());
}
$sql="SELECT * FROM `ans` WHERE QID=$qid ORDER BY ANSID DESC";
$sql2="SELECT question FROM `ques` WHERE QID=$qid";
$result=mysqli_query($conn,$sql);
$result2=mysqli_query($conn,$sql2);
$question=mysqli_fetch_array($result2);
$num=mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="answer.css">
    <title>Home</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg " id="topnav">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Quora for engineers</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Menu
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="question.php">Home</a></li>
                  <li><a class="dropdown-item" href="https://quora-for-engineeing-students.000webhostapp.com/logout.php">Logout</a></li>
                  <li><a class="dropdown-item" href="https://quora-for-engineeing-students.000webhostapp.com/feedback.php">Feedback</a></li>
                  <li><a class="dropdown-item" href="https://quora-for-engineeing-students.000webhostapp.com/grievances.php">Grievances</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <?php
          echo '<span class="navbar-text">
          Welcome ' . $_SESSION['username'] . ' 
        </span>';
          ?>
        </div>
      </nav>
      <h1>
        <?php echo $question[0]; ?>
      </h1>
     <h2>Answers</h2>
    </div>
    <div id="maincontainer">
    <?php
      for($x=0;$x<$num;$x++){
        $row=mysqli_fetch_assoc($result);
        $answer=$row['ANSWER'];;
        echo '<div class="container"
        <div class="answers" >
        <p  >' .$answer. ' </p>
        <div class="ud">
        <button type="button" class="btn btn-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
        </svg></button>
        <button type="button" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
        </svg></button>
        </div>
      </div>';
      }
      ?>
      
      <form action="https://quora-for-engineeing-students.000webhostapp.com/answer.php" class="container fixed-bottom" id="create-new" method="post">
        <div class="input-group mb-3 ">
            <span class="input-group-text" id="inputGroup-sizing-default">Answer the question</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Write your answer here" name="answer">
            <button id="addans" type="submit" class="btn btn-lg" style="margin-left: 9px;">+</button>
        </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>