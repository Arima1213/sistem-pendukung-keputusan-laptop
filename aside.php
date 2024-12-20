<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="dashboard.html">
            <img src="assets/img/logo-ct-dark.png" width="26px" height="26px" class="navbar-brand-img h-100"
                alt="main_logo">
            <span class="ms-1 font-weight-bold">SPK Laptop</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <?php
            // Periksa jenis user dari session
            if ($_SESSION['jenis'] == "usr") {
                // Jika user adalah 'usr', tampilkan hanya menu Hitung dan Logout
            ?>
            <li class="nav-item">
                <a class="nav-link" href="pilihKriteria.php">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-check text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Hitung</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-power-off text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
            </li>
            <?php
            } else {
                // Jika user bukan 'usr', tampilkan semua menu
            ?>
            <li class="nav-item">
                <a class="nav-link active" href="MasterLaptop.php">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-laptop text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Master Laptop</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="MasterKriteria.php">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-calendar text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Master Kriteria</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="MasterKaryawan.php">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Master Karyawan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pilihKriteria.php">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-check text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Hitung</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-power-off text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
            </li>
            <?php
            }
            ?>
        </ul>
    </div>
</aside>