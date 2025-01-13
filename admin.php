<?php
// panggil koneksi database
include "koneksi.php";

// pengujian jika tombol simpan diklik
if (isset($_POST['bsimpan'])) {

    // uji jika sebelumnya klik tombol edit
    if (@$_GET['hal'] == 'edit') {
        // Persiapan edit data
        $edit = mysqli_query($koneksi, "UPDATE tbarang SET 
                                            nama = '$_POST[tnama]',
                                            asal = '$_POST[tasal]',
                                            jumlah = '$_POST[tjumlah]',
                                            satuan = '$_POST[tsatuan]',
                                            tanggal_diterima = '$_POST[ttanggal_diterima]'
                                          WHERE id_barang = '$_GET[id]'
                                        ") or die(mysqli_error($koneksi));

        // uji jika edit sukses
        if ($edit) {
            echo "<script>
                        alert('Ubah Data Sukses!');
                        document.location='admin.php';
                    </script>";
        }
    } else {
        // persiapan simpan data baru
        $simpan = mysqli_query($koneksi, "INSERT INTO tbarang
                                    (kode, nama, asal, jumlah, satuan, tanggal_diterima)
                                VALUES ('$_POST[tkode]',
                                        '$_POST[tnama]',
                                        '$_POST[tasal]',
                                        '$_POST[tjumlah]',
                                        '$_POST[tsatuan]',
                                        '$_POST[ttanggal_diterima]')
                                ") or die(mysqli_error($koneksi));
        // uji jika simpan sukses
        if ($simpan) {
            echo "<script>
                    alert('Simpan Data Sukses!');
                    document.location='admin.php';
                </script>";
        }
    }
}

// uji jika tombol edit/hapus diklik
if (isset($_GET['hal'])) {

    // uji jika tombol edit yg diklik
    if ($_GET['hal'] == 'edit') {
        // tampilkan data yang akan diedit
        $tampil = mysqli_query($koneksi, "SELECT * FROM tbarang WHERE id_barang='$_GET[id]'");
        $data = mysqli_fetch_array($tampil);
        // uji jika data ditemukan
        if ($data) {
            // variabel vkode dll menampung data yg ditemukan dari tabel tbarang
            $vkode = $data['kode'];
            $vnama = $data['nama'];
            $vasal = $data['asal'];
            $vjumlah = $data['jumlah'];
            $vsatuan = $data['satuan'];
            $vtanggal_diterima = $data['tanggal_diterima'];
        }
    } else  if ($_GET['hal'] == 'hapus') {
        // persiapan hapus data
        $hapus = mysqli_query($koneksi, "DELETE FROM tbarang WHERE id_barang = '$_GET[id]' ") or die(mysqli_error($koneksi));

        // uji jika hapus sukses
        if ($hapus) {
            echo "<script>
                alert('Hapus Data Sukses!');
                document.location='admin.php';
              </script>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - PHP & MySQL</title>
    <!-- panggil file CSS Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>

<body>

    <!-- awal container -->
    <div class="container">

        <div class="text-center">
            <h3>Data Inventaris</h3>
            <h3>Kantor Kampus Biru</h3>
        </div>

        <!-- awal row -->
        <div class="row">
            <!-- awal col -->
            <div class="col-md-8 mx-auto">
                <!-- awal card -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Form Input Data Barang
                    </div>
                    <!-- awal card-body -->
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="mb-3">
                                <label class="form-label">Kode Barang</label>
                                <input type="text" class="form-control" name="tkode"
                                    value="<?= @$vkode ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" name="tnama"
                                    value="<?= @$vnama ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Asal Barang</label>
                                <select class="form-select" name="tasal">
                                    <option value="<?= @$vasal ?>">
                                        <?= @$vasal ?>
                                    </option>

                                    <option value="Pembelian">Pembelian</option>
                                    <option value="Sumbangan">Sumbangan</option>
                                    <option value="Hibah">Hibah</option>
                                </select>
                            </div>

                            <!-- awal row 2 -->
                            <div class="row">

                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah</label>
                                        <input type="number" class="form-control" name="tjumlah" value="<?= @$vjumlah ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Satuan</label>
                                        <select class="form-select" name="tsatuan">
                                            <option value="<?= @$vsatuan ?>">
                                                <?= @$vsatuan ?>
                                            </option>
                                            <option value="Pcs">Pcs</option>
                                            <option value="Unit">Unit</option>
                                            <option value="Kotak">Kotak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Diterima</label>
                                        <input type="date" class="form-control" name="ttanggal_diterima" value="<?= @$vtanggal_diterima ?>">
                                    </div>
                                </div>

                            </div>
                            <!-- akhir row 2 -->

                            <div class="text-center">
                                <hr>
                                <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
                                <button type="reset" class="btn btn-danger">Kosongkan</button>
                            </div>

                        </form>
                    </div>
                    <!-- akhir card-body -->
                </div>
                <!-- akhir card -->
            </div>
            <!-- akhir col -->
        </div>
        <!-- akhir row -->

        <!-- awal row 3 -->
        <div class="row mt-3">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Data Barang
                    </div>
                    <div class="card-body">
                        <!-- awal form pencarian -->
                        <div class="col-md-6 mx-auto">
                            <form method="post">
                                <div class="input-group mb-3">
                                    <input type="text" name="tcari" value="<?= @$_POST['tcari'] ?>" class="form-control" placeholder="Masukkan kata kunci pencarian!">
                                    <button type="submit" name="bcari" class="btn btn-primary"> Cari </button>
                                    <a href="admin.php" class="btn btn-danger">Bersihkan pencarian</a>
                                </div>
                            </form>
                        </div>
                        <!-- akhir form pencarian -->

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>No.</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Asal Barang</th>
                                <th>Jumlah</th>
                                <th>Tanggal Diterima</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            // persiapan tampilkan data dari database
                            $no = 1;
                            // $tampil menampung isi dari query tampilkan data
                            $tampil = mysqli_query($koneksi, "SELECT * FROM tbarang order by id_barang desc");
                            // keluarkan isi data menggunakan perulangan while
                            while ($data = mysqli_fetch_array($tampil)) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['kode'] ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['asal'] ?></td>
                                    <td><?= $data['jumlah'] . ' ' . $data['satuan'] ?></td>
                                    <td><?= $data['tanggal_diterima'] ?></td>
                                    <td>
                                        <a href="admin.php?hal=edit&id=<?= $data['id_barang'] ?>" class="btn btn-warning">Edit</a>

                                        <a href="admin.php?hal=hapus&id=<?= $data['id_barang'] ?>"
                                            onclick="return confirm('Apakah anda yakin akan menghapus data?')" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php } //akhir dari perulangan while
                            ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- akhir row 3 -->




    </div>
    <!-- akhir container -->



    <!-- panggil file JS Bootstrap -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>