<div class="container">
    <div class="page-header">
        <h3>Kostumer Baru</h3>
    </div>

    <form action="<?php echo base_url().'admin/kostumer_add_act'?>" method="post">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control">
            <?php echo form_error('nama');?>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <div class="radio">
                <label><input type="radio" name="jk" value="L">Laki-laki</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="jk" value="P">Perempuan</label>
            </div>
        </div>
        <div class="form-group">
            <label>No Handphone</label>
            <input type="number" name="hp" class="form-control">
        </div>
        <div class="form-group">
            <label>No KTP</label>
            <input type="number" name="ktp" class="form-control">
            <?php echo form_error('ktp');?>
        </div>
        <div class="form-group">
            <input type="submit" value="Tambah" class="btn btn-primary">
        </div>
    </form>
</div>