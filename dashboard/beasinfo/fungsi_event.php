<?php
session_start();
    include '../../db/koneksi.php';

    function tambah_data($data, $files){
        global $conn; // Tambahkan baris ini
        $jenis_event = $data['jenis_event'];
        $foto_event = $files['foto_event']['name'];
        $keterangan = $data['keterangan'];

        $dir = "../dist/img/event/";
        $tmpFile = $files['foto_event']['tmp_name'];

        move_uploaded_file($tmpFile, $dir.$foto_event);

        $query = "INSERT INTO event VALUES(null, '$jenis_event', '$foto_event', '$keterangan')";
        $sql = mysqli_query($conn, $query);

        return true;
    }

    function ubah_data($data, $files){
        global $conn; // Tambahkan baris ini
        $id_event = $data['id_event'];
        $jenis_event = $data['jenis_event'];
        $keterangan = $data['keterangan'];

        $queryShow = "SELECT * FROM event WHERE id_event = '$id_event';";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        if($files['foto_event']['name'] == ""){
            $foto_event = $result['foto_event'];
        } else {
            $foto_event = $files['foto_event']['name'];
            unlink("../dist/img/event/". $result['foto_event']);
            move_uploaded_file($files['foto_event']['tmp_name'], '../dist/img/event/'.$files['foto_event']['name']);
        }

        $query = "UPDATE event SET jenis_event='$jenis_event', keterangan='$keterangan', foto_event='$foto_event' WHERE id_event='$id_event';";
        $sql = mysqli_query($conn, $query);

        return true;
    }
?>
