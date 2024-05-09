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
			<!-- First-level breadcrumb -->
			<li>
			<a href="<?= base_url('admin/products')?>" class="text-gray-500 hover:text-gray-700">Produk</a>
			</li>
			<!-- Separator -->
			<li>
			<span class="text-gray-500">/</span>
			</li>
			<!-- Current page -->
			<li>
			<span class="text-gray-700">Tambah Produk</span>
			</li>
			</ol>
		</div>
	</div>
	<!-- end breadcrumb -->
	<div class="space-y-2">
		<div class="mb-4">
		<h2 class="text-base font-semibold leading-7 text-gray-900">Tambah Produk Baru</h2>
		<p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>
		</div>
	</div>

	<!-- <?php echo $error;?> -->

	<?php echo form_open_multipart('admin/addproduct');?>

    <!-- <form action="<?php echo base_url().'admin/addproduct' ?>" method="POST"> -->
	<div class="">
		<div class="grid grid-cols-1 gap-x-6 gap-y-8 sm-grid-cols-6 space-y-2">
        <div class="flex flex-col gap-2">
            <label>Nama Produk</label>
            <input type="text" name="name" class="py-2 px-5 rounded-lg bg-white border" placeholder="Masukkan Nama Produk"required>
            <?php echo form_error('merk'); ?>
        </div>
		<div class="flex flex-col gap-2">
			<label>Jenis</label>
			<select name="category" class="py-2 px-5 rounded-lg bg-white border" required>
				<option value="Kopi">Kopi</option>
				<option value="Bukan Kopi">Bukan Kopi</option>
				<option value="Makanan">Makanan</option>
				<option value="Camilan">Camilan</option>
			</select>
			<?php echo form_error('status'); ?>
		</div>
        <div class="flex flex-col gap-2">
            <label>Harga</label>
            <input type="number" name="price" class="py-2 px-5 rounded-lg bg-white border" required>
        </div>
		<div class="flex flex-col gap-2">
			<label for="image">Gambar Produk</label>
			<input type="file" name="image" required>
		</div>
		
        
        
		<button  type="submit" id="openModalBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 ease-in-out" style="background-color: #3490dc !important;"  onmouseover="this.style.backgroundColor='#2980b9'" 
        onmouseout="this.style.backgroundColor='#3498db'">
		Tambah
		</button>
		<!-- <input id="openModalBtn" class="hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md" style="background-color: #3490dc !important;"  onmouseover="this.style.backgroundColor='#2980b9'" 
        onmouseout="this.style.backgroundColor='#3498db'" type="submit" value="Tambah" cursor="pointer">
		</input> -->

		<!-- Main modal -->
		<div id="myModal" class="modal hidden mt-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 p-4 w-full max-w-2xl max-h-full overflow-y-auto rounded-md ">
		<!-- <div id="myModal" class="modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"> -->
			
				<!-- Modal content -->
				<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
					<!-- Modal header -->
					<div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
						<h3 class="text-xl font-semibold text-gray-900 dark:text-white">
							Terms of Service
						</h3>
						<!-- <button id="closeModalBtn" type="button" class="close text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
							<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
							</svg>
							<span class="sr-only">Close modal</span>
						</button> -->
					</div>
					<!-- Modal body -->
					<div class="p-4 md:p-5 space-y-4">
						<p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
							Harap pastikan bahwa Anda telah memeriksa dengan teliti detail produk yang akan ditambahkan. Dengan mengklik tombol 'Tambahkan Produk', Anda mengkonfirmasi bahwa informasi yang Anda berikan sudah benar dan sesuai.
						</p>
						<p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
							Tindakan ini akan menambahkan produk ke dalam sistem. Pastikan bahwa semua detail produk, termasuk nama, kategori, dan harga, telah diverifikasi sebelum melanjutkan.
						</p>
					</div>
					<!-- Modal footer -->
					<div class="flex items-center gap-2 p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
						
							<input type="submit" value="Tambahkan Produk" class="block text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
						<button id="closeModalBtn" data-modal-hide="default-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Nanti dulu</button>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>				

		<!-- Modal Button -->


    </form>
	</section>
  </div>

