<?php
// include database connection fil
require_once'dbconfig.php';

if (isset($_POST['insert'])) 
{
// Posted Values
    
$jumlahuang=$_POST['jumlah_uang'];
$keterangan=$_POST['keterangan'];
$kategori=$_POST['kategori'];
$tanggal=$_POST['tanggal'];
$gambar=$_POST['gambar'];
// Query for Insertion
$sql="INSERT INTO tblcatatuang(jumlah_uang,keterangan,kategori,tanggal,gambar) VALUES(:ju,:ket,:kat,:tgl,:gmbr)";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
//Bind the parameters
$query->bindParam(':ju',$jumlahuang,PDO::PARAM_STR);
$query->bindParam(':ket',$keterangan,PDO::PARAM_STR);
$query->bindParam(':kat',$kategori,PDO::PARAM_STR);
$query->bindParam(':tgl',$tanggal,PDO::PARAM_STR);
$query->bindParam(':gmbr',$gambar,PDO::PARAM_STR);


// Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
$lastInsertId = $dbh->lastInsertId();
$saved = $query->execute();
if($saved)
{
// Message for successfull insertion
echo "<script>alert('Data telah terekam');</script>";
echo "<script>window.location.href='timeline.php'</script>";
}
else
{
    //Message for unsuccessfull insertion
    echo "<script>alert(' Maaf, sepertinya ada kesalahan dalam memasukkan data'>";
    echo "<script>window.location.href='insert.php'</script>";
}
}
?>

<?php require_once("auth.php"); ?>



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
    <a class="p-2 text-light " href="timeline.php">Home</a>
    <a class="p-2 text-light" href="timeline.php/#laporan">Laporan Keuangan</a>

  </nav>
  <nav class="px-md-4 mb-2">
    <a class="text-light"><?php echo  $_SESSION["username"]["yourname"]?> </a> </nav>
  <nav class="col-sm-0">
    <a href="logout.php" class="btn btn-outline-primary" role="button" aria-pressed="true">Keluar</a>
</nav>
</div>

    <div class="page-section2 bg-custom container" id="insert">
    <div class="row">
    <div class="col-md-12">
    <h3>Silahkan masukkan laporan keuangan Bank</h3>
    <hr />
    
    </div></div>
    <form name="insert" method="post">
    <div class="row">
    <div class="col-md-4 mb-3">
    <label for="jumlah_uang">Jumlah Uang</label>
    <input type="number" name="jumlah_uang" class="form-control" required>    
    </div>
    <div class="col-md-4 mb-3">
    <label for="keterangan">Keterangan</label>
    <input type="text" name="keterangan" class="form-control">
    </div>
    </div> <b></b> 
    <div class="row">
    <div class="col-md-4 mb-3">
    <label for="text">Kategori</label>
    <select class="custom-select my-1 mr-sm-2" input type="kategori" name="kategori" class="form-control" required>
    <option selected></option>
    <option>Pendapatan Bagi Hasil</option>
    <option>Pendapatan Piutang</option>
    </select>
    
    </div>
    <div class="col-md-4 mb-3">
    <label for="tanggal">Tanggal</label>
    <input type="date" name="tanggal" class="form-control" required>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4 mb-3">
    <label for="gambar">Gambar</label>
    <input type="file" name="gambar">
    </div>
    </div>

    <div class="row" style="margin-top:1%">
    <div class="col-md-8">
    <input type="submit" name="insert" class="btn btn-outline-info"value="Masukin">
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
    <script src="js/gaya.js" rel="stylesheet"/>
    

</body>
</html>