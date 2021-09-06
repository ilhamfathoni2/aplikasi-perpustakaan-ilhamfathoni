<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Soal (1)</title>
</head>

<body>
    <div class="container">

        <div class="card mt-5">
            <h5 class="card-header">Menghitung Lama Perjalanan</h5>
            <div class="card-body">
                <div class="alert alert-info" role="alert">
                    <p class="card-text"><b>(Soal No.1)</b> Menghitung dan mengetahui berapa lama Ismail menempuh perjalanan dalam format Jam, Menit dan Detik dari rumah menuju ke kantornya.</p>
                </div>

                <form action="" method="POST">
                    <div class="form-group">
                        <label for="jarak">Jarak Ke Tujuan (km)</label>
                        <input type="text" class="form-control" id="jarak" placeholder="Masukkan jarak tempuh" name="jarak">
                    </div>
                    <div class="form-group">
                        <label for="cepat">Kecepatan Awal (m/detik)</label>
                        <input type="text" class="form-control" id="cepat" placeholder="Masukkan kecepatan" name="cepat">
                    </div>
                    <div class="form-group">
                        <label for="cepat">Kecepatan Bertambah (m/detik)</label>
                        <input type="text" class="form-control" id="cepat" placeholder="Masukkan kecepatan" name="bertambah">
                    </div>
                    <div class="form-group">
                        <label for="cepat">Kecepatan Berkurang (m/detik)</label>
                        <input type="text" class="form-control" id="cepat" placeholder="Masukkan kecepatan" name="lambat">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Hitung</button>
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    $jarak = $_POST['jarak'];
                    $cepat = $_POST['cepat'];
                    $bertambah = $_POST['bertambah'];
                    $lambat = $_POST['lambat'];

                    $kecepatan = $cepat + $bertambah - $lambat;
                    $waktu = $jarak / $kecepatan;

                    echo

                    "
                    <h5 class='card-title mt-3'>Hasil :</h5>

                    <div class='alert alert-success' role='alert'>
                    <p class='card-text'>Jarak : <b>$jarak</b> km</p>
                    <p class='card-text'>Kecepatan : <b>$kecepatan</b> km/jam</p>
    
                    <h6 class='card-text'>Waktu Tempuh : $waktu jam</h6>
                    </div>
                    ";
                }

                ?>

            </div>
            <!-- end card -->
        </div>

        <!-- End Container -->
    </div>

</body>

</html>