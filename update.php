<?php
    include 'koneksi.php';
    
    $nim = $_GET['nim'];
    $sqlGet = "SELECT * FROM mahasiswa WHERE nim='$nim'";
    $queryGet = mysqli_query($conn, $sqlGet);
    $data = mysqli_fetch_array($queryGet);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Halaman Crud</title>
</head>
<body>
    <div class="w-50 mx-auto mt-5"> 
        <p class="h2">Update Data</p>

         <form action="update.php" method="post" class="mt-3">
          <label for="nim">NIM</label>
          <input type="text" id="nim" value="<?php echo "$data[nim]"; ?>" name="nim" class="form-control" readonly 
          placeholder="">

          <label for="nama" class="mt-3">Nama</label>
          <input type="text" id="nama" value="<?php echo "$data[nama]"; ?>" name="nama" class="form-control" required>

          <label for="prodi" class="mt-3">Program Studi</label>
          <select name="prodi" id="prodi" class="form-control" required>
            <option><?php echo "$data[prodi]";?></option>
            <option value="teknik_informatika">Teknik Informatika</option>
            <option value="sistem_informasi">Sistem Informasi</option>
            <option value="sistem_komputer">Sistem Komputer</option>
          </select>

          <label for="konsentrasi" class="mt-3">Konsentrasi</label>
          <select name="konsentrasi" id="konsentrasi" class="form-control" required>
            <option><?php echo "$data[konsentrasi]";?></option>
            <optgroup label="Konsentrasi Teknik Informatika">
                <option value="konsentrasi_mavib">Multimedia Audio Visual and Broadcasting (MAVIB)</option>
                <option value="konsentrasi_se">Software Engineering (SE)</option>
            </optgroup>
            <optgroup label="Konsentrasi Sistem Informasi">
                <option value="konsentrasi_bi">Business Intellegence (BI)</option>
                <option value="konsentrasi_ca">Computer Accountancy (CA)</option>
                <option value="konsentrasi_mis">Management Information System (MIS)</option>
            </optgroup>
            <optgroup label="Konsentrasi Sistem Komputer">
                <option value="konsentrasi_ccit">Creative Communication and Innovative Technology (CCIT)</option>
                <option value="konsentrasi_cs">Computer System (CS)</option>
            </optgroup>
          </select>

          <label for="telepon" class="mt-3">Telepon</label>
          <input type="text" id="telp" value="<?php echo "$data[telp]"; ?>" name="telp" class="form-control" required>

          <input class="btn btn-primary mt-3 float-right" type="submit" name="tambah" value="Update Data">
          <a href="index.php" class="btn btn-outline-danger float-left mt-3">Kembali</a>
    </form>
</div>

<?php
    if (isset($_POST['tambah']))
    {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $konsentrasi = $_POST['konsentrasi'];
    $telp = $_POST['telp'];

    $prodiSelect = $_POST['prodi'];
    if ($prodiSelect == 'teknik_informatika') {
        $prodi = 'Teknik Informatika';}

    if ($prodiSelect == 'sistem_informasi') {
        $prodi = 'Sistem Informasi';}

    if ($prodiSelect == 'sistem_komputer') {
        $prodi = 'Sistem Komputer';}

    if ($prodiSelect == 'akuntansi') {
        $prodi = 'Akuntansi';}

    if ($prodiSelect == 'manajemen') {
        $prodi = 'Manajemen';}

    //konsentrasi

    $konsentrasiSelect = $_POST['konsentrasi'];
    if ($konsentrasiSelect == 'konsentrasi_mavib') {
        $konsentrasi = 'Multimedia Audio Visual and Broadcasting (MAVIB)';}

    if ($konsentrasiSelect == 'konsentrasi_se') {
        $konsentrasi = 'Software Engineering (SE)';}

    if ($konsentrasiSelect == 'konsentrasi_ccit') {
        $konsentrasi = 'Creative Communication and Innovative Technology (CCIT)';}

    if ($konsentrasiSelect == 'konsentrasi_cs') {
        $konsentrasi = 'Computer System (CS)';}

    if ($konsentrasiSelect == 'konsentrasi_bi') {
        $konsentrasi = 'Business Intellegence (BI)';}

    if ($konsentrasiSelect == 'konsentrasi_ca') {
        $konsentrasi = 'Computer Accountancy (CA)';}

    if ($konsentrasiSelect == 'konsentrasi_mis') {
        $konsentrasi = 'Management Information System (MIS)';}

    $sqlUpdate = "UPDATE mahasiswa 
                    SET nama='$nama', prodi='$prodi', konsentrasi='$konsentrasi', telp='$telp' 
                    WHERE nim='$nim'";
    $queryUpdate = mysqli_query($conn, $sqlUpdate);
    
    header("location:index.php");
    }
    ?>

</body>
</html>