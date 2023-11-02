<?php
if (isset($_POST['submit'])) {
    // Tangani pembaruan data ke database di sini
    $id = $_POST['id'];
    $namaMakanan = $_POST['namaMakanan'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    // Konfigurasi koneksi database
    $host = "localhost"; // Ganti dengan host MySQL Anda
    $username = "root"; // Ganti dengan username MySQL Anda
    $password = ""; // Ganti dengan password MySQL Anda
    $database = "makanan"; // Ganti dengan nama database Anda

    // Membuat koneksi ke database
    $koneksi = mysqli_connect($host, $username, $password, $database);

    // Periksa koneksi
    if (!$koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Query untuk memperbarui data makanan berdasarkan ID
    $query = "UPDATE Makanan
              SET NamaMakanan = '$namaMakanan',
                  Deskripsi = '$deskripsi',
                  Harga = $harga
              WHERE ID = $id";

    if (mysqli_query($koneksi, $query)) {
        // Jika pembaruan berhasil
        header("Location: index.php"); // Redirect kembali ke halaman utama setelah pembaruan
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
} else {
    // Jika tidak ada permintaan submit, kembalikan ke halaman sebelumnya
    header("Location: index.php");
    exit();
}
?>
