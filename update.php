<?php


// include database connection file
require_once'dbconfig.php';
if (isset($_POST['update']))
{
    // Get the userid
    $userid=intval($_GET['id_catat']);
    // Posted Values
    $jumlahuang=$_POST['jumlah_uang'];
    $keterangan=$_POST['keterangan'];
    $kategori=$_POST['kategori'];
    $tanggal=$_POST['tanggal'];
    $gambar=$_POST['gambar'];
    // Query for Updation
    $sql="update tblcatatuang set jumlah_uang=:ju,keterangan=:ket,kategori=:kat,tanggal=:tgl,gambar=:gmbr
    where id_catat=:uid";
    // Prepare Query for Execution
    $query = $dbh->prepare($sql);
    // Bind the parameters
    $query->bindParam(':uid',$userid,PDO::PARAM_STR);
    $query->bindParam(':ju',$jumlahuang,PDO::PARAM_STR);
    $query->bindParam(':ket',$keterangan,PDO::PARAM_STR);
    $query->bindParam(':kat',$kategori,PDO::PARAM_STR);
    $query->bindParam(':tgl',$tanggal,PDO::PARAM_STR);
    $query->bindParam(':gmbr',$gambar,PDO::PARAM_STR);
    // Query Execution
    $query->execute();
    // Message after updation
    echo "<script>alert('Data telah diupdate');</script>";
    // Code for redirection
    echo "<script>window.location.href='timeline.php'</script>";
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
    <a class="p-2 text-light" href="timeline.php">Laporan Keuangan</a>

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
    <h3>Silahkan Update data..</h3>
    <hr class="divider my-4">
</div>
</div>

<?php
// Get the userid
$userid=intval($_GET['id_catat']);
$sql = "SELECT jumlah_uang,keterangan,kategori,tanggal,gambar, id_catat from tblcatatuang where id_catat=:uid";
//Prepare the query:
$query = $dbh->prepare($sql);
//Bind the parameters
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
//Execute the query;
$query->execute();
//Assign the data which you pulled from the database (in the preceding step) to a variable.
$result=$query->fetchAll(PDO::FETCH_OBJ);
// For serial number initialization
$cnt=1;
if ($query->rowCount() > 0) 
{
    //In case that the query returned at least one record, we can echo the records within a foreach loop:
    foreach($result as $result)
    {
    ?>

    <form name="update" method="post">
    <div class="row">
    <div class="col-md-4 mb-3">
    <label for="jumlah_uang">Jumlah Uang</label>
    <input type="number" name="jumlah_uang" value="<?php
    echo htmlentities($result->jumlah_uang);?>"
    class="form-control" required>    
    </div>
    <div class="col-md-4 mb-3">
    <label for="keterangan">Keterangan</label>
    <input type="text" name="keterangan"  value="<?php
    echo htmlentities($result->keterangan);?>"
    class="form-control">
    </div>
    </div> <b></b> 
    <div class="row">
    <div class="col-md-4 mb-3">
    <label for="text">Kategori</label>
    <select class="custom-select my-1 mr-sm-2" input type="kategori" name="kategori" value="<?php
    echo htmlentities($result->kategori);?>" class="form-control" required>
    <option>Pendapatan Bagi Hasil</option>
    <option>Pendapatan Piutang</option>
    </select>
    </div>
    <div class="col-md-4 mb-3">
    <label for="tanggal">Tanggal</label>
    <input type="date" name="tanggal"  value="<?php
    echo htmlentities($result->tanggal);?>" class="form-control" required>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4 mb-3">
    <label for="gambar">Gambar</label>
    <input type="file" name="gambar" value="<?php
    echo htmlentities($result->gambar);?>">
    </div>
    </div>
<?php }} ?>
    <div class="row" style="margin-top:1%">
    <div class="col-md-8">
    <input type="submit" name="update" class="btn btn-outline-info"value="Masukin">
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