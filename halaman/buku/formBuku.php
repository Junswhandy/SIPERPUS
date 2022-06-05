<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM BUKU</title>
</head>
<style type="text/css">

h1{
    padding-top:1rem
    
}
</style>
<body>
<section>
    <div class="container" >
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="panel panel-default">
                     <h1 class="text-center">DAFTAR BUKU</h1>
                        <div class="panel-body">
                            <div class="table-responsive">


                        <?php if ($_SESSION['admin']) { ?>
                        <div>
                            <a href="index.php?page=tambahBuku" class="btn btn-success"><i class=" fa fa-plus "></i> Tambah Data</a>
                        </div>
                        <?php } ?>

                        <br>

                                 <table class="table table-success table-striped table-bordered ">
                           
                                
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Judul Buku</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>Tahun</th>
                                        <th>ISBN</th>
                                        <th>Jumlah</th>
                                        <th>Lokasi</th> 
                                    </tr>
                    <?php 

                    //MENAMPILKAN DATA DARI DATABASE
                                $sql = "SELECT * FROM tb_buku";
                                $query = mysqli_query($koneksi,$sql);

                    $no = 0; //membuat variabel $no untuk membuat nomor urut

                    while ($data = mysqli_fetch_array($query)) { //perulangan while dg membuat variabel $data yang akan mengambil data di database

                        $judul = $data['judul'];
                        $pengarang = $data['pengarang'];
                        $penerbit = $data['penerbit'];
                        $tahun_terbit = $data['tahun_terbit'];
                        $isbn = $data['isbn'];
                        $jumlah_buku = $data['jumlah_buku'];
                        $lokasi = $data['lokasi'];

                      $no++;  //menambah jumlah nomor urut setiap row

                      ?>

                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $judul; ?></td>
                        <td><?php echo $pengarang; ?></td>
                        <td><?php echo $penerbit; ?></td>
                        <td><?php echo $tahun_terbit; ?></td>
                        <td><?php echo $isbn; ?></td>
                        <td><?php echo $jumlah_buku; ?></td>
                        <td><?php echo $lokasi; ?></td>                      
                      </tr>

                <?php } ?>            
                                </table>       
                        </div>
                    </div>
                </div>
<!--End Advanced Tables -->
            </div>
        </div>
    </div>
</section> 
</body>
</html>














 