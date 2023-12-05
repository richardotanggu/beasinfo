<?php
include '../layouts/header.php';
include '../layouts/navbar.php';
include '../layouts/sidebar.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Beasiswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../">Beranda</a></li>
              <li class="breadcrumb-item active">Tambah Beasiswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah Beasiswa</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="container">
             <form method="POST" action="proses_beasiswa.php" enctype="multipart/form-data">
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
                    <a href="beasiswa.php" type="button" class="btn btn-danger">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        Batal
                    </a>
                </div>
            </div>
             </form>
          </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include '../layouts/footer.php';
?>