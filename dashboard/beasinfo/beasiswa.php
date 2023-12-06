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
            <h1>Beasiswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../">Beranda</a></li>
              <li class="breadcrumb-item active">Beasiswa</li>
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
                <h3 class="card-title">Beasiswa</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <a href="kelola_beasiswa.php" type="button" class="btn btn-primary mb-3">
                <i class="fa fa-plus"></i>
                Tambah Data
            </a>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                   <th>Jenis Beasiswa</th>
                    <th>foto Beasiswa</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                 <tbody>
                   <?php
                      while($result = mysqli_fetch_assoc($sql)){
                  ?>
                  <tr>
                    <td><center>
                       <?php echo ++$no; ?>.
                    </center></td>
                    <td>
                       <?php echo $result['jenis_beasiswa']; ?>
                    </td>
                    <td>
                        <img src="../dist/img/beasiswa/<?php echo $result['foto_beasiswa']; ?>" style="width: 150px;">
                    </td>
                    <td>
                    <?php echo $result['keterangan']; ?>
                    </td>
                    <td>
                        <a href="kelola_beasiswa.php?ubah=<?php echo $result['id_beasiswa']; ?>" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="proses_beasiswa.php?hapus=<?php echo $result['id_beasiswa']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut???')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                 </tr>
                  <?php
                      }
                  ?>
                 </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                   <th>Jenis Beasiswa</th>
                    <th>foto Beasiswa</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
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