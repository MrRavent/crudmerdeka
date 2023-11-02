<?php
if (isset($_GET['id'])) {
    $makananID = $_GET['id'];

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

    // Query untuk menghapus data makanan berdasarkan ID
    $query = "DELETE FROM Makanan WHERE ID = $makananID";

    if (mysqli_query($koneksi, $query)) {
        // Jika penghapusan berhasil
        header("Location: index.php"); // Redirect kembali ke halaman utama setelah penghapusan
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
} else {
    // Jika tidak ada parameter ID, kembalikan ke halaman sebelumnya
    header("Location: index.php");
    exit();
}
?>
