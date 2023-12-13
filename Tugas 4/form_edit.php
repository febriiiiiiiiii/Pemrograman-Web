<?php
include 'koneksi.php';
$id_mhs = $_GET['id_mhs'];
$mahasiswa = mysqli_query($koneksi, "select * from mahasiswa where id_mhs='$id_mhs'");
$row = mysqli_fetch_array($mahasiswa);

$jurusan = array('TEKNIK INFORMATIKA', 'TEKNIK MESIN', 'TEKNIK KIMIA');
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

    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        EDIT BIODATA MAHASISWA
                    </div>
                    <div class="card-body">
                        <form action="edit.php" method="POST">
                            <input type="hidden" value="<?php echo $row['id_mhs']; ?>" name="id_mhs">
                            <div class="form-group">
                                <label>Id Mahasiswa</label>
                                <input type="text" name="id_mhs" value="<?php echo $row['id_mhs']; ?>"  onkeyup="isi_otomatis()" class="form-control">
                            </div>

                            <div class="form-group mt-2">
                                <label>Nim</label>
                                <input type="text" name="nim" value="<?php echo $row['nim']; ?>" name="nim" class="form-control">
                            </div>

                            <div class="form-group mt-2">
                                <label>Nama</label>
                                <input type="text" name="nama" value="<?php echo $row['nama']; ?>" rows="4" class="form-control">
                            </div>

                            <div class="form-group mt-2">
                                <label>Jenis Kelamin</label>
                                <div>
                                    <input type="radio" name="jenis_kelamin" class="form-check-input" value="L" <?php echo active_radio_button("L", $row['jenis_kelamin']) ?>> Laki laki
                                    <input type="radio" name="jenis_kelamin" class="form-check-input" value="P" <?php echo active_radio_button("P", $row['jenis_kelamin']) ?>> Perempuan
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Jurusan</label>
                                <div class="input-group">
                                    <select name="jurusan" class="form-control">
                                        <?php
                                        foreach ($jurusan as $j) {
                                            echo "<option value='$j'";
                                            echo $row['jurusan'] == $j ? ' selected="selected"' : '';
                                            echo ">$j</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label>Alamat</label>
                                <input class="form-control" name="alamat" value="<?php echo $row['alamat']; ?>"rows="4">
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