<?php
session_start();
include '../../db/koneksi.php';
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

    
    $query = "SELECT * FROM beasiswa;";
    $sql = mysqli_query($conn, $query);
    $no = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Beasinfo </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Font Awesome -->
        <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
        <!-- Sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<?php 
if (isset($_SESSION['berhasil'])) {
  echo '<script>';
  echo 'Swal.fire({';
  echo '    position: "center",';
  echo '    icon: "success",';
  echo '    title: "' . $_SESSION['berhasil'] . '",';
  echo '    showConfirmButton: false,';
  echo '    timer: 3000'; //Ini 3 detik
  echo '});';
  echo '</script>';
  unset($_SESSION['berhasil']); // Hapus pesan dari session
}
?>