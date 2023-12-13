<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mahasiswa.php">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        TAMBAH BIODATA MAHASISWA
                    </div>
                    <div class="card-body">
                        <form action="simpan.php" method="POST">

                            <div class="form-group">
                                <label>Id Mahasiswa</label>
                                <input type="text" name="id_mhs" placeholder="Masukan ID Mahasiswa" onkeyup="isi_otomatis()" class="form-control">
                            </div>

                            <div class="form-group mt-2">
                                <label>Nim</label>
                                <input type="text" name="nim" placeholder="Masukkan Nim Mahasiswa" class="form-control">
                            </div>

                            <div class="form-group mt-2">
                                <label>Nama</label>
                                <input type="text" name="nama" placeholder="Masukkan Nama Mahasiswa" rows="4" class="form-control">
                            </div>

                            <div class="form-group mt-2">
                                <label>Jenis Kelamin</label>
                                <div>
                                    <input type="radio" name="jenis_kelamin" value="L" class="form-check-input"> Laki laki
                                    <input type="radio" name="jenis_kelamin" value="P" class="form-check-input"> Perempuan
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Jurusan</label>
                                <div class="input-group" >
                                    <select name="jurusan" class="form-control">
                                        <option value="TEKNIK INFORMATIKA">TEKNIK INFORMATIKA</option>
                                        <option value="TEKNIK MESIN">TEKNIK MESIN</option>
                                        <option value="TEKNIK KIMIA">TEKNIK KIMIA</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label>Alamat</label>
                                <input class="form-control" name="alamat" placeholder="Masukkan Alamat Mahasiswa" rows="4">
                            </div>

                            <button type="submit" value="simpan" class="btn btn-primary mt-4">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container mt-3 mb-5">
        <h2>Biodata Siswa</h2>
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ID MAHASISWA</th>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>GENDER</th>
                    <th>JURUSAN</th>
                    <th>ALAMAT</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';
                $mahasiswa = mysqli_query($koneksi, "SELECT * from mahasiswa");
                $no = 1;
                foreach ($mahasiswa as $row) {
                    $jenis_kelamin = $row['jenis_kelamin'] == 'p' ? 'perempuan' : 'Laki laki';
                    echo "<tr>
            <td>$no</td>
            <td>" . $row['id_mhs'] . "</td>
            <td>" . $row['nim'] . "</td>
            <td>" . $row['nama'] . "</td>
            <td>" . $jenis_kelamin . "</td> 
            <td>" . $row['jurusan'] . "</td>
            <td>" . $row['alamat'] . "</td>
             <td >    <a href='form_edit.php?id_mhs=$row[id_mhs]'><i class=\"fa-regular fa-pen-to-square\"></i></a>
                    <a href='delete.php?id_mhs=$row[id_mhs]'><i class=\"fa-solid fa-trash\"></i></a>
            </td>
                </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        TAMBAH BIODATA WALI MAHASISWA
                    </div>
                    <div class="card-body">
                        <form action="simpan_wali.php" method="POST">

                            <div class="form-group">
                                <label>Id Wali Mahasiswa</label>
                                <input type="text" name="id_wali" placeholder="Masukan ID Wali Mahasiswa" onkeyup="isi_otomatis()" class="form-control">
                            </div>

                            <div class="form-group mt-2">
                                <label>Nama Wali</label>
                                <input type="text" name="nama_wali" placeholder="Masukkan Nama Wali Mahasiswa" rows="4" class="form-control">
                            </div>

                            <div class="form-group mt-2">
                                <label>Jenis Kelamin</label>
                                <div>
                                    <input type="radio" name="jenis_kelamin" value="L" class="form-check-input"> Laki laki
                                    <input type="radio" name="jenis_kelamin" value="P" class="form-check-input"> Perempuan
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label>Alamat</label>
                                <input class="form-control" name="alamat" placeholder="Masukkan Alamat Wali Mahasiswa" rows="4">
                            </div>

                            <button type="submit" value="simpan_wali" class="btn btn-primary mt-4">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h2>Biodata Wali Mahasiswa</h2>
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ID WALI</th>
                    <th>NAMA WALI</th>
                    <th>GENDER</th>
                    <th>ALAMAT</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';
                $wali_mhs = mysqli_query($koneksi, "SELECT * from wali_mhs");
                $no = 1;
                foreach ($wali_mhs as $row) {
                    $jenis_kelamin_wali = $row['jenis_kelamin_wali'] == 'p' ? 'perempuan' : 'Laki laki';
                    echo "<tr>
            <td>$no</td>
            <td>" . $row['id_wali'] . "</td>
            <td>" . $row['nama_wali'] . "</td>
            <td>" . $jenis_kelamin_wali . "</td>
            <td>" . $row['alamat_wali'] . "</td>
            <td>   <a href='form_edit_wali.php?id_wali={$row['id_wali']}'><i class=\"fa-regular fa-pen-to-square\"></i></a>
                    <a href='delete_wali.php?id_wali=$row[id_wali]'><i class=\"fa-solid fa-trash\"></i></a>
            </td>
                </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>