<div class="container">
    <div class="page-header">
        <h3>Tambah Mobil</h3>
    </div>

    <form action="<?php echo base_url().'admin/mobil_add_act' ?>" method="POST">
        <div class="form-group">
            <label>Merk Mobil</label>
            <input type="text" name="merk" class="form-control">
            <?php echo form_error('merk'); ?>
        </div>
        <div class="form-group">
            <label>Plat Kendaraan</label>
            <input type="text" name="plat" class="form-control">
        </div>
        <div class="form-group">
            <label>Warna</label>
            <input type="text" name="warna" class="form-control">
        </div>
        <div class="form-group">
            <label>Tahun Kendaraan</label>
            <input type="text" name="tahun" class="form-control">
        </div>
        <div class="form-group">
            <label>Status Mobil</label>
            <select name="status" class="form-control">
                <option value="1">Tersedia</option>
                <option value="2">Sedang di Rental</option>
            </select>
            <?php echo form_error('status'); ?>
        </div>
        <div class="form-group">
            <input type="submit" value="Tambah" class="btn btn-primary">
        </div>
    </form>
</div>