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
                                    <div class='tableTitle'>Form Edit Karyawan</div>
                                </div>
                                <div class='container-fluid px-5'>
                                    <form action="edit_karyawan.php" method='post'>

                                        <?php

                                        //Ambil ID dari url
                                        $id_user = $_GET['id_karyawan'];

                                        $query = "SELECT * FROM karyawan WHERE ID_USER=$id_user";
                                        $res = mysqli_query($conn, $query);
                                        $data = mysqli_fetch_array($res);
                                        $tipe_user = $data['TIPE_USER'];
                                        ?>

                                        <div class='container-fluid px-5 d-flex flex-column'>
                                            <div class='row w-100'>
                                                <div class='col-6'>
                                                    <div class='inputData'>
                                                        <h4>ID Karyawan</h4>
                                                        <input class="form-control" name="idKaryawan"
                                                            placeholder='ID Karyawan' value='<?= $id_user ?>' readonly>
                                                    </div>
                                                    <div class='inputData'>
                                                        <h4>Nama User</h4>
                                                        <input class="form-control" name="namaKaryawan"
                                                            placeholder='Nama User' value='<?= $data['NAMA_USER'] ?>'
                                                            required>
                                                    </div>
                                                    <input class='btn btn-success'
                                                        style='position: relative; top: 1.5em' type="submit"
                                                        value="Ubah Data">
                                                </div>
                                                <div class='col-6 px-5'>
                                                    <div class='inputData'>
                                                        <h4>Password User</h4>
                                                        <input type='password' class="form-control"
                                                            name="passwordKaryawan"
                                                            value='<?= $data['PASSWORD_USER'] ?>'
                                                            placeholder='Password Karyawan'>
                                                    </div>
                                                    <div class='inputData'>
                                                        <h4>Tipe</h4>
                                                        <select class="form-select" name="tipeUser" required>
                                                            <option value='adm' <?php if ($data['TIPE_USER'] == "adm") {
                                                                                    echo 'selected';
                                                                                } ?>>Admin</option>
                                                            <option value='usr' <?php if ($data['TIPE_USER'] == "usr") {
                                                                                    echo 'selected';
                                                                                } ?>>User</option>
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