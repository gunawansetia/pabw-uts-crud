<?php
// include database connection file
require_once'dbconfig.php';
// Code for record deletion
if (isset($_REQUEST['del'])) 
{
    //Get row id
    $uid=intval($_REQUEST['del']);
    //Query for deletion
    $sql = "delete from tblcatatuang WHERE id_catat=:id";
    // Prepare query for execution
    $query = $dbh->prepare($sql);
    // bind the parameters
    $query-> bindParam(':id',$uid, PDO::PARAM_STR);
    // Query Exectuion
    $query-> execute();
    // Mesage after updation
    echo "<script>alert('Record Updated successfully');</script>";
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

<body class="text-center">

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 wrapper border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal putih">Bank Gun</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-light " href="#home">Home</a>
    <a class="p-2 text-light" href="#laporan">Laporan Keuangan</a>

  </nav>
  <nav class="px-md-4 mb-2">
    <a class="text-light"><?php echo  $_SESSION["username"]["yourname"]?> </a> </nav>
  <nav class="col-sm-0">
    <a href="logout.php" class="btn btn-outline-primary" role="button" aria-pressed="true">Keluar</a>
</nav>
</div>

<header class="position-relative overflow-hidden  p-3 p-md-5 m-md-3 text-center bg-light" id="home">
    <img src="img/bankgun.png" class="img-fluid" alt="Responsive image">
    <div class="container page-section agakungu"> 
             <h1>Selamat Datang</h1>
                <p> Mari berpetualang</p> 
             </div>
</header>

<section class="page-section agakungu" id="laporan">
    <div class="container"> 
        <h2>Laporan Bulanan</h2>
        <hr class="divider my-4">
    <div class="row">
    <div class="col-md-12 ">
    <a href="insert.php"><button class="btn btn-primary"> Tambah Data
    </button></a> <br></br>
    <div class="table-responsive">
    <table id="mytable" class="table table-bordred table-striped">
    <thead>
    <th>#</th>
    <th>Jumlah Uang</th>
    <th>Keterangan</th>
    <th>Kategori</th>
    <th>Tanggal</th>
    <th>Gambar</th>
    <th>Posting Date</th>
    <th>Edit</th>
    <th>Delete</th>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT jumlah_uang,keterangan,kategori,tanggal,gambar,posting_date, id_catat from tblcatatuang";
        //Prepare the query:
        $query = $dbh->prepare($sql);
        //Execute the quert:
        $query->execute();
        //Assign the data which you pulled from the database (in the preceding step) to a variable.
        $result=$query->fetchAll (PDO::FETCH_OBJ);
        // For serial number initialization
        $cnt=1;
        if ($query->rowCount() > 0)
        {
            //In case that the query returned at least one record, we can echo the records within a foreach loop;
            foreach ($result as $result) {
                # code...
                ?>
                <!-- Display Recprds -->
                <tr>
                <td><?php echo htmlentities($cnt);?></td>
                <td><?php echo htmlentities ($result->jumlah_uang);?></td>
                <td><?php echo htmlentities($result->keterangan);?>
                    
                </td>
                <td><?php echo htmlentities($result->kategori);?></td>
                <td><?php echo htmlentities($result->tanggal);?></td>
                <td><?php echo htmlentities($result->gambar);?></td>
                <td><?php echo htmlentities($result->posting_date);?></td>
            <td><a href="update.php?id_catat=<?php echo htmlentities($result->id_catat);?>">
            <button class="btn btn-primary btn-xs">
                <svg class="bi bi-upload" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M.5 8a.5.5 0 01.5.5V12a1 1 0 001 1h12a1 1 0 001-1V8.5a.5.5 0 011 0V12a2 2 0 01-2 2H2a2 2 0 01-2-2V8.5A.5.5 0 01.5 8zM5 4.854a.5.5 0 00.707 0L8 2.56l2.293 2.293A.5.5 0 1011 4.146L8.354 1.5a.5.5 0 00-.708 0L5 4.146a.5.5 0 000 .708z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M8 2a.5.5 0 01.5.5v8a.5.5 0 01-1 0v-8A.5.5 0 018 2z" clip-rule="evenodd"/>
                </svg></button></a></td>
                <td><a href="timeline.php?del=<?php echo htmlentities($result->id_catat);?>"><button class="btn btn-danger btn-xs">
                <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
                </svg></button></a></td>
            <?php
            // for serial number increment
            $cnt++;  
        }} ?>
    </tbody>
</table>
</div>
</div>
</div>
</div>
</section>

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
