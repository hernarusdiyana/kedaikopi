<div class="container">
    <div class="page-header">
        <h3>Dashboard</h3>
    </div>

    <div class="row">
        <!-- Jumlah products -->
        <div class="col-md-4 col-lg-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-folder-open"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php echo $this->kedai_model->get_data('products')->num_rows(); ?>
                            </div>
                            <div>Jumlah products</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() . 'admin/products' ?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Jumlah users -->
        <div class="col-md-4 col-lg-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-user"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php echo $this->kedai_model->get_data('users')->num_rows(); ?>
                            </div>
                            <div>Jumlah users</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() . 'admin/users' ?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Jumlah orders -->
        <div class="col-md-4 col-lg-3">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-sort"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php echo $this->kedai_model->get_data('orders')->num_rows(); ?>
                            </div>
                            <div>Jumlah orders</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() . 'admin/orders' ?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <!-- kedai Selesai -->
        <div class="col-md-4 col-lg-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-ok"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php echo $this->kedai_model->edit_data(array('status' => 1), 'orders')->num_rows(); ?>
                            </div>
                            <div>kedai Selesai</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() . 'admin/orders' ?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- products -->
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="glyphicon glyphicon-road"></i> products</h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <?php foreach ($products as $m) { ?>
                            <a href="#" class="list-group-item">
                                <!-- <span class="badge badge-info">
                                    <?php if ($m->status != 'Pending') {
                                        echo "Tersedia";
                                    } else {
                                        echo "Dikedai";
                                    } ?>
                                </span> -->
                                <!-- <i class="glyphicon glyphicon-user">
                                    <?php echo $m->products_merk; ?>
                                </i> -->
                            </a>
                        <?php } ?>
                    </div>
                    <div class="text-right">
                        <a href="<?php echo base_url() . 'admin/products' ?>"> Lihat Semua products <i
                                class="glyphicon glyphicon-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- users Terbaru -->
        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="glyphicon glyphicon-user"></i> users Terbaru</h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <?php foreach ($users as $k) { ?>
                            <a href="#" class="list-group-item">
                                <span class="badge badge-success">
                                    <?php echo $k->users_jk ?>
                                </span>
                                <i class="glyphicon glyphicon-user">
                                    <?php echo $k->users_nama; ?>
                                </i>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="text-right">
                        <a href="<?php echo base_url() . 'admin/users' ?>"> Lihat Semua users <i
                                class="glyphicon glyphicon-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Peminjaman terakhir -->
        <div class="col-lg-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="glyphicon glyphicon-sort"></i> Peminjaman Terakhir</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Tgl. orders</th>
                                    <th>Tgl. Pinjam</th>
                                    <th>Tgl. Kembali</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($orders as $t) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo date('d/m/y', strtotime($t->orders_tgl)); ?>
                                        </td>
                                        <td>
                                            <?php echo date('d/m/y', strtotime($t->orders_tgl_pinjam)); ?>
                                        </td>
                                        <td>
                                            <?php echo date('d/m/y', strtotime($t->orders_tgl_kembali)); ?>
                                        </td>
                                        <td>
                                            <?php echo "Rp. " . number_format($t->orders_harga) . " ,-"; ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <a href="<?php echo base_url() . 'admin/orders' ?>">Lihat Semua orders <i
                                class="glyphicon glyphicon-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>