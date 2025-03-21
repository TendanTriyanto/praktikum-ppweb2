<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Form Nilai Siswa</title>

    <style>
        @media (min-width: 426px) {
            form {
                width: 65%;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Sistem Penilaian</a>
            </div>
        </nav>
    </header>

    <main role="main" class="container mt-3">
        <h3>Form Penilaian Siswa</h3>
        <hr />
        <form class="mx-auto" action="form_nilai.php" method="POST">
            <div class="form-group row">
                <label for="nama" class="col-5 col-form-label font-weight-bold text-right">Nama Lengkap</label>
                <div class="col-7">
                    <input id="nama" name="nama" placeholder="Nama Lengkap" type="text" required="required" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="matkul" class="col-5 col-form-label font-weight-bold text-right">Mata Kuliah</label>
                <div class="col-7">
                    <select id="matkul" class="custom-select" required="required" name="matkul">
                        <option>Dasar Dasar Pemrograman</option>
                        <option>Basis Data I</option>
                        <option>Pemrograman Web 1</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="nilai_uts" class="col-5 col-form-label font-weight-bold text-right">Nilai UTS</label>
                <div class="col-7">
                    <input id="nilai_uts" name="nilai_uts" placeholder="Nilai UTS" type="number" class="form-control" required="required" min="0" max="100">
                </div>
            </div>
            <div class="form-group row">
                <label for="n_uas" class="col-5 col-form-label font-weight-bold text-right">Nilai UAS</label>
                <div class="col-7">
                    <input id="n_uas" name="n_uas" placeholder="Nilai UAS" type="number" class="form-control" required="required" min="0" max="100">
                </div>
            </div>
            <div class="form-group row">
                <label for="n_tugas" class="col-5 col-form-label font-weight-bold text-right">Nilai Tugas/Praktikum</label>
                <div class="col-7">
                    <input id="n_tugas" name="n_tugas" placeholder="Nilai Tugas" type="number" class="form-control" required="required" min="0" max="100">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-5 col-7">
                    <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
                </div>
            </div>
        </form>
       
    </main>

    <?php
        $ns = isset($_POST['nama']) ? $_POST['nama'] : "";
        $mk = isset($_POST['matkul']) ? $_POST['matkul'] : "";
        $nilai_uts = isset($_POST['nilai_uts']) ? $_POST['nilai_uts'] : "";
        $n_uas = isset($_POST['n_uas']) ? $_POST['n_uas'] : "";
        $n_tugas = isset($_POST['n_tugas']) ? $_POST['n_tugas']  : "";
        $total = round(((float)$nilai_uts * 0.3) + ((float)$n_uas * 0.35) + ((float)$n_tugas * 0.35), 2);


        if ($total >= 85 && $total == 100) {
            $grade = 'A';
            $predikat = 'Sangat Memuaskan';
        } elseif ($total >= 70) {
            $grade = 'B';
            $predikat = 'Memuaskan';
        } elseif ($total >= 56) {
            $grade = 'C';
            $predikat = 'Cukup';
        } elseif ($total >= 36) {
            $grade = 'D';
            $predikat = 'Kurang';
        } elseif ($total >= 0) {
            $grade = 'E';
            $predikat = 'Sangat Kurang';
        } else {
            $grade = 'I';
            $predikat = 'Tidak Ada';
        }

        if ($total > 55) {
            $status = "Lulus";
        } else {
            $status = "Tidak Lulus";
        }

        if (isset($_POST['proses'])) {
            echo "<br/>Nama : " . $ns;
            echo "<br/>Mata Kuliah : " . $mk;
            echo "<br/>Nilai UTS : " . $nilai_uts;
            echo "<br/>Nilai UAS : " . $n_uas;
            echo "<br/>Nilai Tugas Praktikum : " . $n_tugas;
            echo "<br/>Nilai Total : " . $total;
            echo "<br/>Grade : " . $grade;
            echo "<br/>Predikat : " . $predikat;
            echo "<br/>Status : "  . $status;
        }
        ?>



    <footer class="mt-5">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" >>@atendannn_</span> </a>
            </div>
        </nav>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>   