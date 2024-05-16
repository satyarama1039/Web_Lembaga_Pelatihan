<?php
include "koneksi.php";

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $input_password = $_POST['input_password'];

    if(empty($nama) || empty($email) || empty($input_password)) {
        echo "Harap lengkapi semua field!";
    } else {
        // Periksa apakah email sudah terdaftar
        $check_query = "SELECT * FROM data_user WHERE email = '$email'";
        $check_result = mysqli_query($conn, $check_query);
        if (mysqli_num_rows($check_result) > 0) {
            // Email sudah terdaftar, tampilkan pesan error
            $error_message = "Email sudah terdaftar";
        } else {
            // Email belum terdaftar, lanjutkan proses registrasi
            $hashed_password = password_hash($input_password, PASSWORD_DEFAULT);

            $query = "INSERT INTO data_user (nama, email, input_password) VALUES ('$nama', '$email', '$hashed_password')";
            if(mysqli_query($conn, $query)) {
                ob_end_clean();
                header("Location: form_login.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Landing Page Website Lembaga Pelatihan</title>
    <!-- Menggunakan Internal CSS -->
    <style>
        @font-face {
            font-family: 'FontUtama';
            src: url('/Applications/XAMPP/xamppfiles/htdocs/web_PintarDirumah/MadimiOne-Regular.ttf') format('truetype');
        }
        @font-face {
            font-family: 'FontKedua';
            src: url('/Applications/XAMPP/xamppfiles/htdocs/web_PintarDirumah/Gontserrat-Regular.ttf') format('truetype');
        }
        body {
            background-color:#FDF7E4;
        }
        a:hover {
            color: red;
        }
        h1 {
            font-family: 'FontUtama', sans-serif;
            text-align: center;
            font-size: 25px;
            margin-top: 30px;
        }
        h2 {
            text-align: center;
            font-size: 12px;
            font-family: 'FontKedua', sans-serif;
        }
        h3 {
            font-family: 'FontUtama', sans-serif;
            text-align: center;
            font-size: 30px;
        }
        p {
            font-family: sans-serif;
            text-align: center;
            font-size: 20px;
        }
        input[type=password] {
            color: black;
            background: none;
            padding: 10px;
            width: 25%;
            border: 2px solid goldenrod;
            border-radius: 10px;
            margin-top: 10px;
        }
        input[type=email] {
            color: black;
            background: none;
            padding: 10px;
            width: 25%;
            border: 2px solid goldenrod;
            border-radius: 10px;
            margin-top: 10px;
        }
        input[type=submit] {
            background: #BBAB8C;
            padding: 10px;
            width: 10%;
            border-radius: 10px;
            margin-top: 10px;
        }
        input[type=text] {
            color: black;
            background: none;
            padding: 10px;
            width: 25%;
            border: 2px solid goldenrod;
            border-radius: 10px;
            margin-top: 10px;
        }
  
        #register_error {
            color: red;
            text-align: center;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;

        }
        .custom_header {
            margin-top: 20px;
            margin-left: 200px;
            margin-right: 20px;
        }
        
        .user_option {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 0px;
            margin-right: 200px;
            margin-top: 20px;
        }
        .login_option {
            border-radius: 5px;
            background: #BBAB8C;
            text-align: center;
            width: 100px;
            height: 50px;
            line-height: 50px; 
        }
        .login_option a {
            color: #FDF7E4;
            text-decoration: none;
        }
        .login_option:hover {
            background: #FDF7E4; 
        }
        
        .login_option:hover a {
            color: #BBAB8C; 
        }
        .judul {
            font-family: 'FontUtama', sans-serif;
            font-size: 40px;
            font-weight: bold;
            color: #BBAB8C;
            margin-bottom: 10px;
        }
        .sub_judul {
            font-size: 15px;
            font-family: 'FontKedua', sans-serif;
            margin-bottom: 30px;
        }
        input[type=submit] {
            background: #BBAB8C;
            padding: 10px;
            width: 10%;
            border-radius: 10px;
            margin-top: 10px;
        }
        .register_button:hover {
            background: #FDF7E4; 
        }
        .register_button:hover a {
            color: #BBAB8C; 
        }
        .register_button {
            cursor: pointer;
            font-family: 'Times New Roman', Times, serif;
        }
        .logo {
            margin-top: 10px;
            width: 150px;
        }
    </style>
</head>
<body>
    <header class="custom_header">
        <img class="logo" src="logo.png" alt="pintardirumah">
        <div class="user_option">
            <div class="login_option">
                <a href="page layout.html">Home</a>
            </div>
        </div>
    </header>
    <form id="form_register" action="" method="post">
        <div style="text-align: center;">
            <h1 class="judul">Belum mempunyai akun?</h1>
            <h2 class="sub_judul">Silahkan isi daftar dirimu untuk membuat akun <br>di website Pintar Dirumah </h2> 
            <div>
                <label for="nama">Nama Lengkap</label><br>
                <input type="text" name="nama" placeholder="Nama lengkap..." style="margin-bottom: 20px;"/>
            </div>
            <div>
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" placeholder="Your email..." style="margin-bottom: 20px;">
            </div>
             <div>
                <label for="password">Password</label><br>
                <input type="password" id="input_password" name="input_password" placeholder="Password..." style="margin-bottom: 20px;">
            </div>
            <p>
                <input type="submit" name="submit" value="Register" class="register_button">
            </p>  
        </div>
        <div>
            <h2>Sudah mempunyai akun? <a href="form_login.php">Login disini</a></h2>
        </div>
        <div id="register_error" style="color: red; text-align: center;"></div>
    </form>
    <div id="register_error" style="color: red; text-align: center;">
    <?php echo $error_message; ?>
</div>

    

    <script>
    document.getElementById("form_register").addEventListener("submit", function(event) {
        var nama = document.getElementsByName("nama")[0].value;
        var email = document.getElementById("email").value;
        var input_password = document.getElementById("input_password").value;
        var errorDiv = document.getElementById("register_error");
        

        // Validasi nama
        if (!nama || !nama.trim()) {
            errorDiv.textContent = "Nama harus diisi";
            event.preventDefault();
            return;
        }

        // Validasi email
        if (!email || !email.trim()) {
            errorDiv.textContent = "Email harus diisi";
            event.preventDefault();
            return;
        }

        // Validasi password
        if (!input_password || !input_password.trim()) {
            errorDiv.textContent = "Password harus diisi";
            event.preventDefault();
            return;
        }

    });
</script>


</body>
</html>