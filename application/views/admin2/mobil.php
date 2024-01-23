<div class="container">
    <div class="page-header">
        <h3>Data Mobil</h3>
    </div>

    <a href="<?php echo base_url().'admin/mobil_add';?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Mobil Baru</a>
    <br><br>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" id="table-datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Merk Mobil</th>
                    <th>Plat</th>
                    <th>Warna</th>
                    <th>Tahun Pembuatan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach($mobil as $m) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $m->mobil_merk ?></td>
                    <td><?php echo $m->mobil_plat ?></td>
                    <td><?php echo $m->mobil_warna?></td>
                    <td><?php echo $m->mobil_tahun ?></td>
                    <td>
                        <?php 
                        if($m->mobil_status == "1") {
                            echo "Tersedia";
                        } else if($m->mobil_status == "2") {
                            echo "Sedang di Rental";
                        }
                        ?>
                    </td>
                    <td>
                        <a href="<?php echo base_url().'admin/mobil_edit/'.$m->mobil_id;?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                        <a href="<?php echo base_url().'admin/mobil_delete/'.$m->mobil_id;?>" class="btn btn-danger btn-sm"s><span class="glyphicon glyphicon-trash"></span> Hapus</a>
                    </td>
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
    </div>
</div>