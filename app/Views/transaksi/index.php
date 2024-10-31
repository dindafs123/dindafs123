<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Daftar Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            List Transaksi
                            <a href="<?php echo base_url('transaksi/create'); ?>" class="btn btn-primary float-right">Tambah</a>
                        </div>
                        <div class="card-body">
                            <?php
                            if (!empty(session()->getFlashdata('success'))) { ?>
                                <div class="alert alert-success">
                                    <?php echo session()->getFlashdata('success'); ?>
                                </div>
                            <?php } ?>

                            <?php if (!empty(session()->getFlashdata('info'))) { ?>
                                <div class="alert alert-info">
                                    <?php echo session()->getFlashdata('info'); ?>
                                </div>
                            <?php } ?>

                            <?php if (!empty(session()->getFlashdata('warning'))) { ?>
                                <div class="alert alert-warning">
                                    <?php echo session()->getFlashdata('warning'); ?>
                                </div>
                            <?php } ?>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <tr>
                                            <th>ID Transaksi</th>
                                            <th>Kode Barang</th>
                                            <th>Jumlah</th>
                                            <th>Total Harga</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Status Pembayaran</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($transaksi) && is_array($transaksi)) : ?>
                                            <?php foreach ($transaksi as $row) : ?>
                                                <tr>
                                                    <td><?php echo $row['kd_trans']; ?></td> <!-- Pastikan nama kolom sesuai -->
                                                    <td><?php echo $row['kd_barang']; ?></td>
                                                    <td><?php echo $row['jml']; ?></td>
                                                    <td><?php echo 'Rp. ' . number_format($row['total_harga'], 0, ',', '.'); ?></td> <!-- Format total_harga -->
                                                    <td><?php echo $row['tgl_trans']; ?></td>
                                                    <td><?php echo $row['mtd_pembayaran']; ?></td>
                                                    <td><?php echo $row['stts_pembayaran']; ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="/transaksi/edit/<?= esc($row['kd_trans']) ?>">Edit</a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="8">Tidak ada transaksi.</td>
                                            </tr>
                                        <?php endif; ?>
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
<?php echo view('_partials/footer'); ?>