
        <div class="content-wrapper">
    
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Menu</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url().'admin';?>">Dashboard</a></li>
                                <li class="breadcrumb-item active">Menu</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="mb-4">
                        <a href="<?= base_url().'admin/addproductform'?>">
                        <span class="input-group-append">
                            <button type="button" class="btn btn-success">Tambah Menu</button>
                        </span>
                        </a>
                    </div>
                    <div class="table-responsive">
                    	<table class="table m-0">
                        	<thead>
								<tr>
									<th>ID</th>
									<th>Gambar</th>
									<th>Nama</th>
									<th>Kategori</th>
									<th>Harga</th>
								</tr>
                            </thead>
                            <tbody>
								<?php foreach($products as $product): ?>
								<tr>
									<td><?= $product->id?></td>
									<td><img src="data:image/jpeg;base64,<?= base64_encode($product->image) ?>" alt="Gambar Produk" class="w-24 h-24 object-cover" loading="lazy"></td>
									<td><?= $product->name?></td>
									<td><?= $product->category?></td>
									<!-- <td><span class="badge badge-success"><?= $product->category?></span></td> -->
									<td>
											<?= $product->price?></div>
									</td>
								</tr>
								<?php endforeach; ?>
                           
                            </tbody>
			            </table>
                                    <!-- </div> -->
                </div>
            </section>


        
        </div>
