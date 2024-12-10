<?php
include_once 'connection.php';
$id_kriteria = $_GET['idKriteria'];
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
                                    <div class='tableTitle'>Form Edit Kriteria</div>
                                </div>
                                <div class='container-fluid px-5'>
                                    <form action="edit_kriteria.php" method='post'>

                                        <?php
                                        $query = "SELECT * FROM master_kriteria WHERE ID_KRITERIA = " . $id_kriteria;
                                        $res = mysqli_query($conn, $query);
                                        while ($data = mysqli_fetch_array($res)) {
                                            $kategori = $data['TIPE_KRITERIA'];
                                            $nama = $data['NAMA_KRITERIA'];
                                        }
                                        ?>

                                        <div class='container-fluid px-5 d-flex flex-column'>
                                            <div class='row w-100'>
                                                <div class='col-6'>
                                                    <div class='inputData'>
                                                        <h4>ID Kriteria</h4>
                                                        <input class="form-control" name="idKriteria"
                                                            placeholder='ID Kriteria' value='<?= $id_kriteria ?>'
                                                            readonly>
                                                    </div>
                                                    <div class='inputData'>
                                                        <h4>Nama Kriteria</h4>
                                                        <input class="form-control" name="namaKriteria"
                                                            value="<?= $nama; ?>" placeholder='Nama Kriteria' readonly
                                                            required>
                                                    </div>
                                                    <input class='btn btn-success'
                                                        style='position: relative; top: 1.5em' type="submit"
                                                        value="Ubah Data">
                                                </div>
                                                <div class='col-6 px-5'>
                                                    <div class='inputData'>
                                                        <h4>Kategori Kriteria</h4>
                                                        <select class="form-select" name="katKriteria" required>
                                                            <option value="">-- Pilih --</option>
                                                            <option value="cos" <?php if ($kategori == "cos") {
                                                                                    echo 'selected';
                                                                                } ?>> Cost (Terkecil paling baik)
                                                            </option>
                                                            <option value="ben" <?php if ($kategori == "ben") {
                                                                                    echo 'selected';
                                                                                } ?>> Benefit (Terbesar paling baik)
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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