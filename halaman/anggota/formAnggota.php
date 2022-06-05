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
h1{
    padding-top: 5rem
    
}
</style>

    <body>
        <div class="container">
            <div id="page-wrapper" >
                <div id="page-inner">
                    <!-- TABEL-->
                        <div class="panel panel-default">
                            <h1 class="text-center">DATA ANGGOTA</h1>
                                <div class="panel-body">
                     <!--TABEL RESPONSIV-->
                                    <div class="table-responsive">
                                        <div>
                                            <a href="index.php?page=tambahAnggota" class="btn btn-success"><i class=" fa fa-plus "></i> Tambah Anggota</a>
                                            <a href="index.php?page=tambahUser" class="btn btn-success"><i class=" fa fa-plus "></i> Tambah Pengguna</a>
                                    </div>
                                <br>
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">         
                                                <!--FIELD TABEL-->
                                                <tr class="text-center">
                                                    <th width="3%">NO</th>
                                                    <th>NIM</th>
                                                    <th>NAMA SISWA</th>
                                                    <th>TEMPAT LAHIR</th>
                                                    <th>TANGGAL LAHIR</th>
                                                    <th>JENIS KELAMIN</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                <?php
//MENGAMBIL RECORD DARI TABEL ANGGOTA
                    $sql = "SELECT * FROM tb_anggota";
                    $query = mysqli_query($koneksi,$sql);
                    $no = 0; //MMEBUAT NOMOR URUT
                    while ($data = mysqli_fetch_array($query)) //PERULANGAN UNTUK MENGAMBIL DATA
                    { 
                    //DEKLARASI PENGAMBILAN DATA
                    $nim = $data['nim'];
                    $nama = $data['nama'];
                    $tempat_lahir = $data['tempat_lahir'];
                    $tgl_lahir = $data['tgl_lahir'];
                    $jk = $data['jk'];
                    $no++;  //menambah jumlah nomor urut setiap row

                      ?>

                    <!--DATA MASUK SESUAI DENGAN FIELDNYA-->
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $nim; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $tempat_lahir; ?></td>
                        <td><?php echo $tgl_lahir; ?></td>
                        <td><?php echo $jk; ?></td>
                        <td><a href="?page=updateAnggota&nim=<?php echo $nim; ?>" class="btn btn-warning"><i class="fa fa-edit "></i>UPDATE </a>  
                    </tr>
                        <?php } 
                        ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
    <!--AKHIR TABEL-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>






