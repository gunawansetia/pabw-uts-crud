<?php
// include database connection fil
require_once'dbconfig.php';
if (isset($_POST['daftar'])) 
{
// Posted Values //Filter data
$yname=filter_input(INPUT_POST, 'yourname', FILTER_SANITIZE_STRING);
$username=filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
// enkripsi password
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

// Query for Insertion
$sql="INSERT INTO tblusers(yourname,username,password,email) VALUES(:yn,:un,:pass,:eml)";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
//Bind the parameters
$query->bindParam(':yn',$yname,PDO::PARAM_STR);
$query->bindParam(':un',$username,PDO::PARAM_STR);
$query->bindParam(':pass',$password,PDO::PARAM_STR);
$query->bindParam(':eml',$email,PDO::PARAM_STR);

// Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
$lastInsertId = $dbh->lastInsertId();
$saved = $query->execute();
if($saved)
{
// Message for successfull insertion
echo "<script>alert('User kamu telah terdaftar');</script>";
echo "<script>window.location.href='login.php'</script>";
}
else
{
    //Message for unsuccessfull insertion
    echo "<script>alert('Something went wrong. Please try again');</script>";
    echo "<script>window.location.href='daftar.php'</script>";
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

    <div class="page-section2 bg-custom container" id="daftar">
    <div class="row">
    <div class="col-md-12">
    <h3>Daftar dulu untuk berpetualang</h3>
    <hr />
    </div></div>
    <form name="insertrecord" method="post">
    <div class="row">
    <div class="col-md-4 mb-3">
    <label for="yourname">Your Name</label>
    <input type="text" name="yourname" class="form-control" required>    
    </div>
    <div class="col-md-4 mb-3">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control"required>
    </div>
    </div> <b></b> 
    <div class="row">
    <div class="col-md-4 mb-3">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" required>
    </div>
    <div class="col-md-4 mb-3">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" required>
    </div>
    </div>
    <div class="row" style="margin-top:1%">
    <div class="col-md-8">
    <input type="submit" name="daftar" class="btn btn-danger"value="Daftar">
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