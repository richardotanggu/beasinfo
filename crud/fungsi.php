<?php
    include 'koneksi.php';

    function tambah_data($data, $files){
        global $conn; // Tambahkan baris ini
        $jenis_beasiswa = $data['jenis_beasiswa'];
        $foto_beasiswa = $files['foto_beasiswa']['name'];
        $keterangan = $data['keterangan'];

        $dir = "img/";
        $tmpFile = $files['foto_beasiswa']['tmp_name'];

        move_uploaded_file($tmpFile, $dir.$foto_beasiswa);

        $query = "INSERT INTO beasiswa VALUES(null, '$jenis_beasiswa', '$foto_beasiswa', '$keterangan')";
        $sql = mysqli_query($conn, $query);

        return true;
    }

    function ubah_data($data, $files){
        global $conn; // Tambahkan baris ini
        $id_beasiswa = $data['id_beasiswa'];
        $jenis_beasiswa = $data['jenis_beasiswa'];
        $keterangan = $data['keterangan'];

        $queryShow = "SELECT * FROM beasiswa WHERE id_beasiswa = '$id_beasiswa';";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        if($files['foto_beasiswa']['name'] == ""){
            $foto_beasiswa = $result['foto_beasiswa'];
        } else {
            $foto_beasiswa = $files['foto_beasiswa']['name'];
            unlink("img/". $result['foto_beasiswa']);
            move_uploaded_file($files['foto_beasiswa']['tmp_name'], 'img/'.$files['foto_beasiswa']['name']);
        }

        $query = "UPDATE beasiswa SET jenis_beasiswa='$jenis_beasiswa', keterangan='$keterangan', foto_beasiswa='$foto_beasiswa' WHERE id_beasiswa='$id_beasiswa';";
        $sql = mysqli_query($conn, $query);

        return true;
    }
?>
