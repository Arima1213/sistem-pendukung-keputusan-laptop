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
                                    <div class='tableTitle'>Master Kriteria</div>
                                </div>
                                <div class='container-fluid px-5'>
                                    <?php
                                    $query = "SELECT * FROM master_kriteria";
                                    $res = mysqli_query($conn, $query);
                                    ?>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Kriteria</th>
                                                <th scope="col">Tipe Kriteria</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $num = 1;
                                            while ($data = mysqli_fetch_array($res)) {
                                            ?>
                                            <tr>
                                                <th scope="row"> <?= $num; ?> </th>
                                                <td> <?= $data['NAMA_KRITERIA'] ?> </td>
                                                <td> <?= $data['TIPE_KRITERIA'] ?> </td>
                                                <td>
                                                    <a
                                                        href="formEditKriteria.php?idKriteria=<?= $data["ID_KRITERIA"] ?>">
                                                        <button type="button"
                                                            class="btn btn-success w-100">Edit</button></a>
                                                    <!-- <a href="hapusKriteria.php?idKriteria=<?= $data["ID_KRITERIA"] ?>">
                                        <button class='btn btn-danger'>Hapus</button>
                                    </a> -->
                                                </td>
                                            </tr>
                                            <?php
                                                $num++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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