<?php
include 'koneksi.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Halaman Data Mahasiswa</title>
</head>
<body>
    <div class="container">
    <a href="add.php" class="btn btn-primary btn-md mt-3">Tambah</a>
    <table class="table table-bordered mt-3">
        <thead class="table-light">
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Program Studi</th>
            <th>Konsentrasi</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </thead>

        <?php
        $sqlGet = "SELECT * FROM mahasiswa";
        $query = mysqli_query($conn, $sqlGet);

        while($data = mysqli_fetch_array($query)) 
    {
        echo " 
        <tbody>
            <tr>
            <td scope='row'>$data[nim]</td>
            <td scope='row'>$data[nama]</td>
            <td scope='col'>$data[prodi]</td>
            <td scope='col'>$data[konsentrasi]</td>
            <td scope='col'>$data[telp]</td> 
            <td>
            <a href='update.php?nim=$data[nim]' class='btn btn-warning mr-3'>Update</a>
            <a href='delete.php?nim=$data[nim]' class='btn btn-danger'>Delete</a>
            </td>
            </tr>
        </tbody>
        "; 
    }
        ?>
        
    </table>
    </div>
</body>
</html>