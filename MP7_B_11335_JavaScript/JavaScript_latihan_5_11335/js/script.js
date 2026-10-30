function fn_ValForm() {
    // Mengambil nilai dari form
    var nama = document.getElementById("nama").value.trim();
    var email = document.getElementById("email").value.trim();
    var umurStr = document.getElementById("umur").value.trim();
    var kategori = document.getElementById("kategori").value;
 
    var pesanError = "";
    var isValid = true;
 
    // b. Validasi tidak boleh kosong
    if (nama === "") {
        pesanError += "- Nama tidak boleh kosong\n";
        isValid = false;
    }
 
    if (email === "") {
        pesanError += "- Email tidak boleh kosong\n";
        isValid = false;
    } else {
        // c. Validasi email dengan regular expression (hanya huruf kecil)
        var polaEmail = /^[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9]@[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9][\.][a-z0-9]{2,4}$/;
        if (!polaEmail.test(email)) {
            pesanError += "- Format email tidak valid (harus huruf kecil dan sesuai pola)\n";
            isValid = false;
        }
    }
 
    var info = "";
    if (umurStr === "") {
        pesanError += "- Umur tidak boleh kosong\n";
        isValid = false;
    } else {
        // d. Validasi umur harus berupa angka dan di antara 17 sampai 65 tahun
        var umur = Number(umurStr);
        if (isNaN(umur) || umur < 17 || umur > 65) {
            pesanError += "- Umur harus berupa angka antara 17 sampai 65 tahun\n";
            isValid = false;
        } else {
            // d.i & d.ii If-else penentuan info berdasarkan umur
            if (umur <= 25) {
                info = "Paket Pelajar";
            } else {
                info = "Paket Umum";
            }
        }
    }
 
    if (kategori === "") {
        pesanError += "- Paket member harus dipilih\n";
        isValid = false;
    }
 
    // i. Jika ada kesalahan, tampilkan dalam satu alert dan kembalikan false
    if (!isValid) {
        alert("Mohon perbaiki kesalahan berikut:\n\n" + pesanError);
        return false;
    }
 
    // e. Switch-case untuk menentukan nama pilihan berdasarkan kode paket
    var pilihan = "";
    switch (kategori) {
        case "S":
            pilihan = "Silver";
            break;
        case "G":
            pilihan = "Gold";
            break;
        case "P":
            pilihan = "Platinum";
            break;
        default:
            pilihan = "Tidak diketahui";
    }
 
    // f. Jika semua isian valid, tampilkan alert dengan format yang diminta
    alert("Terima kasih " + nama + " ! Anda terdaftar di paket " + pilihan + " (" + info + ").");
   
    return true;
}
 