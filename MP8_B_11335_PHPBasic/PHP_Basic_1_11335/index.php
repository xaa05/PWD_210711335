<?php
    echo "<h1>Data jurusan</h1>";
    echo '<Form method="POST" action="">
            <p>Nama  :<br /><input type="text" name="nama" /></p>
            <p>NPM   :<br /><input type="text" name="nama" /></p>
            <p>Jurusan:<br /><input type="text" name="jurusan" /></p>
            <button type="submit">Kirim</button>
        </form>';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];
        $npm = $_POST['npm'];
        $jurusan = $_POST['jurusan'];
        echo "Jurusan " . htmlspecialchars($nama) . " / " . htmlspecialchars($npm) . " adalah " . htmlspecialchars($jurusan);
    }else{
        echo "Silahkan isis formulis di atas untuk mengerjakan data jurusan anda.";
    
    }
?>