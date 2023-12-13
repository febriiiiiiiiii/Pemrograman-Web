<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
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

    <div class="container mt-3">
  <h2>Biodata Mahasiswa</h2>         
  <table class="table table-striped mt-5">
    <thead>
      <tr>
            <th>NO</th>
            <th>ID MAHASISWA</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>GENDER</th>
            <th>JURUSAN</th>
            <th>ALAMAT WALI</th>
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
                </tr>";
            $no++;
        }
        ?>
    </tbody>
  </table>


    <div class="container mt-5">
  <h2>Biodata Wali Mahasiswa</h2>           
  <table class="table table-striped mt-5">
    <thead>
      <tr>
            <th>NO</th>
            <th>ID WALI</th>
            <th>NAMA WALI</th>
            <th>GENDER</th>
            <th>AALAMAT WALI</th>
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
                </tr>";
            $no++;
        }
        ?>
    </tbody>
  </table>
</div>
    
</body>
</html>