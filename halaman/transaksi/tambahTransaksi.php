<?php 

    $pinjam = date("d-m-Y");
    $tujuhHari = mktime(0,0,0,date("n"),date("j")+7,date("Y"));
    $kembali = date("d-m-Y", $tujuhHari);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

h3{
    padding-top:5rem
    
}
</style>
<body>
    <div class="container">
    <div id="page-wrapper" >
    <div id="page-inner">

            <!-- Form Elements -->
            <div class="panel panel-default">
                <h3 class="text-center">Tambah Data Peminjaman Buku</h3>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" method="POST">

                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <select class="form-control" name="judul" id="judul">
                                        <option>PILIH JUDUL BUKU</option>
                                        <?php 
                                        $query = $koneksi->query("SELECT * FROM tb_buku ORDER BY id_buku");

                                        while ($judul=$query->fetch_assoc()) {
                                            echo "<option value='$judul[id_buku].$judul[judul]'>$judul[judul]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Nama Anggota</label>
                                    <select class="form-control" name="nama" id="nama">
                                        <option>MASUKAN NAMA ANGGOTA</option>
                                        <?php 
                                        $query = $koneksi->query("SELECT * FROM tb_anggota ORDER BY nim");

                                        while ($nama=$query->fetch_assoc()) {
                                            echo "<option value='$nama[nim].$nama[nama]'>$nama[nim] - $nama[nama]</option>";
                                        }
                                         ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Pinjam</label>
                                    <input type="text" class="form-control" name="pinjam" id="pinjam" value="<?php echo $pinjam; ?>" readonly />
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Kembali</label>
                                    <input type="text" class="form-control" name="kembali" id="kembali" value="<?php echo $kembali; ?>" readonly />
                                </div>
                                                <br><br>
                                <div>
                                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

                                    <input type="submit" name="reset" value="Reset" class="btn btn-danger">

                                    <a href="index.php?page=transaksi" class="btn btn-warning"> Kembali</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Form Elements -->
        </div>
    </div>

</div>
</div>

    </div>
</body>
</html>

<?php 

    if (isset($_POST['simpan'])) {
        $tgl_pinjam = isset($_POST['pinjam']) ? $_POST['pinjam'] : "";
        $tgl_kembali = isset($_POST['kembali']) ? $_POST['kembali'] : "";

        $dapat_buku = isset($_POST['judul']) ? $_POST['judul'] : "";
        $pecah_buku = explode(".", $dapat_buku);
        $id_buku = $pecah_buku[0];
        $judul = $pecah_buku[1];

        $dapat_siswa = isset($_POST['nama']) ? $_POST['nama'] : "";
        $pecah_siswa = explode(".", $dapat_siswa);
        $id_siswa = $pecah_siswa[0];
        $siswa = $pecah_siswa[1];

        $query = $koneksi->query("SELECT * FROM tb_buku WHERE judul = '$judul'");
        while ($hasil=$query->fetch_assoc()) {
            $sisa = $hasil['jumlah_buku'];

            $cek = $koneksi->query("SELECT * FROM tb_transaksi WHERE nim=$id_siswa  AND id_buku=$id_buku");
            $num1 = mysqli_num_rows($cek);

            if ($sisa == 0) {
                echo "<script>alert('Stok bukunya telah habis, tidak bisa melakukan transaksi, tambahkan stok buku segera');</script>";

                echo "<meta http-equiv='refresh' content='0; url=?page=tambahtransaksi'>";
            } elseif (!$num1) {
                $qt = $koneksi->query("INSERT INTO tb_transaksi VALUES (null,'$id_buku','$judul','$id_siswa','$siswa','$tgl_pinjam','$tgl_kembali','PINJAM',null)") or die("Gagal Masuk".mysql_error());

                $qu = $koneksi->query("UPDATE tb_buku SET jumlah_buku=(jumlah_buku-1) WHERE id_buku=$id_buku ");
                    if ($qt&&$qu) {
                        echo "<script>alert('Transaksi Peminjaman Buku Sukses');</script>";
                        //YANG TERJADI SETELAH SELESAI PINJAM BUKU (ADMIN LOGIN) DIARAHKAN KE HALAMAN TRANSAKSI
                      if ($_SESSION['admin']) 
                        echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
                    
                        //YANG TERJADI JIKA SELESAI PINJAM BUKU (USER LOGIN) DIARAHKAN KE HALAMAN HOME
                       if ($_SESSION['user']) 
                        echo "<meta http-equiv='refresh' content='0; url=?page=home'>";
                
                    } else {
                        echo "<script>alert('Transaksi Peminjaman Buku Gagal');</script>";
                        echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
                    }
            } else {
               echo "<script>alert('Anda Sudah Meminjam Buku yang sama');</script>";

                echo "<meta http-equiv='refresh' content='0; url=?page=tambahtransaksi'>"; 
            }
        }

    }

 ?>
