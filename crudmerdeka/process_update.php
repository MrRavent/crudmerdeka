<?php
if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $namaMakanan = $_POST['namaMakanan'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];


    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "makanan";

    $koneksi = mysqli_connect($host, $username, $password, $database);

    if (!$koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    $query = "UPDATE Makanan
              SET NamaMakanan = '$namaMakanan',
                  Deskripsi = '$deskripsi',
                  Harga = $harga
              WHERE ID = $id";

    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
} else {
    header("Location: index.php");
    exit();
}
?>
