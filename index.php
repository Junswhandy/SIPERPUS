<!--KONEKSI PHP-->
<?php 
error_reporting(0);
session_start();

//KONEKSI KE DATABASE
$koneksi = new mysqli("localhost","root","","siperpus");

include 'function.php';

//MENENTUKAN SESI
if ($_SESSION['admin'] || $_SESSION['user']) {
 ?>
<?php 
//JIKA USERNAME SALAH
} else {
header("Location:login.php");
}

?>
<!--AKHIR BAGIAN KONEKSI-->


    <!--HTML TAG-->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="styleindex.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<title>APLIKASI PERPUSTAKAAN</title>
</head>

<body>

<!--SIDEBAR-->
<div class="wrapper">
            <input type="checkbox" id="btn" hidden>
            <label for="btn" class="menu-btn">
                <i class="fas fa-bars"></i>
                <i class="fas fa-times"></i>
            </label>

            <nav id="sidebar">
                <div class="title">SIPERPUS</div>
                <ul class="list-items">

                <!--JIKA LOGIN SEBAGAI ADMIN-->
                <?php if ($_SESSION['admin']) { ?>
                <li><a href="index.php?page=home"><i class="fas fa-home"></i>Dashboard</a></li>
                <li><a href="index.php?page=buku"><i class="fas fa-address-book"></i>Daftar Buku</a></li>
                <li><a href="index.php?page=anggota"><i class="fas fa-cog"></i>Daftar Anggota</a></li>
                <li><a href="index.php?page=transaksi"><i class="fas fa-user"></i>Daftar Pinjam</a></li>
                
                <?php } ?>
                <!--AKHIR JIKA LOGIN SEBAGAI ADMIN-->

                <!--JIKA LOGIN SEBAGAI USER-->
                <?php if ($_SESSION['user']) { ?>
                <li><a href="index.php?page=home"><i class="fas fa-home"></i>Dashboard</a></li>
                <li><a href="index.php?page=buku"><i class="fas fa-address-book"></i>Daftar Buku</a></li>
                <li><a href="index.php?page=tambahtransaksi"><i class="fas fa-user"></i>Pinjam Buku</a></li>
                
                <?php } ?>
                <!--AKHIR JIKA LOGIN SEBAGAI USER-->

        <!--LOGOUT BAGIAN USER-->
        <?php if ($_SESSION['user']) { ?>
            <br><br><br><br><br><br><br><br><br><br><br>
                <li class="nav-item">
                <a class="btn btn-outline-danger " href="logout.php" style="margin-left: -20px;">LOG OUT</a>
                </li>
                <div style="color: white;
                padding: 15px 50px 15px 50px;
                font-size: 16px;"> 
      
      <?php echo date('d M Y'); ?> &nbsp; </div>
      <?php } ?>
       <!--AKHIR LOGOUT BAGIAN USER-->

      <!--LOGOUT BAGIAN ADMIN-->
      <?php if ($_SESSION['admin']) { ?>
      <br><br><br><br><br><br><br><br><br>
                <li class="nav-item">
                <a class="btn btn-outline-danger " href="logout.php" style="margin-left: -20px">LOG OUT</a>
                </li>
                <div style="color: white;
                padding: 15px 50px 15px 50px;
                font-size: 16px;"> 
      
      <?php echo date('d M Y'); ?> &nbsp; </div>
      <?php } ?>
      <!--AKHIR LOGOUT BAGIAN ADMIN-->

                </ul>
            </nav>
  </div>
  <!--AKHIR SIDEBAR-->
        
      

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    
    <!--INCLUDE PAGE-->
      <?php 
      if (isset($_GET['page'])) {
      $page = $_GET['page'];

      switch ($page) {
        case home:
        include 'home.php';
        break;

        case buku:
        include 'halaman/buku/formBuku.php';
        break;

        case tambahBuku:
        include 'halaman/buku/tambahBuku.php';
        break;

        case updateBuku:
        include 'halaman/buku/updateBuku.php';
        break;

        

        case anggota:
        include 'halaman/anggota/formAnggota.php';
        break;

        case tambahAnggota:
        include 'halaman/anggota/tambahAnggota.php';
        break;

        case updateAnggota:
        include 'halaman/anggota/updateAnggota.php';
        break;

        case hapusAnggota:
        include 'halaman/anggota/hapusAnggota.php';
        break;

        case transaksi:
        include 'halaman/transaksi/formTransaksi.php';
        break;

        case tambahtransaksi:
        include 'halaman/transaksi/tambahTransaksi.php';
        break; 

        case kembali:
        include 'halaman/transaksi/kembali.php';
        break; 

        case perpanjang:
        include 'halaman/transaksi/perpanjang.php';
        break;

      

        case tambahUser:
        include 'halaman/pengguna/tambahUser.php';
        break;

        default:
        include 'notfound.php';
        break;
      }
    } else {
      include 'home.php';
    }

    ?>
<!--AKHIR INCLUDE PAGE-->

    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
    $(document).ready(function () {
    $('#dataTables-example').dataTable();
    });

</script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>

 
    <!--FOOTER-->
    <?php if ($_SESSION['user']) { ?>
    <div class="container">
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="index.php?page=home" class="nav-link px-2 text-muted">Dashboard</a></li>
      <li class="nav-item"><a href="index.php?page=buku" class="nav-link px-2 text-muted">Buku</a></li>
      <li class="nav-item"><a href="index.php?page=anggota" class="nav-link px-2 text-muted">Anggota</a></li>
      <li class="nav-item"><a href="index.php?page=tambahtransaksi" class="nav-link px-2 text-muted">Transaksi</a></li>
    </ul>
      <p class="text-center text-muted">&copy; 2022 SIPERPUS, Inc</p>
  </footer>
    </div>
    <!--AKHIR FOOTER-->
    <?php } ?>

    <?php if ($_SESSION['admin']) { ?>
    <!--FOOTER-->
    <div class="container">
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3 ">
      <li class="nav-item"><a href="index.php?page=home" class="nav-link px-2 text-muted">Dashboard</a></li>
      <li class="nav-item"><a href="index.php?page=buku" class="nav-link px-2 text-muted">Buku</a></li>
      <li class="nav-item"><a href="index.php?page=anggota" class="nav-link px-2 text-muted">Anggota</a></li>
      <li class="nav-item"><a href="index.php?page=transaksi" class="nav-link px-2 text-muted">Transaksi</a></li>
      
    </ul>
      <p class="text-center text-muted ">&copy; 2022 SIPERPUS, Inc</p>
  </footer>
    </div>
    <!--AKHIR FOOTER-->
      <?php } ?>

</body>
</html>



