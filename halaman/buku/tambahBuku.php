<script type="text/javascript">
    function validasi(form){
        if (form.judul.value=="") {
            alert("Judul Tidak Boleh Kosong");
            form.judul.focus();
            return (false);
        }
        if (form.pengarang.value=="") {
            alert("Pengarang Tidak Boleh Kosong");
            form.pengarang.focus();
            return (false);

        }
        if (form.tahun_terbit.value=="") {
            alert("Tahun Terbit Tidak Boleh Kosong");
            form.tahun_terbit.focus();
            return (false);
        }
        if (form.isbn.value=="") {
            alert("ISBN Tidak Boleh Kosong");
            form.isbn.focus();
            return (false);
        }
        if (form.jumlah_buku.value=="") {
            alert("Jumlah Buku Tidak Boleh Kosong");
            form.jumlah_buku.focus();
            return (false);
        }
        if (form.lokasi.value=="") {
            alert("Lokasi Tidak Boleh Kosong");
            form.lokasi.focus();
            return (false);
        }
        return(true); 
    }
</script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAMBAH BUKU</title>
</head>
<style>
h3{
    padding-top: 7rem
}
</style>

<body>
    <div class="container">
        <div id="page-wrapper" >
            <div id="page-inner">

            <!-- Form Elements -->
                <div class="panel panel-default">
                    <h3 class="text-center">Tambah Data Buku</h3>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">

                            <form role="form" method="POST" onsubmit="return validasi(this)">

                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input class="form-control" name="judul" id="judul" />
                                </div>

                                <div class="form-group">
                                    <label>Pengarang</label>
                                    <input class="form-control" name="pengarang" id="pengarang" />
                                </div>

                                <div class="form-group">
                                    <label>Tahun Terbit</label>
                                    <select class="form-control" name="tahun_terbit" id="tahun_terbit">
                                        <?php 

                                        $tahun = date("Y");
                                        for ($i = $tahun-29; $i <= $tahun; $i++) {
                                            echo '
                                            <option value="'.$i.'">'.$i.'</option>
                                            ';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>ISBN</label>
                                    <input class="form-control" name="isbn" id="isbn" />
                                </div>

                                <div class="form-group">
                                    <label>Jumlah Buku</label>
                                    <input type="number" class="form-control" name="jumlah_buku" id="jumlah_buku" />
                                </div>

                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <select class="form-control" name="lokasi" id="lokasi">
                                        <option>== PILIH LOKASI ==</option>

                                        <?php 

                                        $sql = "SELECT * FROM tb_lokasi ORDER BY id_lokasi";

                                        $query = mysqli_query($koneksi,$sql);

                                        while ($data = mysqli_fetch_assoc($query)) { ?>
                                            <option value="<?php echo $data['lokasi']; ?>"><?php echo $data['lokasi']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div>
                                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

                                    <a href="index.php?page=buku" class="btn btn-warning"> Kembali</a>
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
</body>
</html>


<!--PHP-->
<?php

        // cek apakah tombol daftar sudah diklik atau belum ?
if (isset($_POST['simpan'])) {

        // AMBIL DATA DARI FORMULIR
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $isbn = $_POST['isbn'];
    $jumlah_buku = $_POST['jumlah_buku'];
    $lokasi = $_POST['lokasi'];

        // QUERY MENGIRIM DATA KE DATABASE
    $sql = "INSERT INTO tb_buku (judul,pengarang,tahun_terbit,isbn,jumlah_buku,lokasi) VALUES ('$judul','$pengarang','$tahun_terbit','$isbn','$jumlah_buku','$lokasi')";
    $query = mysqli_query($koneksi,$sql);

        // apakah query simpan berhasil ?
    if ($query) {
        ?>
        <script type="text/javascript">
            alert("DATA BERHASIL DI SIMPAN");
            window.location.href="?page=buku";
        </script>
        <?php
    } else {

        ?>
        <script type="text/javascript">
            alert("DATA TIDAK BERHASIL DI SIMPAN");
            window.location.href="?page=tambahBuku";
        </script>
        <?php

    }
}
?>


