<?php

    include 'fungsi_beasiswa.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){
            
            $berhasil = tambah_data($_POST, $_FILES);

            if($berhasil){
                 $_SESSION['berhasil'] = 'Berhasil Menambah Data Ya';
                header("location: beasiswa.php");
            } else {
                echo $berhasil;
            }

        } else if($_POST['aksi'] == "edit"){

            $berhasil = ubah_data($_POST, $_FILES); 

            if($berhasil){
                 $_SESSION['berhasil'] = 'Berhasil Mengubah Data';
                header("location: beasiswa.php");
            } else {
                echo $berhasil;
            }

        }

    }

    if(isset($_GET['hapus'])){
        $id_beasiswa = $_GET['hapus'];

        $queryShow = "SELECT * FROM beasiswa WHERE id_beasiswa = '$id_beasiswa';";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        //var_dump($result);

        unlink("../dist/img/beasiswa/". $result['foto_beasiswa']);



        $query = "DELETE FROM beasiswa WHERE id_beasiswa = '$id_beasiswa';";
        $sql = mysqli_query($conn, $query);

        if($sql){
             $_SESSION['berhasil'] = 'Berhasil Menghapus Data';
            header("location: beasiswa.php");
            //echo "Data Berhasil Ditambahkan <a href='index.php'>[Home]</a>";
        } else {
            echo $query;
        }
        //echo "Hapus Data <a href='index.php'>[Home]</a>";
    }
?>