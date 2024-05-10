
<div class="bg-white p-4 rounded-md">
	<!-- start breadcrumb -->
	<div class="relative">
		<div class="absolute top-0 right-0">
			<ol class="flex items-center space-x-4">
			<!-- Home breadcrumb -->
			<li>
			<a href="<?= base_url('admin/')?>" class="text-gray-500 hover:text-gray-700">Dashboard</a>
			</li>
			
			<!-- Separator -->
			<li>
			<span class="text-gray-500">/</span>
			</li>
			<!-- Current page -->
			<li>
			<span class="text-gray-700">Produk</span>
			</li>
			</ol>
		</div>
	</div>
	<!-- end breadcrumb -->
	<div class="space-y-2">
		<div class="pb-10">
		<h2 class="text-base font-semibold leading-7 text-gray-900">Daftar Produk</h2>
		<p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>
		</div>
	</div>
           
                    <div class="mb-4">
                        <a href="<?= base_url().'admin/addproductform'?>">
						
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
						Tambah Produk
						</button>
						</a>
                    </div>
                    	<table class="min-w-full border-collapse border border-slate-500">
                        	<thead>
								<tr>
									<th class="border border-slate-600">ID</th>
									<th class="border border-slate-600">Gambar</th>
									<th class="border border-slate-600">Nama</th>
									<th class="border border-slate-600">Kategori</th>
									<th class="border border-slate-600">Harga</th>
									<th class="border border-slate-600">Tindakan</th>
								</tr>
                            </thead>
                            <tbody>
								<?php foreach($products as $product): ?>
								<tr>
									<td class="p-2 border border-slate-700"><?= $product->product_id?></td>
									<td class="p-2 flex justify-center align-middle  border border-slate-700"><img src="data:image/jpeg;base64,<?= base64_encode($product->image) ?>" alt="Gambar Produk" class="w-24 h-24 object-cover text-center" loading="lazy"></td>
									<td class="p-2 border border-slate-700"><?= $product->name?></td>
									<td class="p-2 border border-slate-700"><?= $product->category?></td>
									<td class="p-2 border border-slate-700">Rp <?= number_format($product->price, 0, ',', '.') ?></div>
									<td class="p-2 border border-slate-700">
										<div class="flex gap-2">
											<a href="<?= base_url('admin/product_edit/').$product->product_id;?>" class="p-2 bg-orange-300 text-orange-800 rounded-md  hover:bg-orange-400"><i class="fa-regular fa-pen-to-square"></i></a>
											<a href="<?= base_url('admin/product_delete/').$product->product_id;?>" class="p-2 bg-red-300 text-red-800 rounded-md hover:bg-red-400"><i class="fa-regular fa-trash-can"></i></a>
										</div>
									</td>
								</tr>
								<?php endforeach; ?>
                           
                            </tbody>
			            </table>
                    </div>
                </div>

        
        </div>
