<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Transaksi</li>
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
                        <div class="card-body">
                            <?php
                            $errors = session()->getFlashdata('errors');
                            if (!empty($errors)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    Whoops! Ada kesalahan saat input data, yaitu:
                                    <ul>
                                        <?php foreach ($errors as $error) : ?>
                                            <li><?= esc($error) ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            <?php } ?>
                            <form action="<?= site_url('transaksi/update') ?>" method="post">
                                <input type="hidden" name="kd_barang" value="<?php echo isset($barang['kd_barang']) ? $barang['kd_barang'] : ''; ?>">
                                <div class="form-group">
                                    <label for="">Kode Barang</label>
                                    <input type="text" class="form-control" name="kd_barang" placeholder="Enter kode barang" value="<?php  //echo $inputs['kd_barang']; }
                                                                                                                                    ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah</label>
                                    <input type="number" class="form-control" name="jml" placeholder="Enter jumlah" value="<?php  //echo $inputs['jumlah']; }
                                                                                                                            ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Total Harga</label>
                                    <input type="number" class="form-control" name="total_harga" placeholder="Enter total_harga" value="<?php  //echo $inputs['total_harga']; }
                                                                                                                                        ?>">
                                </div>
                                <input type="date" class="form-control" name="tgl_trans" placeholder="Enter tgl_trans" value="<?= isset($transaksi['tgl_trans']) ? $transaksi['tgl_trans'] : '' ?>">

                                <div class="form-group">
                                    <label for="">Metode Pembayaran</label>
                                    <select name="mtd_pembayaran" id="" class="form-control">
                                        <option value="">Pilih Kategori</option>
                                        <option <?php //echo $inputs['status'] == "Cash" ? "selected" : ""; 
                                                ?> value="Cash">Cash</option>
                                        <option <?php //echo $inputs['status'] == "Transfer" ? "selected" : ""; 
                                                ?> value="Transfer">Transfer</option>
                                        <option <?php //echo $inputs['status'] == "Kredit" ? "selected" : ""; 
                                                ?> value="Kredit">Kredit</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Status Pembayaran</label>
                                    <select name="stts_pembayaran" id="" class="form-control">
                                        <option value="">Pilih Kategori</option>
                                        <option <?php //echo $inputs['status'] == "Pending" ? "selected" : ""; 
                                                ?> value="Pending">Pending</option>
                                        <option <?php //echo $inputs['status'] == "Selesai" ? "selected" : ""; 
                                                ?> value="Selesai">Selesai</option>
                                        <option <?php //echo $inputs['status'] == "Dibatalkan" ? "selected" : ""; 
                                                ?> value="Dibatalkan">Dibatalkan</option>
                                    </select>
                                </div>

                        </div>
                        <div class="card-footer">
                            <a href="<?php echo base_url('transaksi'); ?>" class="btn btn-outline-info">Back</a>
                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php echo view('_partials/footer'); ?>