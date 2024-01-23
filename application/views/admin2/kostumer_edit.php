<div class="container">
    <div class="page-header">
        <h3>Edit Data Kostumer</h3>
    </div>

    <?php
    foreach($kostumer as $k) {
    ?>
    <form action="<?php echo base_url().'admin/kostumer_update'?>" method="post">
        <div class="form-group">
            <label>Nama</label>
            <input type="hidden" name="id" value="<?php echo $k->kostumer_id;?>">
            <input type="text" name="nama" value="<?php echo $k->kostumer_nama;?>" class="form-control">
            <?php echo form_error('nama');?>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" value="<?php echo $k->kostumer_alamat;?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <div class="radio">
                <label><input type="radio" name="jk" <?php if($k->kostumer_jk == "L") {
                    echo "checked='checked'";
                } echo $k->kostumer_jk;?> value="L">Laki-laki</label>
            </div>
            <div class="radio">
            <label><input type="radio" name="jk" <?php if($k->kostumer_jk == "P") {
                    echo "checked='checked'";
                } echo $k->kostumer_jk;?> value="P">Perempuan</label>
            </div>
        </div>
        <div class="form-group">
            <label>No Handphone</label>
            <input type="text" name="hp" value="<?php echo $k->kostumer_hp;?>" class="form-control">
        </div>
        <div class="form-group">
            <label>No KTP</label>
            <input type="number" name="ktp" value="<?php echo $k->kostumer_ktp;?>" class="form-control">
            <?php echo form_error('ktp');?>
        </div>
        <div class="form-group">
            <input type="submit" value="Simpan" class="btn btn-primary">
        </div>
    </form>
    <?php 
    }
    ?>
</div>