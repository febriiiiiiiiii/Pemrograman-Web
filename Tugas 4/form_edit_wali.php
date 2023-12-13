<?php
include 'koneksi.php';
$id_wali = $_GET['id_wali'];
$wali_mhs = mysqli_query($koneksi, "select * from wali_mhs where id_wali='$id_wali'");
$row = mysqli_fetch_array($wali_mhs);

function active_radio_button($value, $input)
{
    $result = $value == $input ? 'checked' : '';
    return $result;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>informasi mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <form method="post" action="edit_wali.php">
        <input type="hidden" value="<?php echo $row['id_wali']; ?>" name="id_wali">
        <table>
            <tr>
                <td>Id wali</td>
                <td><input type="text" value="<?php echo $row['id_wali']; ?>" name="id_wali"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" value="<?php echo $row['nama_wali']; ?>" name="nama_wali"></td>
            </tr>
            <tr>
                <td>Jenis kelamin</td>
                <td>
                    <input type="radio" name="jenis_kelamin_wali" value="L" <?php echo active_radio_button("L", $row['jenis_kelamin_wali']) ?>>Laki laki
                    <input type="radio" name="jenis_kelamin_wali" value="P" <?php echo active_radio_button("P", $row['jenis_kelamin_wali']) ?>>Perempuan
                </td>
            </tr>
            <tr>
                <td>Alamat Wali</td>
                <td><input value="<?php echo $row['alamat_wali']; ?>" type="text" name="alamat_wali"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" value="simpan_wali">SIMPAN PERUBAHAN</button></td>
            </tr>
        </table>
    </form>

    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        EDIT BIODATA WALI MAHASISWA
                    </div>
                    <div class="card-body">
                        <form action="edit_wali.php" method="POST">
                        <input type="hidden" value="<?php echo $row['id_wali']; ?>" name="id_wali">
                            <div class="form-group">
                                <label>Id Wali Mahasiswa</label>
                                <input type="text" name="id_wali" value="<?php echo $row['id_wali']; ?>" onkeyup="isi_otomatis()" class="form-control">
                            </div>

                            <div class="form-group mt-2">
                                <label>Nama Wali</label>
                                <input type="text" name="nama_wali" value="<?php echo $row['nama_wali']; ?>" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label>Jenis Kelamin</label>
                                <div>
                                    <input type="radio" name="jenis_kelamin_wali" class="form-check-input" value="L" <?php echo active_radio_button("L", $row['jenis_kelamin']) ?>> Laki laki
                                    <input type="radio" name="jenis_kelamin_wali" class="form-check-input" value="P" <?php echo active_radio_button("P", $row['jenis_kelamin']) ?>> Perempuan
                                </div>
                            </div>


                            <div class="form-group mt-2">
                                <label>Alamat</label>
                                <input class="form-control" name="alamat_wali" value="<?php echo $row['alamat_wali']; ?>" rows="4">
                            </div>

                            <button type="submit" value="simpan" class="btn btn-primary mt-4">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>