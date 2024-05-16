<?php
// Koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pintar_dirumah_db';
$port = 6969;

$conn = mysqli_connect($host, $username, $password, $database);

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Tangkap data dari formulir
$nama = $_POST['nama'];
$email = $_POST['email'];
$input_password = $_POST['password'];
$jenis_kelamin = $_POST['jenis_kelamin'];


// Query untuk menyimpan data ke dalam database
$sql = "INSERT INTO data_user (nama, email, password, jenis_kelamin) VALUES ('$nama', '$email', '$input_password', '$jenis_kelamin')";

if (mysqli_query($conn, $sql)) {
    echo "Data berhasil disimpan";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
