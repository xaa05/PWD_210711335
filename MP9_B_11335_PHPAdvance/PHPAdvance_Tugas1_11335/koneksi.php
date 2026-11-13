<?php
    $conn = mysqli_connect('localhost', 'root', '', 'mp9_perpustakaan');

    if(!$conn) {
        die('koneksi gagal: '. mysqli_connect_error());
    }
?>