<script type="text/javascript">
    function validasi(form){
        if (form.username.value=="") {
            alert("Username Tidak Boleh Kosong");
            form.username.focus();
            return (false);
        }
        if (form.password.value=="") {
            alert("Password Tidak Boleh Kosong");
            form.password.focus();
            return (false);
        }
        if (form.nama.value=="") {
            alert("Nama Tidak Boleh Kosong");
            form.nama.focus();
            return (false);
        }
        
        return(true); 
    }
</script>




<style type="text/css">
h3{
    padding-top: 5rem
    
}
</style>
<div class="container">
<div id="page-wrapper" >
    <div id="page-inner">

     
            <!-- Form Elements -->
            <div class="panel panel-default">
              
                    <h3 class="text-center">Tambah Data User</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form role="form" method="POST" enctype="multipart/form-data" onsubmit="return validasi(this)">

                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" name="username" id="username" />
                                </div>


                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" name="password" id="password" />
                                </div>

                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input class="form-control" name="nama" id="nama" />
                                </div>

                                <div class="form-group">
                                    <label>Level Akses</label>
                                    <select class="form-control" name="level">
                                        <option>PILIH AKSES LEVEL</option>

                                        <option value="admin">ADMIN</option>
                                        
                                        <option value="user">USER</option>
                                    </select>
                                </div>
<br>
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

</div>
<!-- /. PAGE INNER  -->

</div>
</div>


<?php

        // cek apakah tombol daftar sudah diklik atau belum ?
if (isset($_POST['simpan'])) {

        // ambil data dari formulir :
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $level = $_POST['level'];

        // buat query
    $sql = "INSERT INTO tb_user (username,password,nama,level) VALUES ('$username','$password','$nama','$level')";
    $query = mysqli_query($koneksi,$sql);




    
 
        // apakah query simpan berhasil ?
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

