<?php
session_start();

if(!isset($_SESSION['email'])){
    header("Location: form_login.php");
    exit;

    $nama = $_SESSION['nama'];
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Page Layout Sederhana</title>
    <!-- Menggunakan CSS Eksternal -->
    <style>
        @import url(style.css);
    </style>
</head>
<body>
    <!-- Header -->
    <header class="custom_header">
        <img class="logo" src="logo.png" alt="pintardirumah">
        <nav>
            <a href="page layout.html">Home</a> 
            <a href="About.html">About</a> 
            <a href="contact.html">Contact</a>
        </nav>
            <div>
            <a href="logout.php">Logout</a>
            </div>
        </div>
    </header>
    
    <div class="isi_konten">
        <div class="konten_1">
            <img src="orang_1.png" alt="orang" style="width: 20em; height: auto;">
            <div>
                <p class="judul_1">Sekarang belajar bisa langsung tanpa terhalang waktu perjalanan!</p>
                <p class="sub_judul_1">Adapun keuntungan kamu mengikuti program dari Pintar Dirumah sebagai berikut <br> 
                </p>
                <ul class="list_1">
                    <li>Menghemat waktu perjalanan ke sekolah</li>
                    <li>Menghemat energi, sehingga ilmu yang masuk optimal</li>
                    <li>Efisien terhadap waktu</li>
                </ul>
                <p class="sub_judul_1">
                    Bergabunglah dengan kami dalam perjalanan belajar menuju masa depan, karena pembelajaran kini bisa diakses dari kenyamanan rumah untuk generasi emas masa depan!
                </p>
            </div>
    </div>

    <p id="pilihan_program" class="judul_konten_2">Pilihan Program</p>
    <p class="sub_judul_konten_2">
        Terdapat beragam program yang bisa dipilih sesuai dengan minat belajar Anda, mencakup berbagai bidang dan topik yang ingin Anda pelajari.
    </p>
    <div class="konten_2">
        <div class="kotak_konten_2">
            <img src="ipa.jpg" alt="" width="85%">
            <p class="konten_isi2">Science</p>
            <p class="konten_isi_2">Pengetahuan seputar alam seperti halnya biologi, fiska, kimia, geologi, dan astronomi</p>
            <div class="button_pilih_kelas">
                <a href="#">Pilih Program</a>
            </div>
        </div>

        <div class="kotak_konten_2">
            <img src="math.jpg" alt="" width="85%">
            <p class="konten_isi2">Math</p>
            <p class="konten_isi_2">Meliputi konsep-konsep seperti aljabar, geometri, trigonometri, statistika, dan kalkulus</p>
            <div class="button_pilih_kelas">
                <a href="#">Pilih Program</a>
            </div>
        </div>

        <div class="kotak_konten_2">
            <img src="english.jpg" alt="" width="85%">
            <p class="konten_isi2">English</p>
            <p class="konten_isi_2">Mencakup keterampilan mendengarkan, berbicara, serta tata bahasabahasa Inggris.</p>
            <div class="button_pilih_kelas">
                <a href="#">Pilih Program</a>
            </div>
        </div>

        <div class="kotak_konten_2">
            <img src="computer_science.jpg" alt="" width="85%">
            <p class="konten_isi2">Computer Science</p>
            <p class="konten_isi_2">Mencakup keterampilan mendengarkan, berbicara, serta tata bahasabahasa Inggris.</p>
            <div class="button_pilih_kelas">
                <a href="#">Pilih Program</a>
            </div>
        </div>
    </div>
   
    <p class="judul_konten_3">Durasi Pelatihan</p>
    <p class="sub_judul_konten_3">
        Tersedia berbagai program pelatihan dengan durasi yang beragam, mencakup berbagai bidang seperti ilmu science, math, english, dan computer science, sehingga kamu dapat memilih sesuai dengan kebutuhan dan minat kamu sendiri!.
    </p>
    <div>
        <table class="table" border="1" cellpadding="5">
            <tr>
                <th>Mata Pelajaran</th>
                <th>Jumlah Mahasiswa</th>
                <th>Durasi Pelatihan</th>
            </tr>
            <tr align="center">
                <td>Science</td>
                <td>20</td>
                <td>2 bulan</td>
            </tr>
            <tr align="center">
                <td>Mathematics</td>
                <td>25</td>
                <td>3 bulan</td>
            </tr>
            <tr align="center">
                <td>English</td>
                <td>15</td>
                <td>1 bulan</td>
            </tr>
            <tr align="center">
                <td>Computer Science</td>
                <td>10</td>
                <td>3 bulan</td>
            </tr>
        </table>
    </div>
    
    <div class="konten_4">
        <p class="judul_konten_4">10 Manfaat Belajar dari Rumah untuk Kamu</p>
        <div class="slideshow-container">
           
                <img class="mySlides fade" src="study_group.png" alt="Slide 1" width="100%">
    
                <img class="mySlides fade" src="study_group2.png" alt="Slide 2" width="100%">

                <img class="mySlides fade" src="study_group3.png" alt="Slide 2" width="100%">
    </div>
    <h4 style="margin-top: 20px;">1. Lebih mudah menerima materi dengan lebih baik</h4>
    <p>Manfaat belajar dari rumah yang pertama adalah materi pelajaran yang diberikan lebih mudah diterima dengan baik. Hal ini dikarenakan seluruh bahan materi pembelajaran sudah tersimpan di satu dokumen seperti google drive atau google classroom, sehingga para siswa mampu menyimpan dan mempelajari kembali materi-materi yang diberikan kapan aja.</p>
    <p>Kalau belajar secara langsung di sekolah, para siswa harus fokus mendengarkan dan mencatat materi yang diberikan oleh guru, dan materi tersebut hanya bisa diakses satu kali di hari itu aja. </p>

    <h4>2. Gaya belajar lebih fleksibel</h4>
    <p>Manfaat belajar dari rumah yang selanjutnya adalah para siswa lebih memiliki gaya belajar yang cenderung fleksibel. Misalnya seperti kalau di kelas para siswa harus belajar di saat itu juga dan didampingi oleh guru, namun beda dengan belajar di rumah. Belajar di rumah bisa membuat para siswa menemukan gaya belajarnya sendiri.</p>
    <p>Mungkin pas di awal-awal, para siswa akan kesulitan untuk beradaptasi, namun seiring berjalannya waktu, anak-anak juga bisa mengikuti proses belajar tersebut bahkan keluar dari zona nyaman dan menemukan gaya belajar yang mereka suka agar lebih mudah memahami pembelajaran.</p>

    <h4>3. Waktu belajar jadi lebih efektif dan efisien</h4>
    <p>Manfaat belajar dari rumah yang selanjutnya adalah waktu belajar menjadi lebih efektif dan efisien. Para siswa gak perlu repot-repot untuk membeli buku pelajaran karena hampir seluruh materi pembelajaran semuanya bisa diakses melalui e-book.</p>
    <p>Waktu para siswa untuk mengerjakan tugas juga lebih bisa diatur karena seluruhnya terjadwal melalui google classroom, jadi para siswa bisa lebih bisa belajar mengatur waktu dengan lebih baik.</p>
    <p>Baca lebih lanjut, cek di <a href="https://www.gokampus.com/blog/10-manfaat-belajar-dari-rumah-untuk-kamu-anak-sma?hideHeader=false">GoKampus</a></p>
</div>
   
    <!-- script -->
    <script>
        var slideIndex = 0;
        showSlides();
    
        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1;
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 2000);

        }
    </script>

       
<div class="konten_5">
    <div>
        <!-- video -->
            <div class="video-container" style="border: none;">
                <div class="video-item">
                    <p class="judul_konten_5">How to Study Smart - 3 UNIQUE Tips <br>(That You've Never Heard Of)</p>
                    <h4 style="text-align: center;">from : <a href="https://www.youtube.com/@ImprovementPill">ImprovementPill</a></h4>
                    <video controls>
                        <source src="how_to_study.mp4" type="video/webm" /> video tutorial
                    </video>
                </div>
                <div class="video-item">
                    <p class="judul_konten_5">Scientifically Proven Best Ways to Study</p>
                    <h2 style="font-size: 40px;"></h2>
                    <h4 style="text-align: center;">from : <a href="https://www.youtube.com/@TheInfographicsShow">The Infographics Show</a></h4>
                    <video controls>
                        <source src="study_video2.mp4" type="video/webm" /> video tutorial
                    </video>
                </div>
                <div style="border: none;" class="button-container">
                    <button style="display: block; margin: 0 auto" onclick="previousVideo()">Previous</button>
                    <button style="display: block; margin: 0 auto" onclick="nextVideo()">Next</button>
                </div>
               
            </div>
        </div>
</div>
    
    </div>
    
    <script>
        var currentVideoIndex = 0;
        var videos = document.querySelectorAll(".video-item");
    
        // hide video lainnnya, display 1 video saja
        for (var i = 1; i < videos.length; i++) {
            videos[i].style.display = "none";
        }
    
        function nextVideo() {
            if (currentVideoIndex < videos.length - 1) {
                videos[currentVideoIndex].style.display = "none"; // hide video
                currentVideoIndex++; // pindah ke next video
                videos[currentVideoIndex].style.display = "block"; // menampilkan video selanjutnya
            }
        }
    
        function previousVideo() {
            if (currentVideoIndex > 0) {
                videos[currentVideoIndex].style.display = "none"; // hide video
                currentVideoIndex--; // pindah ke next video
                videos[currentVideoIndex].style.display = "block"; // menampilkan video sebelumnya
            }
        }
    </script>
    <hr>
    <footer>
        <h3 style="margin-left: 20px;">Pintar Dirumah by : Satya Rama</h3>
    </footer>


    
</body>
</html>