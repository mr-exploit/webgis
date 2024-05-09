<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 mt-5"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- <?= form_error('dataumkm', '<div class="alert alert-danger" role="alert">', '</div>'); ?> -->
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>

            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Add New Lapangan
            </button>

            <table id="datatable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">no</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Nomor_HP</th>
                        <th scope="col">Nama_Usaha</th>
                        <th scope="col">Alamat_Usaha</th>
                        <th scope="col">Jenis_Usaha</th>
                        <th scope="col">Bidang_Usaha</th>
                        <th scope="col">Tahun_Berdiri</th>
                        <th scope="col">latitude</th>
                        <th scope="col">longtitude</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($umkm as $a) : ?>
                        <tr>
                            <th scope="row">
                                <?= $i; ?>
                            </th>
                            <td>
                                <?= $a['nama']; ?>
                            </td>
                            <td>
                                <?= $a['kecamatan']; ?>
                            </td>
                            <td>
                                <?= $a['nomor_hp']; ?>
                            </td>
                            <td>
                                <?= $a['nama_usaha']; ?>
                            </td>
                            <td>
                                <?= $a['alamat_usaha']; ?>
                            </td>
                            <td>
                                <?= $a['jenis_usaha']; ?>
                            </td>
                            <td>
                                <?= $a['bidang_usaha']; ?>
                            </td>
                            <td>
                                <?= $a['tahun_berdiri']; ?>
                            </td>
                            <td>
                                <?= $a['latitude']; ?>
                            </td>
                            <td>
                                <?= $a['longtitude']; ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $a['id']; ?>">
                                    Edit
                                </button>

                                <a href="<?php echo base_url('dataumkm/deleteumkm/' . $a['id']); ?>" class="btn btn-danger mt-2">Delete</a>


                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- <table class="table">
                <thead>
                    <tr>
                        <th scope="col">no</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Nomor_HP</th>
                        <th scope="col">Nama_Usaha</th>
                        <th scope="col">Alamat_Usaha</th>
                        <th scope="col">Jenis_Usaha</th>
                        <th scope="col">Bidang_Usaha</th>
                        <th scope="col">Tahun_Berdiri</th>
                        <th scope="col">latitude</th>
                        <th scope="col">longtitude</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($umkm as $a) : ?>
                        <tr>
                            <th scope="row">
                                <?= $i; ?>
                            </th>
                            <td>
                                <?= $a['nama']; ?>
                            </td>
                            <td>
                                <?= $a['kecamatan']; ?>
                            </td>
                            <td>
                                <?= $a['nomor_hp']; ?>
                            </td>
                            <td>
                                <?= $a['nama_usaha']; ?>
                            </td>
                            <td>
                                <?= $a['alamat_usaha']; ?>
                            </td>
                            <td>
                                <?= $a['jenis_usaha']; ?>
                            </td>
                            <td>
                                <?= $a['bidang_usaha']; ?>
                            </td>
                            <td>
                                <?= $a['tahun_berdiri']; ?>
                            </td>
                            <td>
                                <?= $a['latitude']; ?>
                            </td>
                            <td>
                                <?= $a['longtitude']; ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $a['id']; ?>">
                                    Edit
                                </button>
                               
                                <a href="<?php echo base_url('dataumkm/deleteumkm/' . $a['id']); ?>" class="btn btn-danger mt-2">Delete</a>


                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table> -->
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Button trigger modal -->

<!-- modal new add -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Data UMKM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('dataumkm'); ?>" method="post" enctype="multipart/form-data" id="myForm">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control mb-2" id="nama" name="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control mb-2" id="Kecamatan" name="kecamatan" placeholder="Deskripsi Kecamatan">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control mb-2" id="nohp" name="nomor_hp" placeholder="No_Handpone">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control mb-2" id="usaha" name="nama_usaha" placeholder="Nama Usaha">
                    </div>
                    <div class="form-group">
                        <!-- <input type="text" class="form-control mb-2" id="alamatusaha" name="alamat_usaha" placeholder="Deskripsi Alamat Usaha"> -->
                        <textarea class="form-control mb-2" id="alamatusaha" name="alamat_usaha" placeholder="Deskripsi Alamat Usaha" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control mb-2" id="jenis" name="jenis_usaha" placeholder="Jenis Usaha">
                    </div>
                    <div class="form-group">
                        <!-- <input type="text" class="form-control mb-2" id="bidang" name="bidang_usaha" placeholder="Bidang  Usaha"> -->
                        <textarea class="form-control mb-2" id="bidang" name="bidang_usaha" placeholder="Bidang  Usaha" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control mb-2" id="tahun" name="tahun_berdiri" placeholder="Tahun Berdiri">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control mb-2" id="latitude" name="latitude" placeholder="Masukkin Latitude">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control mb-2" id="longtitude" name="longtitude" placeholder="Masukkin longtitude">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal new add -->


<!-- modal Edit UMKM -->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data UMKM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('dataumkm/editumkm/' . $a['id']); ?>" method="post" enctype="multipart/form-data" id="editform">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control mb-2" id="nama" name="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control mb-2" id="Kecamatan" name="kecamatan" placeholder="Deskripsi Kecamatan">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control mb-2" id="nohp" name="nomor_hp" placeholder="No_Handpone">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control mb-2" id="usaha" name="nama_usaha" placeholder="Nama Usaha">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control mb-2" id="alamatusaha" name="alamat_usaha" placeholder="Deskripsi Alamat Usaha" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control mb-2" id="jenis" name="jenis_usaha" placeholder="Jenis Usaha">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control mb-2" id="bidang" name="bidang_usaha" placeholder="Bidang  Usaha" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control mb-2" id="tahun" name="tahun_berdiri" placeholder="Tahun Berdiri">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control mb-2" id="latitude" name="latitude" placeholder="Masukkin Latitude">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control mb-2" id="longtitude" name="longtitude" placeholder="Masukkin longtitude">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal Edit UMKM -->