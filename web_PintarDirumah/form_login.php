<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($conn, $email);

    $query = "SELECT input_password FROM data_user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['input_password'];

    
    if(password_verify($password, $hashed_password)) {
        
        $_SESSION['email'] = $email;
        header("location: index.php"); 
    } else {
        $error = "Email atau Password salah";
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
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;

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
        #login_error {
            color: red;
            text-align: center;
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
        .login_button:hover {
            background: #FDF7E4; 
        }
        .login_button:hover a {
            color: #BBAB8C; 
        }
        .login_button {
            cursor: pointer;
            font-family: 'Times New Roman', Times, serif;
        }
        .judul {
            font-family: 'FontUtama', sans-serif;
            font-size: 50px;
            font-weight: bold;
            color: #BBAB8C;
            margin-bottom: 10px;
        }
        .sub_judul {
            font-size: 15px;
            font-family: 'FontKedua', sans-serif;
            margin-bottom: 30px;
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
    <h1 class="judul">Masuk ke Akunmu</h1>
    <h2 class="sub_judul">Silahkan masuk ke akun yang sudah kamu daftarkan <br>di website Pintar Dirumah </h2>
    <form id="login_form" action="" method="post">
        <div style="text-align: center;">
            <div>
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" placeholder="Your email..." style="margin-bottom: 20px;">
            </div>

             <div>
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" placeholder="Password..." style="margin-bottom: 10px;">
            </div>
            <p>
                <input type="submit" name="submit" value="Login" class="login_button">
            </p>  
        </div>
        <div>
            <h2>Belum mempunyai akun? <a href="input_registrasi.php">Register disini</a></h2>
        </div>
    </form>
    <div id="login_error">
    <?php
    if (isset($error)) {
        echo $error;
    }
    ?>
</div>


    <div id="login_error"></div>

    <script>
        // Validasi input form login
        document.getElementById("login_form").addEventListener("submit", function(event) {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var errorDiv = document.getElementById("login_error");
            
            // Validasi email
            if (!email || !email.trim()) {
                errorDiv.textContent = "Email harus diisi";
                event.preventDefault();
                return;
            }

            // Validasi password
            if (!password || !password.trim()) {
                errorDiv.textContent = "Password harus diisi";
                event.preventDefault();
                return;
            }
        });
        </script>
        
    
</body>
</html>