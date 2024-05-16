<?php
include "koneksi.php";

if (!$conn) {
    die("Tidak terkoneksi: " . mysqli_connect_error());
}
$telepon    = "";
$nama       = "";
$program    = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])){
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id     = $_GET['id'];
    $sql1   = "delete from pendaftaran where id = '$id'";
    $q1     = mysqli_query($conn,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error = "gagal melakukan delete data";
    }
}

if($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from pendaftaran where id = '$id'";
    $q1         = mysqli_query($conn, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $telepon    = $r1['telepon'];
    $nama       = $r1['nama'];
    $program    = $r1['program'];

    if ($telepon == '') {
        $error = "Data tidak ditemukan";
    }
}



if (isset($_POST['simpan'])) { //untuk create
    $telepon        = $_POST['telepon'];
    $nama           = $_POST['nama'];
    $program        = $_POST['program'];

    if ($telepon && $nama && $program) {
        if($op == 'edit'){ //untuk update
            $sql1   = "update pendaftaran set telepon = '$telepon',nama='$nama',program='$program' where id = '$id'";
            $q1     = mysqli_query($conn,$sql1);
            if ($q1) {
                $sukses = "Data Berhasil di Update";
            } else {
                $error = "Data gagal di Update";
            }
        } else { //untuk insert
            $sql1   = "insert into pendaftaran(telepon,nama,program) values ('$telepon','$nama','$program')";
            $q1     = mysqli_query($conn, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukan data baru";
            } else {
                $error      = "Gagal memasukan data";
            }
        }
    } else {
        $error = "Silahkan masukan semua data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px;
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- memasukan data-->
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=admin_edit.php");
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=admin_edit.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo $telepon ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="program" class="col-sm-2 col-form-label">Program</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="program" id="program">
                                <option value="">- Pilih Program -</option>
                                <option value="english" <?php if ($program == "english") echo "selected" ?>>english</option>
                                <option value="science" <?php if ($program == "science") echo "selected" ?>>science</option>
                                <option value="mathematics" <?php if ($program == "mathematics") echo "selected" ?>>mathematics</option>
                                <option value="computer-science" <?php if ($program == "computer-science") echo "selected" ?>>computer science</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <!-- mengeluarkan data-->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Telepon</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Progran</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                        $sql2   = "select * from pendaftaran order by id desc";
                        $q2     = mysqli_query($conn, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['id'];
                            $telepon    = $r2['telepon'];
                            $nama       = $r2['nama'];
                            $program    = $r2['program'];

                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $telepon ?></td>
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $program ?></td>
                                <td scope="row">
                                    <a href="admin_edit.php?op=edit&id=<?php echo $id?>"><button type="button" class="btn btn-danger">Edit</button></a>
                                    <a href="admin_edit.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin untuk delete?')"><button type="button" class="btn btn-warning">Delete</button></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>

</html>