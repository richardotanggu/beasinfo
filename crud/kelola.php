<!DOCTYPE html>
<?php
    include 'koneksi.php';

        $id_beasiswa = '';
        $jenis_beasiswa = '';
        $keterangan = '';

    if(isset($_GET['ubah'])){
        $id_beasiswa = $_GET['ubah'];

        $query = "SELECT * FROM beasiswa  WHERE id_beasiswa = '$id_beasiswa';";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);

        $jenis_beasiswa = $result['jenis_beasiswa'];
        $keterangan = $result['keterangan'];
        
        //var_dump($result);

        //die();
    }
?>

<html>
    <head>
        <meta carset="uft-8">
        <!-- bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.bundle.min.js" ></script>
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

        <title>belajar_crud</title>
    </head>
    <body>
        <nav class="navbar navbar-light bg-light mb-4">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                CRUD - BS5
              </a>
            </div>
          </nav>
          <div class="container">
             <form method="POST" action="proses.php" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $id_beasiswa; ?>" name="id_beasiswa">
             <div class="mb-3 row">
                <label for="jenis_beasiswa" class="col-sm-2 col-form-label">
                    Jenis Beasiswa
                </label>
                <div class="col-sm-10">
                  <input required type="text" name="jenis_beasiswa" class="form-control" id="jenis_beasiswa" 
                  placeholder="Ex: Beasiswa Gratis" value="<?php echo $jenis_beasiswa; ?>">
                </div>
            </div>
              <div class="container">
              <div class="mb-3 row">
                <label for="foto_beasiswa" class="col-sm-2 col-form-label">
                    Foto Beasiswa
                </label>
                <div class="col-sm-10">
                    <input <?php if (!isset($_GET['ubah'])){ echo "required";} ?> class="form-control" type="file" name="foto_beasiswa" id="foto_beasiswa" accept="image/*">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="keterangan_beasiswa" class="col-sm-2 col-form-label">
                    Keterangan Beasiswa
                </label>
                <div class="col-sm-10">
                    <textarea required class="form-control" id="keterangan" name="keterangan" rows="3"> <?php echo $keterangan; ?></textarea>
                </div>
            </div>
            <div class="mb-3 row mt-4">
                <div class="col">
                    <?php
                        if(isset($_GET['ubah'])){
                    ?>
                        <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Simpan Perubahan
                        </button>
                    <?php
                        } else {
                    ?>
                        <button type="submit" name="aksi" value="add" class="btn btn-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Tambahkan
                        </button>
                        <?php
                        }
                    ?>
                    <a href="index.php" type="button" class="btn btn-danger">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        Batal
                    </a>
                </div>
            </div>
             </form>
          </div>
    </body>
</html>