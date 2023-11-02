<?php
if (isset($_GET['id'])) {
    $makananID = $_GET['id'];

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "makanan";


    $koneksi = mysqli_connect($host, $username, $password, $database);


    if (!$koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }


    $query = "DELETE FROM Makanan WHERE ID = $makananID";

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
