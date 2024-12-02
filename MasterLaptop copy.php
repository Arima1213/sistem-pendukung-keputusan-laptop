<?php
include_once 'connection.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <title>SPK Laptop One</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/nucleo@2.0.0/css/nucleo.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" crossorigin="anonymous">
    </script>
    <!-- CSS Files -->

    <link id="pagestyle" href="assets/css/argon-dashboard.minf066.css?v=2.1.0" rel="stylesheet" />
    <!-- Anti-flicker snippet (recommended)  -->
    <style>
    .async-hide {
        opacity: 0 !important
    }
    </style>
    <script>
    (function(a, s, y, n, c, h, i, d, e) {
        s.className += ' ' + y;
        h.start = 1 * new Date;
        h.end = i = function() {
            s.className = s.className.replace(RegExp(' ?' + y), '')
        };
        (a[n] = a[n] || []).hide = h;
        setTimeout(function() {
            i();
            h.end = null
        }, c);
        h.timeout = c;
    })(window, document.documentElement, 'async-hide', 'dataLayer', 4000, {
        'GTM-K9BGS8K': true
    });
    </script>
</head>

<body>
    <div class="min-height-300 bg-dark position-absolute w-100"></div>

    <?= include_once 'aside.php'; ?>
    <main class="main-content position-relative border-radius-lg">
        <?php
        if ($_SESSION['jenis'] == "usr") {
            header("Location: pilihKriteria.php");
        }
        include_once 'navbar.php';
        ?>

        <!-- <div class='col-2 d-flex flex-column justify-content-start h-100 py-5' id='sidebar'>
            <button class='btn btn-primary'">Master Laptop</button>
            <button class='btn btn-light' onclick=" location.href='MasterKriteria.php'">Master Kriteria</button>
            <button class='btn btn-light' onclick=" location.href='MasterKaryawan.php'">Master Karyawan</button>
            <div class='sidebarDivider align-self-center'></div>
            <button class='btn btn-light' id='buttonHitung' onclick=" location.href='pilihKriteria.php'">Hitung</button>
            <button class='btn btn-light' id='buttonHitung' onclick=" location.href='logout.php'">Logout</button>
        </div> -->
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
                                                    <p class="text-xs font-weight-bold mb-0"><?= $data['MERK']; ?></p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0"><?= $data['NAMA_LAPTOP']; ?>
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
    </main>

    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="fa fa-cog py-2"> </i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Argon Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0 overflow-auto">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white"
                        onclick="sidebarType(this)">White</button>
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default"
                        onclick="sidebarType(this)">Dark</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="d-flex my-3">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                            onclick="navbarFixed(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">
                <div class="mt-2 mb-5 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                            onclick="darkMode(this)">
                    </div>
                </div>
            </div>
        </div>
    </div>

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