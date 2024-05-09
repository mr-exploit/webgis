<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">UMKM KOTA BATAM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url('home'); ?>">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('peta'); ?>">Peta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('kontak'); ?>">Kontak Saya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('informasi'); ?>">Informasi</a>
                </li>
                <?php if ($this->session->userdata('role_id') == 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('dataumkm'); ?>">Data UMKM</a>
                    </li>
                <?php endif; ?>

                <?php if ($this->session->userdata('email')) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('auth/logout'); ?>">
                            <button type="button" class="btn btn-primary">Keluar</button>
                        </a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('auth'); ?>">
                            <button type="button" class="btn btn-primary">Masuk</button>
                        </a>
                    </li>
                <?php endif; ?>


            </ul>
        </div>
    </div>
</nav>