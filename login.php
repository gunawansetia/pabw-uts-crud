<?php

// include database connection fils
require_once'dbconfig.php';
session_start();
if (isset($_POST['login'])) 
{

$username=filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

 $sql = "SELECT * FROM tblusers WHERE username=:un";
$query = $dbh->prepare($sql);
 $params = array(
            ":un" =>$username);
$query->execute($params);

$user = $query->fetch(PDO::FETCH_ASSOC);
    // jika user terdaftar
    if($query->rowCount() == 0){
     echo "<div align='center'>Username Belum Terdaftar! </div>";   
    } else {
        if(password_verify($password, $user["password"])) {
            $_SESSION["username"] = $user;
            header('location:timeline.php');
        } else{
            echo "<div align='center'>Pass Salah </div>"; 
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Bank Gun - Menabung | Investasi</title>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/style.css" rel="stylesheet"/>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 wrapper border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal putih">Bank Gun</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-light" href="index.php">Home</a>
    <a class="p-2 text-light" href="index.php">Laporan Keuangan</a>

  </nav>
  <nav class="col-sm-0">
    <a href="daftar.php" class="btn btn-info" role="button" aria-pressed="true">Daftar</a>
    <a href="login.php" class="btn btn-outline-primary" role="button" aria-pressed="true">Masuk</a>
</nav>
</div>


    <div class="page-section2 bg-custom container" id="login">
    <div class="row">
    <div class="col-md-12">
    <h3>Masuk dulu ya..</h3>
    <hr />
    
    </div></div>
    <form name="insertrecord" method="post">
    <div class="row">
    <div class="col-md-4 mb-3">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control"required>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4 mb-3">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" required>
    </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
        <label class="form-check-label" for="autoSizingCheck2">Ingatkan saya
        </label>
      </div>
    </div>
    <div class="row" style="margin-top:1%">
    <div class="col-md-8">
    <input type="submit" name="login" class="btn btn-outline-primary"value="Login">
    </div>
    </div>
    </form>
    </div> 
    </div>

<footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Gunawan Setia</div></div>
        </footer>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" rel="stylesheet"/> 

</body>
</html>