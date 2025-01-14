<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Barang</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('barang/store'); ?>" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                // if (!empty($inputs)){
                                //   $inputs = session()->getFlashdata('inputs');
                                //}
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
                                <div class="form-group">
                                    <label for="">Kode Barang</label>
                                    <input type="text" class="form-control" name="kd_barang" placeholder="Enter kode barang" value="<?php  //echo $inputs['kd_barang']; }
                                                                                                                                    ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Barang</label>
                                    <input type="text" class="form-control" name="nm_barang" placeholder="Enter nama barang" value="<?php  //echo $inputs['nm_barang']; }
                                                                                                                                    ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Merk</label>
                                    <input type="text" class="form-control" name="merk" placeholder="Enter merk" value="<?php  //echo $inputs['merk']; }
                                                                                                                        ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Tahun</label>
                                    <input type="text" class="form-control" name="tahun" placeholder="Enter tahun" value="<?php  //echo $inputs['tahun']; }
                                                                                                                            ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Asal Usul</label>
                                    <input type="text" class="form-control" name="asal_usul" placeholder="Enter asal_usul" value="<?php  //echo $inputs['asal_usul']; }
                                                                                                                                    ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah</label>
                                    <input type="text" class="form-control" name="jumlah" placeholder="Enter jumlah" value="<?php  //echo $inputs['jumlah']; }
                                                                                                                            ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" class="form-control" name="foto" accept="image/*">
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi" placeholder="Enter deskripsi" value="<?php  //echo $inputs['deskripsi']; }
                                                                                                                                    ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="">Pilih Kategori</option>
                                        <option <?php //echo $inputs['status'] == "Baru" ? "selected" : ""; 
                                                ?> value="New">New</option>
                                        <option <?php //echo $inputs['status'] == "Second" ? "selected" : ""; 
                                                ?> value="Second">Second</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('barang'); ?>" class="btn btn-outline-info">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view('_partials/footer'); ?>