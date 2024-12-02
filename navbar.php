<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
    data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <?php
            // Mendapatkan bagian URL setelah domain (misal: /spk_laptopone/MasterLaptop%20copy.php)
            $current_url = basename($_SERVER['REQUEST_URI'], ".php");

            // Mengganti karakter yang tidak diinginkan, seperti "%20" menjadi spasi, dan mengubah ke format yang lebih bersih
            $current_page = str_replace("%20", " ", $current_url);

            // Menjadikan huruf pertama setiap kata kapital untuk tampilan yang lebih rapi
            $current_page = ucwords(str_replace("_", " ", $current_page));
            ?>
            <h6 class="font-weight-bolder text-white mb-0">
                <?= $current_page; ?>
            </h6>

        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">

            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none">Sign In</span>
                    </a>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>