<?php
    include 'koneksi.php';

    $query = "SELECT * FROM beasiswa;";
    $sql = mysqli_query($conn, $query);
    $no = 0;

?>

<!DOCTYPE html>
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
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                CRUD - BS5
              </a>
            </div>
          </nav>
          
          <!-- judul-->
         <div class="container-fluid">
            <h1 class="mt-4">Beasiswa</h1>
            <figure>
              <blockquote class="blockquote">
                <p>Berisi data yang telah disimpan di database.</p>
              </blockquote>
              <figcaption class="blockquote-footer">
                CRUD <cite title="Source Title">Cread Read Update Delete</cite>
              </figcaption>
            </figure>
            <a href="kelola.php" type="button" class="btn btn-primary mb-3">
                <i class="fa fa-plus"></i>
                Tambah Data
            </a>
            <div class="table-responsive">
              <table class="table align-middle table-bordered table-hover">
                <thead>
                  <tr>
                    <th><center>No.</center></th>
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
                        <img src="img/<?php echo $result['foto_beasiswa']; ?>" style="width: 150px;">
                    </td>
                    <td>
                    <?php echo $result['keterangan']; ?>
                    </td>
                    <td>
                        <a href="kelola.php?ubah=<?php echo $result['id_beasiswa']; ?>" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="proses.php?hapus=<?php echo $result['id_beasiswa']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut???')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                 </tr>
                  <?php
                      }
                  ?>
                </tbody>
            </table>
        </div>
         </div>
    </body>
</html>