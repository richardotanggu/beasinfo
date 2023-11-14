<?php
$conn = mysqli_connect("localhost", "root", "", "klinik");

if(mysqli_connect_errno()){
    echo "koneksi gagal";
}else{
    echo "koneksi berhasil";    
}

?>