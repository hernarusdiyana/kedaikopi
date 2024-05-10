<!-- CATEGORY -->

<!-- Product Menu -->
<div class="mx-auto max-w-2xl px-4 py-20 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="text-xl font-bold tracking-tight text-gray-900">Pilih Sesukamu</h2>

	<div class="mt-6 grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
		<?php foreach($products as $product): 
			echo form_open('app/add_to_cart');
			echo form_hidden('id', $product->product_id);
			echo form_hidden('qty', 1);
			echo form_hidden('name', $product->name);
			echo form_hidden('image', base64_encode($product->image));
			echo form_hidden('price', $product->price);
			echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));
		?>
      	<div class="group relative ">
		  	<div class="w-full rounded-md  bg-gray-200">
				<img src="data:image/jpeg;base64,<?= base64_encode($product->image) ?>" alt="" class="w-full h-72 object-cover rounded-md md:h-80 lg:h-80">
			</div>
			<div class="mt-4 flex justify-between">
				<div>
					<h3 class="text-sm text-gray-700">
						
						<?= $product->name?>
					</h3>
					<p class="mt-1 text-sm text-gray-500"><?= $product->category?></p>
				</div>
				<p class="text-sm font-medium text-gray-900">Rp <?= number_format($product->price, 0, ',', '.') ?></p>
			</div>
			<div class="flex-justify-beetween">
				<button id="addButton" class="btn btn-sm btn-primary swalDefaultSuccess"> Tambah </button>
			</div>
			<?php echo form_close();?>
		</div>
    	
		<?php endforeach; ?>	
	</div>
					<!-- </form> -->
</div>

<script src="<?php echo base_url('assets/js/jquery.js')?>"></script>
<script src="<?php echo base_url('assets/js/sweetalert2.all.min.js')?>"></script>
<script type="text/javascript">
	$(function() {
		const Toast = Swal.mixin({
			toast: true,
			showConfirmButton: false,
			timer: 3000
		});

		$('.swalDefaultSuccess').click(function(){
			Toast.fire({
				icon: 'success',
				title: 'Berhasil ditambahkan!'
			})
		});

	});
</script>
