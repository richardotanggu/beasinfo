<?php

    include 'fungsi_event.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){
            
            $berhasil = tambah_data($_POST, $_FILES);

            if($berhasil){
                 $_SESSION['berhasil'] = 'Berhasil Menambah Data Ya';
                header("location: webinar.php");
            } else {
                echo $berhasil;
            }

        } else if($_POST['aksi'] == "edit"){

            $berhasil = ubah_data($_POST, $_FILES); 

            if($berhasil){
                 $_SESSION['berhasil'] = 'Berhasil Mengubah Data';
                header("location: event.php");
            } else {
                echo $berhasil;
            }

        }

    }

    if(isset($_GET['hapus'])){
        $id_event = $_GET['hapus'];

        $queryShow = "SELECT * FROM event WHERE id_event = '$id_event';";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        //var_dump($result);

        unlink("../dist/img/event/". $result['foto_event']);



        $query = "DELETE FROM event WHERE id_event = '$id_event';";
        $sql = mysqli_query($conn, $query);

        if($sql){
             $_SESSION['berhasil'] = 'Berhasil Menghapus Data';
            header("location: event.php");
            //echo "Data Berhasil Ditambahkan <a href='index.php'>[Home]</a>";
        } else {
            echo $query;
        }
        //echo "Hapus Data <a href='index.php'>[Home]</a>";
    }
?>