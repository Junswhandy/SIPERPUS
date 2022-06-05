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
    <div class="container">
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="panel panel-default">
                    <h3 class="text-center">Tambah Data Anggota</h3>
                    </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form role="form" method="POST" onsubmit="return validasi(this)">

                                        <div class="form-group">
                                            <label>NIM</label>
                                            <input class="form-control" name="nim" id="nim" />
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Siswa</label>
                                            <input class="form-control" name="nama" id="nama" />
                                        </div>

                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input class="form-control" name="tempat_lahir" id="tempat_lahir" />
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" />
                                        </div>
                                        <br>
                                        <select class="form-select" aria-label="Default select example" name="jk">
                                            <option selected>Pilih Jenis Kelamin</option>
                                            <option value="LAKI-LAKI" name="jk" id="jk">LAKI-LAKI</option>
                                            <option value="PEREMPUAN" name="jk" id="jk">PEREMPUAN</option>
                                        </select>
                                        <br>
                                        <div>
                                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                            <a href="index.php?page=anggota" class="btn btn-warning"> Kembali</a>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            <!-- End Form Elements -->
                </div>
            </div>
            <br><br><br><br><br><br><br>
</body>
</html>


<!--PHP-->
<?php

        // cek apakah tombol daftar sudah diklik atau belum
if (isset($_POST['simpan'])) {

        // AMBIL DATA DARI FORMULIR
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jk'];
    

        // QUERY INSERT KE DATABASE
    $sql = "INSERT INTO tb_anggota (nim,nama,tempat_lahir,tgl_lahir,jk) VALUES ('$nim','$nama','$tempat_lahir','$tgl_lahir','$jk')";
    $query = mysqli_query($koneksi,$sql);

        // CEK APAKAH QUERY BERHASIL
    if ($query) {
        ?>
        <script type="text/javascript">
            alert("DATA BERHASIL DI SIMPAN");
            window.location.href="?page=anggota";
        </script>
        <?php
    } else {

        ?>
        <script type="text/javascript">
            alert("DATA TIDAK BERHASIL DI SIMPAN");
            window.location.href="?page=anggota";
        </script>
        <?php

    }
}
?>

    <!--JS VALIDASI-->
<script type="text/javascript">
    function validasi(form){
        if (form.nim.value=="") {
            alert("NIMTidak Boleh Kosong");
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
