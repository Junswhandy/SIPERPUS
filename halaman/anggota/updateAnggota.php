<script type="text/javascript">
    function validasi(form){
        if (form.nim.value=="") {
            alert("NIM Tidak Boleh Kosong");
            form.nim.focus();
            return (false);
        }
        if (form.nama.value=="") {
            alert("Nama Tidak Boleh Kosong");
            form.nama.focus();
            return (false);
        }
        if (form.tempat_lahir.value=="") {
            alert("Tempat Lahir Buku Tidak Boleh Kosong");
            form.tempat_lahir.focus();
            return (false);
        }
        if (form.jk.value=="") {
            alert("jk Tidak Boleh Kosong");
            form.jk.focus();
            return (false);
        }
        
        return(true); 
    }
</script>

<?php 

  // kalau tidak ada id di query string
if (!isset($_GET['nim'])) {
  header('Location: ?page=?page=anggota');
}

  // ambil id dari query string
$nim = $_GET['nim'];

  // buat query untuk ambil data dari database
$sql = "SELECT * FROM tb_anggota WHERE nim=$nim";
$query = mysqli_query($koneksi,$sql);
$data = mysqli_fetch_assoc($query);

  // jika data yang di edit tidak ditemukan
if (mysqli_num_rows($query) < 1 ) {
  die("data tidak ditemukan...");
}


?>

<!--HTML TAG-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPERPUS</title>
</head>

<style>
h3{
    padding-top: 5rem
    
}
</style>

<body>
    <diV class="container">
        <div id="page-wrapper" >

            <div id="page-inner">
                <div class="panel panel-default">
                    <h3 class="text-center">Update Data Anggota</h3>
                </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">

                            <!--FORM-->
                            <form role="form" method="POST" onsubmit="return validasi(this)">
                                <!--INPUT NIM-->
                                <div class="form-group">
                                    <label>NIM</label>
                                    <input class="form-control" name="nim" id="nim" value="<?php echo $data['nim']; ?>" readonly/>
                                </div>
                                <!--INPUT NAMA-->
                                <div class="form-group">
                                    <label>Nama Anggota</label>
                                    <input class="form-control" name="nama" id="nama" value="<?php echo $data['nama']; ?>"/>
                                </div>
                                <!--INPUT TEMPAT LAHIR-->
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>"/>
                                </div>
                                <!--INPUT TANGGAL LAHIR-->
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>"/>
                                </div>
                                <!--INPUT INPUT JENIS KELAMIN-->
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jk" id="jk" value="Laki-Laki" <?php echo($data['jk']==Laki-Laki)?"checked":""; ?>/>Laki-Laki
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jk" id="jk" value="Perempuan" <?php echo($data['jk']==Perempuan)?"checked":""; ?>/>Perempuan
                                        </label>
                                    </div>
                                </div>

                                <!--TOMBOL KEMBALI-->
                                <div>
                                    <input type="submit" name="update" value="Update" class="btn btn-primary">

                                    <a href="index.php?page=anggota" class="btn btn-warning"> Kembali</a>
                                </div>
                            </form>
                            <!--AKHIR FORM-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Form Elements -->
        </div>
    </diV>

</body>
</html>



<!--PHP-->
<?php

        // cek apakah tombol daftar sudah diklik atau belum ?
if (isset($_POST['update'])) {

        // AMBIL DATA DARI FORM INPUT

    $nim = $_POST['nim'];//AMBIL NIM
    $nama = $_POST['nama'];//AMBIL NAMA
    $tempat_lahir = $_POST['tempat_lahir'];//AMBIL T4LAHIR
    $tgl_lahir = $_POST['tgl_lahir'];//AMBILTGLAHIR
    $jk = $_POST['jk'];//AMBIL JK
    

        // QUERY UPDATE DATABSE
    $sql = "UPDATE tb_anggota SET nama='$nama',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',jk='$jk' WHERE nim='$nim'";
    $query = mysqli_query($koneksi,$sql);

        // CEK APAKAH DATA BERHASIL DI UPDATE
    if ($query) {
        ?>
        <script type="text/javascript">
            alert("DATA BERHASIL DI UPDATE");
            window.location.href="?page=anggota";
        </script>
        <?php
    } else {

        ?>
        <script type="text/javascript">
            alert("DATA TIDAK BERHASIL DI UPDATE");
            window.location.href="?page=anggota";
        </script>
        <?php

    }

}
?>

