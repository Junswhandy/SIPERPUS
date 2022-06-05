<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

h1{
    padding-top: 5rem;
    
    
}
</style>
<body>
    <div class="container">
    <div id="page-wrapper" >
    <div id="page-inner">

    

        
                <div class="panel panel-default">

                <h1 class="text-center">TRANSAKSI PEMINJAMAN BUKU</h1>
                 
                 <div class="panel-body">
                    <div class="table-responsive">

                        <div>
                            <a href="index.php?page=tambahtransaksi" class="btn btn-success"><i class=" fa fa-plus "></i> Tambah Transaksi</a>
                        </div><br>

                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                           
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                    <th>Terlambat</th>
                                    <th width="21%">Action</th>
                                </tr>
                           

                             <?php 

                             $sql = "SELECT * FROM tb_transaksi";
                             $query = mysqli_query($koneksi,$sql);
                    $no = 0; 

                    while ($data = mysqli_fetch_array($query)) { 

                        $id = $data['id'];
                        $id_buku = $data['id_buku'];
                        $judul = $data['judul'];
                        $nama = $data['nama'];
                        $nim = $data['nim'];
                        $tgl_pinjam = $data['tgl_pinjam'];
                        $tgl_kembali = $data['tgl_kembali'];
                        $status = $data['status'];

                      $no++; 

                      ?>

                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $judul; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $nim; ?></td>
                        <td><?php echo $tgl_pinjam; ?></td>
                        <td><?php echo $tgl_kembali; ?></td>
                        <td><?php echo $status; ?></td>
                        <td><?php 

                            $tangal_dateline = $data['tgl_kembali'];
                            $tgl_kembali = date('Y-m-d');
                            $lambat = terlambat($tangal_dateline,$tgl_kembali);

                            if ($lambat>0) {
                                echo "<font color='red'> $lambat Hari </font>";
                            } else {
                                echo $lambat . " Hari";
                            }

                            ?>  
                        </td>
                        <td>
                          <a href="?page=kembali&id=<?php echo $data['id']; ?>&judul=<?php echo $data['judul']; ?>" class="btn btn-info">Kembali </a>   
                          <a href="?page=perpanjang&id=<?php echo $data['id']; ?>&judul=<?php echo $data['judul']; ?>&tgl_kembali=<?php echo $data['tgl_kembali']; ?>&lambat=<?php echo $lambat; ?>" class="btn btn-danger"> Perpanjang</a>
                      </tr>

                  <?php } ?>

              </tbody>
          </table>
      </div>

  </div>
</div>
<!--End Advanced Tables -->
</div>
</div>

</div>

<br><br><br><br><br><br><br><br><br>
</div>
    </div>
</body>
</html>
