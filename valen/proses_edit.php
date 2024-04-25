<?php
include 'koneksi.php';

$FotoID=$_POST['FotoID'];
$JudulFoto=$_POST['JudulFoto'];
$DeskripsiFoto=$_POST['DeskripsiFoto'];
$TanggalUnggah=$_POST['TanggalUnggah'];

$query = mysqli_query($koneksi, "UPDATE foto SET FotoID='$FotoID', JudulFoto='$JudulFoto', DeskripsiFoto='$DeskripsiFoto', TanggalUnggah='$TanggalUnggah' WHERE FotoID='$FotoID'");

?>
<script language="JavaScript">
    alert('EDIT DATA SISWA BERHASIL');
    document.location='tampil_data_siswa.php';
</script>