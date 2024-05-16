<?php
session_start();
include "koneksi.php";

// Tangani data yang dikirimkan dari form login
if(isset($_POST['submit'])){
    // Ambil nilai email dan password dari form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Periksa apakah email yang dimasukkan oleh pengguna terdapat di database
    $query = "SELECT * FROM data_user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    // Periksa apakah ada hasil yang ditemukan
    if(mysqli_num_rows($result) > 0) {
        // Jika email ditemukan, ambil data pengguna
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['input_password'];

        // Periksa apakah password cocok
        if($password === $stored_password) {
            // Jika password cocok, arahkan ke halaman yang sesuai
            header("Location: page_layout.html");
            exit();
        } else {
            // Jika password tidak cocok, tampilkan pesan kesalahan
            echo "Password yang dimasukkan salah";
        }
    } else {
        // Jika email tidak ditemukan, tampilkan pesan kesalahan
        echo "Email tidak ditemukan";
    }
}

// Jika kode di atas tidak dijalankan (misalnya, pengguna mengakses file ini secara langsung), arahkan kembali ke halaman login
header("Location: form_login.html");
exit();
?>
