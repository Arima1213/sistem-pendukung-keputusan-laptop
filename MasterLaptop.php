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
                                    <div class='tableTitle'>Master Laptop</div>
                                    <div class='align-self-end'>
                                        <button class='btn btn-primary'
                                            onclick=" location.href='formTambahLaptop.php'">Tambah
                                            Data</button>
                                    </div>
                                </div>
                                <div class='container-fluid px-5'>
                                    <?php
                                    $query = "SELECT ID_LAPTOP, MERK, NAMA_LAPTOP FROM master_laptop m JOIN merk_laptop me ON m.ID_MERK = me.ID_MERK";
                                    $res = mysqli_query($conn, $query);
                                    ?>

                                    <div class="overflow-x-auto">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        #</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Merek</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Nama Laptop</th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $num = 1;
                                                while ($data = mysqli_fetch_array($res)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm"><?= $num; ?></h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0"><?= $data['MERK']; ?>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs text-secondary mb-0">
                                                            <?= $data['NAMA_LAPTOP']; ?>
                                                        </p>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <a href="formEditLaptop.php?id_laptop=<?= $data["ID_LAPTOP"]; ?>"
                                                            class="text-secondary font-weight-bold text-xs">
                                                            <button type="button"
                                                                class="btn btn-success btn-sm">Edit</button>
                                                        </a>
                                                        <button class="btn btn-danger btn-sm"
                                                            onclick="hapusLaptop(<?= $data['ID_LAPTOP']; ?>)">Hapus</button>
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
        </div>
    </main>

    <?= include_once 'setting.php'; ?>

    <script>
    function hapusLaptop(id_laptop) {
        if (confirm('Apakah anda yakin menghapus laptop ini?')) {
            window.location = "hapusLaptop.php?id_laptop=" + id_laptop;
        }
    }
    </script>
    <?= include_once 'script.php'; ?>
</body>

</html>