<?php
include 'koneksi.php';

// menyimpan data id kedalam variabel
$nim = $_GET['nim'];
$sqlDelete = "DELETE FROM mahasiswa WHERE nim='$nim'";
if (mysqli_query($conn, $sqlDelete))

{
echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

// mengalihkan ke halaman index.php
header("location:index.php");
?>
