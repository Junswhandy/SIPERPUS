<!--KONEKSI-->
<?php 
  error_reporting(0);
  ob_start();

  session_start();
  //KONEKSI
  $koneksi = new mysqli("localhost","root","","siperpus");
  //SESSION
  if ($_SESSION['admin'] || $_SESSION['user']) {
    header("Location:index.php");
  } 
?>
<!--AKHIR KONEKSI-->


<!--TAG HTML-->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>LOGIN</title>  

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--CSS STYLE-->
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  <!--AKHIR CSS STYLE-->
    
    <!-- CUSTOM TEMPLATE -->
    <link href="heroes.css" rel="stylesheet">
  </head>

      <!--FORM-->
  <body>
  <div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-4">SISTEM INFORMASI PERPUSTAKAAN</h1>
        <p class="col-lg-10 fs-4" style="font-style:italic;">"Membaca adalah napas hidup dan jembatan emas ke masa depan."</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form role="form" method="post" class="p-4 p-md-5 border rounded-3 bg-light">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="username" name="username" placeholder="name@example.com">
            <label for="username">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <label for="Password">Password</label>
          </div>
         
          <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Sign up</button>
          <hr class="my-4">
          <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
        </form>
      </div>
    </div>
  </div>
  </body>
</html>
<!--AKHIR TAG HTML-->

<!--TAG PHP UNTUK LOGIN-->
<?php 

    //MENGIRIM DATA LOGIN
  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //MENGAMBIL DATA DARI DATABASE 
    $sql = "SELECT * FROM tb_user WHERE username='$username' AND password='$password'";
    $query = mysqli_query($koneksi,$sql);

    $data = mysqli_fetch_array($query);
    $ketemu = mysqli_num_rows($query);

    //JIKA DATA KETEMU SESION DITENTUKAN
    if ($ketemu >= 1) {
      
      session_start();

      $_SESSION[username] = $data[username];
      $_SESSION[password] = $data[password];
      $_SESSION[level] = $data[level];
      
      //MENENTUKAN SESSION BERDASARKAN USERNAME DAN PASSWORD
      if ($data['level'] == "admin") {
        $_SESSION['admin'] = $data[id];
        header("Location:index.php");
      } else if ($data['level'] == "user") {
        $_SESSION['user'] = $data[id];

        //JIKA DATA BENAR AKAN MENUJU HALAMAN INI
        header("Location:index.php");
      }

      //JIKA USERNAME DAN PASSWORD SALAH
    } else {
      ?>
      <script type="text/javascript">
        alert("username dan password anda salah");
      </script>
      <?php
    }

  }
 ?>