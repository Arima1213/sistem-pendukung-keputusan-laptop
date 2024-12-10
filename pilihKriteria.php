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
                                    <div class='tableTitle'>Pilih Prioritas Kriteria</div>
                                </div>
                                <div class='container-fluid px-5'>
                                    <form action="cek_konsistensi.php" method="post">
                                        <?php
                                        $query = "SELECT * FROM master_kriteria";
                                        $res = mysqli_query($conn, $query);
                                        ?>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nama Kriteria</th>
                                                    <th scope="col">Nilai Prioritas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $num = 1;
                                                while ($data = mysqli_fetch_array($res)) {
                                                ?>
                                                <tr>
                                                    <input type="hidden" <?= 'name=id_kriteria' . $num ?>
                                                        value="<?= $data['ID_KRITERIA'] ?>">
                                                    <th scope="row"> <?= $num; ?> </th>
                                                    <td> <?= $data['NAMA_KRITERIA'] ?> </td>
                                                    <td>
                                                        <select <?= 'name=prioritas' . $num ?> class='form-control w-50'
                                                            style='font-weight: 600'>
                                                            <option value="1" style='font-weight: 600'>1 (Sangat Rendah)
                                                            </option>
                                                            <option value="2">2</option>
                                                            <option value="3" style='font-weight: 600'>3 (Rendah)
                                                            </option>
                                                            <option value="4">4</option>
                                                            <option value="5" style='font-weight: 600'>5 (Normal)
                                                            </option>
                                                            <option value="6">6</option>
                                                            <option value="7" style='font-weight: 600'>7 (Penting)
                                                            </option>
                                                            <option value="8">8</option>
                                                            <option value="9" style='font-weight: 600'>9 (Sangat
                                                                Penting)</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <?php
                                                    $num++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <div class='w-100'>
                                            <input type='submit' class="btn btn-primary w-100"
                                                value="Tampilkan Saran Laptop">
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