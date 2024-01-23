<div class="container">
    <div class="page-header">
        <h3>Data Kostumer</h3>
    </div>

    <a href="<?php echo base_url().'admin/kostumer_add';?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Kostumer</a>
    <br><br>
    <div class="table-responsive container-fluid">
        <table class="table table-bordered table-striped table-hover" id="table-datatable">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Alamat</td>
                    <td>Jenis Kelamin</td>
                    <td>No. Hp</td>
                    <td>No. Ktp</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach($kostumer as $k) {
                ?>
                <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $k->kostumer_nama ?></td>
                    <td><?php echo $k->kostumer_alamat ?></td>
                    <td>
                        <?php
                        if($k->kostumer_jk == "L" || "l") {
                            echo "Laki-laki";
                        } else if($k->kostumer_jk == "P") {
                            echo "Perempuan";
                        } 
                        ?>
                    </td>
                    <td><?php echo $k->kostumer_hp ?></td>
                    <td><?php echo $k->kostumer_ktp ?></td>
                    <td>
                        <a href="<?php echo base_url().'admin/kostumer_edit/'.$k->kostumer_id; ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"> Edit</span></a>
                        <a href="<?php echo base_url().'admin/kostumer_delete/'.$k->kostumer_id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><span class="glyphicon glyphicon-trash"> Hapus</span></a>
                    </td>
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
    </div>
</div>