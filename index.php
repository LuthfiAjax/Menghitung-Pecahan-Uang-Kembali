<?php 

error_reporting(0);
function rupiah($angka){
	$hasil_rupiah = "Rp. " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Kembalian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <form method="POST" action="">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Pilih Barang</label>
                <select class="form-select" aria-label="Default select example" name="harga">
                    <option selected disabled>Pilih Barang</option>
                    <option value="200000">Minyak <?= rupiah('200000'); ?></option>
                    <option value="600000">Gula <?= rupiah('600000'); ?></option>
                    <option value="110000">Beras <?= rupiah('110000'); ?></option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Jumlah Uang</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="bayar">
            </div>
            <input type="submit" class="btn btn-primary" name="proses" value="Proses"></input>
        </form>


        <?php 
        if(isset($_POST['proses'])){

        $bayar = $_POST['bayar'];
        $harga = $_POST['harga'];

       

        if($bayar > $harga){
            echo '<div class="position-absolute top-50 start-50 translate-middle"><b class="text-center">TIDAK VALID</b></div>';
        }elseif($bayar % 1000 != 0){
            echo '<div class="position-absolute top-50 start-50 translate-middle"><b class="text-center">TIDAK VALID</b></div>';
        }elseif($harga % 10000 != 0){
            echo '<div class="position-absolute top-50 start-50 translate-middle"><b class="text-center">TIDAK VALID</b></div>';
        }else{
            $kembali = $harga - $bayar;
            $dataa = $kembali % 100000;
            $a = ($kembali - $dataa) / 100000;
    
            $datab = $dataa % 50000;
            $b = ($dataa - $datab) / 50000;
    
            $datac = $datab % 20000;
            $c = ($datab - $datac) / 20000;
    
            $datad = $datac % 10000;
            $d = ($datac - $datad) / 10000;
    
            $datae = $datad % 5000;
            $e = ($datad- $datae) / 5000;
    
            $dataf = $datae % 1000;
            $f = ($datae - $dataf) / 1000;
            ?>

        <div class="card text-center mt-5">
            <div class="card-header">
                Hasil
            </div>
            <div class="card-body">

                <h5 class="card-title">Total Kembalian : <?= rupiah($kembali); ?></h5>
                <p class="card-text">Rincian : </p>
                <ul>
                    <li> <?= rupiah('100000'); ?> = <?= $a; ?> Lembar</li>
                    <li> <?= rupiah('50000'); ?> = <?= $b; ?> Lembar</li>
                    <li> <?= rupiah('20000'); ?> = <?= $c; ?> Lembar</li>
                    <li> <?= rupiah('10000'); ?> = <?= $d; ?> Lembar</li>
                    <li> <?= rupiah('5000'); ?> = <?= $e; ?> Lembar</li>
                    <li> <?= rupiah('1000'); ?> = <?= $f; ?> Lembar</li>
                </ul>

            </div>
            <div class="card-footer text-muted">
            </div>
        </div>

        <?php
            }
        }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>