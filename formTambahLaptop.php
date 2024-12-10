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
                                    <div class='tableTitle'>Form Tambah Laptop</div>
                                </div>
                                <div class='container-fluid px-5'>


                                    <form action="tambah_laptop.php" method='post'>

                                        <?php
                                        $query = "SELECT max(ID_LAPTOP) FROM master_laptop";
                                        $res = mysqli_query($conn, $query);
                                        $id_laptop;
                                        while ($data = mysqli_fetch_array($res)) {
                                            $id_laptop = $data['0'];
                                        }
                                        $id_laptop++;
                                        ?>

                                        <div class='container-fluid px-5 d-flex flex-column'
                                            style='overflow-y: scroll; height: 75vh; margin: 2em 0 0 0'>
                                            <div class='row w-100 '>
                                                <div class='col-6'>
                                                    <div class='inputData'>
                                                        <h4>ID Laptop</h4>
                                                        <input class="form-control" name="idLaptop"
                                                            placeholder='ID Laptop' value='<?= $id_laptop ?>' readonly>
                                                    </div>
                                                    <div class='inputData'>
                                                        <h4>Nama Laptop</h4>
                                                        <input class="form-control" name="namaLaptop"
                                                            placeholder='Nama Laptop' required>
                                                    </div>
                                                </div>
                                                <?php
                                                $query = "SELECT * FROM merk_laptop";
                                                $res = mysqli_query($conn, $query);
                                                ?>
                                                <div class='col-6'>
                                                    <div class='inputData'>
                                                        <h4>Merek</h4>
                                                        <select class="form-select" name="merkLaptop" required>
                                                            <option value="">-- Choose --</option>
                                                            <?php
                                                            while ($data = mysqli_fetch_array($res)) {
                                                            ?>
                                                            <option value="<?= $data['ID_MERK'] ?>"><?= $data['MERK'] ?>
                                                            </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <!-- HARGA -->
                                            <div class="inputData row">
                                                <div class='col-6'>
                                                    <h4>Harga</h4>
                                                    <select class="form-select" name="harga" required>
                                                        <option value="1"> Rp0 - Rp10.000.000 </option>
                                                        <option value="2"> Rp10.000.000 - Rp30.000.000 </option>
                                                        <option value="3"> Rp31.000.000 - Rp40.000.000 </option>
                                                        <option value="4"> Rp41.000.000 - Rp50.000.000 </option>
                                                        <option value="5"> Rp51.000.000 - Rp60.000.000 </option>
                                                        <option value="6"> Rp60.000.000 Keatas </option>
                                                    </select>
                                                </div>
                                                <div class='col-6 d-flex'>
                                                    <input class="form-control align-self-end " name="harga_desc"
                                                        placeholder='ex. Rp3.xxx.xxx' required>
                                                </div>
                                            </div>
                                            <!-- LAYAR -->
                                            <div class="inputData row">
                                                <div class='col-6'>
                                                    <h4>Layar</h4>
                                                    <select class="form-select" name="layar" required>
                                                        <option value="1"> 10 - 12 inch </option>
                                                        <option value="2"> ~ 13 inch </option>
                                                        <option value="3"> ~ 14 inch </option>
                                                        <option value="4"> ~ 15 inch </option>
                                                        <option value="5"> ~ 16 inch </option>
                                                        <option value="6"> ~ 17 inch </option>
                                                    </select>
                                                </div>
                                                <div class='col-6 d-flex'>
                                                    <input class="form-control align-self-end " name="layar_desc"
                                                        placeholder='ex. 14.7-inch' required>
                                                </div>
                                            </div>
                                            <!-- JENIS PROSESOR -->
                                            <div class="inputData row">
                                                <div class='col-6'>
                                                    <h4>Jenis Prosesor</h4>
                                                    <input class="form-control align-self-end " type="number"
                                                        name="prosesor" value="0" min="0" required>
                                                </div>
                                                <div class='col-6 d-flex'>
                                                    <input class="form-control align-self-end " name="prosesor_desc"
                                                        placeholder='ex. Intel Core i7 7700HK' required>
                                                </div>
                                            </div>
                                            <!-- KAPASITAS MEMORI -->
                                            <div class="inputData row">
                                                <div class='col-6'>
                                                    <h4>Kapasitas Memori</h4>
                                                    <select class="form-select" name="kapasitas_memori" required>
                                                        <option value="1"> 2 GB </option>
                                                        <option value="2"> 4 - 6 GB </option>
                                                        <option value="3"> 8 - 12 GB </option>
                                                        <option value="4"> > 12 GB </option>
                                                    </select>
                                                </div>
                                                <div class='col-6 d-flex'>
                                                    <input class="form-control align-self-end "
                                                        name="kapasitas_memori_desc" placeholder='ex. 8GB' required>
                                                </div>
                                            </div>
                                            <!-- TIPE MEMORI -->
                                            <div class="inputData row">
                                                <div class='col-6'>
                                                    <h4>Tipe Memori</h4>
                                                    <select class="form-select" name="tipe_memori" required>
                                                        <option value="1">
                                                            < 1600 MHz </option>
                                                        <option value="2"> 2400 - 2666 MHz </option>
                                                        <option value="3"> 2700 - 3200 MHz </option>
                                                        <option value="4"> > 3200 MHz </option>
                                                    </select>
                                                </div>
                                                <div class='col-6 d-flex'>
                                                    <input class="form-control align-self-end " name="tipe_memori_desc"
                                                        placeholder='ex. DDR4 2666MHz' required>
                                                </div>
                                            </div>
                                            <!-- KAPASITAS HARD DISK -->
                                            <div class="inputData row">
                                                <div class='col-6'>
                                                    <h4>Kapasitas Hard Disk</h4>
                                                    <select class="form-select" name="kapasitas_harddisk" required>
                                                        <option value="1"> 64 - 256 GB</option>
                                                        <option value="2"> 256 - 500 GB</option>
                                                        <option value="3"> 500 - 999 GB </option>
                                                        <option value="4"> > 1 TB</option>
                                                    </select>
                                                </div>
                                                <div class='col-6 d-flex'>
                                                    <input class="form-control align-self-end "
                                                        name="kapasitas_harddisk_desc"
                                                        placeholder='ex. 512GB M.2 NVMe™ PCIe® 3.0 SSD' required>
                                                </div>
                                            </div>
                                            <!-- AKSESORIS -->
                                            <div class="inputData row">
                                                <div class='col-6'>
                                                    <h4>Aksesoris</h4>
                                                    <select class="form-select" name="aksesoris" required>
                                                        <option value="1"> Tidak </option>
                                                        <option value="2"> Ya </option>
                                                    </select>
                                                </div>
                                                <div class='col-6 d-flex'>
                                                    <input class="form-control align-self-end " name="aksesoris_desc"
                                                        placeholder='ex. Mouse + Steam Wallet' required>
                                                </div>
                                            </div>
                                            <input class='btn btn-primary' style='position: relative; top: 1em'
                                                type="submit" value="Tambah Data">
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