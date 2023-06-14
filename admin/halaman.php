<?php
include("inc_header.php");

$katakunci = isset($_GET['katakunci']) ? $_GET['katakunci'] : "";
$op = isset($_GET['op']) ? $_GET['op'] : "";

if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "DELETE FROM halaman WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    }
}
?>
<h1>Halaman Admin</h1>
<p>
    <a href="halaman_input.php" class="btn btn-primary">Buat Halaman Baru</a>
</p>
<?php
if (isset($sukses)) {
?>
    <div class="alert alert-primary" role="alert">
        <?php echo $sukses; ?>
    </div>
<?php
}
?>
<form class="row g-3" method="get">
    <div class="col-auto">
        <input type="text" class="form-control" placeholder="Masukkan Kata Kunci" name="katakunci" value="<?php echo $katakunci; ?>" />
    </div>
    <div class="col-auto">
        <input type="submit" name="cari" value="Cari Tulisan" class="btn btn-secondary" />
    </div>
</form>
<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-1">#</th>
            <th>Judul</th>
            <th>Kutipan</th>
            <th class="col-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql1 = "SELECT * FROM halaman ORDER BY id DESC";
        $q1 = mysqli_query($koneksi, $sql1);
        $nomor = 1;
        while ($r1 = mysqli_fetch_array($q1)) {
        ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $r1['judul']; ?></td>
                <td><?php echo $r1['kutipan']; ?></td>
                <td>
                    <span class="badge bg-warning text-dark">Edit</span>
                    <a href="halaman.php?op=delete&id=<?php echo $r1['id']; ?>" onclick="return confirm('Apakah yakin mau hapus data?')">
                        <span class="badge bg-danger">Delete</span>
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php include("inc_footer.php"); ?>