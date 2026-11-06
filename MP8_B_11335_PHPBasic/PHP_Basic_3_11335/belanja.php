<h2>Belanja</h2>
<h3>Daftar Kategori:</h3>
<form method="POST" action="">
    <p>Makanan dan Minuman: <br />
        <select name="makanan_minuman">
            <option value="">-- Pilih Makanan/Minuman --</option>
            <option value="pop mie">pop mie</option>
            <option value="air mineral">air mineral</option>
        </select>
    </p>
    <p>Alat Tulis: <br />
        <select name="alat_tulis">
            <option value="">-- Pilih Alat Tulis --</option>
            <option value="pulpen">pulpen</option>
            <option value="tipe-x">tipe-x</option>
        </select>
    </p>
    <button type="submit">Kirim</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $makanan_minuman = $_POST['makanan_minuman'] ?? '';
    $alat_tulis = $_POST['alat_tulis'] ?? '';
    $errors = [];

    if (empty($makanan_minuman) || empty($alat_tulis)) {
        $errors[] = "Harap pilih produk yang ingin dibeli.";
    }

    if (!empty($errors)) {
        foreach ($errors as $err) {
            echo "<p style='color:red;'>$err</p>";
        }
    } else {
        $harga_makanan = ($makanan_minuman == 'pop mie') ? 5000 : 4000;
        $harga_alat = ($alat_tulis == 'pulpen') ? 2000 : 8000;
        $totalBayar = $harga_makanan + $harga_alat;

        function dapatDiskon($totalBayar) {
            if ($totalBayar >= 10000) {
                return 0.05;
            } else {
                return 0;
            }
        }

        function totalHarga($diskon, $totalBayar) {
            return $totalBayar - ($totalBayar * $diskon);
        }

        $diskon = dapatDiskon($totalBayar);
        $finalHarga = totalHarga($diskon, $totalBayar);

        echo "<h3>Informasi Belanja</h3>";
        echo "<p>Makanan dan Minuman: " . htmlspecialchars($makanan_minuman) . "</p>";
        echo "<p>Alat Tulis: " . htmlspecialchars($alat_tulis) . "</p>";
        echo "<p>Total Harga: " . htmlspecialchars($finalHarga) . "</p>";
        echo "<p>Diskon: " . htmlspecialchars($diskon) . "</p>";

        if ($diskon == 0) {
            echo "<p>Maaf tidak ada diskon yang diberikan.</p>";
        } else {
            echo "<p>Selamat! Anda mendapatkan diskon " . htmlspecialchars($diskon * 100) . "%.</p>";
        }
    }
} else {
    echo "<p>Silahkan pilih produk yang ingin dibeli.</p>";
}
?>