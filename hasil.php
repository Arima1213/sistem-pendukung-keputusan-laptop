<?php
include_once 'connection.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'head.php'; ?>
</head>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-dark position-absolute w-100"></div>

    <?php include_once 'aside.php'; ?>
    <main class="main-content position-relative border-radius-lg">
        <?php
        if ($_SESSION['jenis'] == "usr") {
            header("Location: pilihKriteria.php");
        }
        include_once 'navbar.php';
        ?>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class='col d-flex flex-column coreTab h-100 py-5'>
                                <div class='container-fluid px-5 d-flex w-100 justify-content-between'>
                                    <div class='tableTitle'>Hasil Perhitungan</div>
                                </div>
                                <div class='container-fluid px-5'>
                                    <div class='container-fluid mb-4 px-5 d-flex w-100 justify-content-between'>
                                        <div class='tableTitle'>Hasil</div>
                                        <div class='align-self-end'>
                                            <?php
                                            $switch = isset($_GET['switch']);
                                            if ($switch == 1) { ?>
                                            <button class='btn btn-primary' onclick=" location.href='hasil.php'">Batasi
                                                5 terbesar</button>
                                            <?php } else if ($switch == 0) { ?>
                                            <button class='btn btn-primary'
                                                onclick=" location.href='hasil.php?switch=true'">Tampilkan semua
                                                saran</button>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                    <div class='container-fluid px-5'>
                                        <?php
                                        $query = "SELECT * FROM master_kriteria";
                                        $res = mysqli_query($conn, $query);
                                        ?>
                                        <div style='overflow-y: auto; max-height: 25em'>
                                            <table class="table table-striped tr_hasil">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Nama Laptop</th>
                                                        <th scope="col">Nilai SAW</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $num = 1;
                                                    if ($switch == 1) {
                                                        $jml = count($_SESSION['array']);
                                                    } else if ($switch == 0) {
                                                        $jml = 5;
                                                    }
                                                    for ($i = 0; $i < $jml; $i++) {
                                                    ?>
                                                    <tr onclick="window.location='detail.php?id=<?= $_SESSION['array'][$i][1] ?>'"
                                                        class="data">
                                                        <td scope="row"> <?= $num; ?> </td>
                                                        <td scope="row"> <?= $_SESSION['array'][$i][2] ?> </td>
                                                        <td scope="row"> <?= round($_SESSION['array'][$i][0], 3) ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        $num++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class='w-100 mt-4'>
                                            <button class="btn btn-primary w-100"
                                                onclick='location.href="pilihKriteria.php"'> Hitung Kembali </button>
                                        </div>
                                        <div class='d-flex flex-column w-100 justify-content-between'>
                                            <div class='pt-4 pb-2' style='font-size: 2em;'>Kesimpulan</div>
                                            <div>Dari hasil perangkingan dapat dilihat alternatif <span
                                                    onclick="window.location='detail.php?id=<?= $_SESSION['array'][0][1] ?>'"
                                                    style='cursor: pointer; font-weight: 600; color: #0d6efd;'><?= $_SESSION['array'][0][2] ?></span>
                                                mendapat nilai terbesar yaitu <span
                                                    onclick="window.location='detail.php?id=<?= $_SESSION['array'][0][1] ?>'"
                                                    style='cursor: pointer; font-weight: 600; color: #0d6efd;'><?= round($_SESSION['array'][0][0], 3) ?></span>
                                                sehingga menjadi rank 1 (Rekomendasi Laptop Terbaik)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?= include_once 'setting.php'; ?>

    <?= include_once 'script.php'; ?>
</body>

</html>