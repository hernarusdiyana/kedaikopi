<!-- CATEGORY -->

<!-- Product Menu -->
<div class="mx-auto max-w-2xl px-4 py-20 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="text-xl font-bold tracking-tight text-gray-900">Pilih Sesukamu</h2>

    <div class="mt-6 grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        <div class="group relative">
            <div
                class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                <img src="<?php echo base_url() . 'assets/images/espresso.jpg' ?>" alt="Espresso Coffee."
                    class="h-full w-full object-cover object-center lg:h-full lg:w-full">
            </div>
            <div class="mt-4 flex justify-between">
                <div>
                    <h3 class="text-sm text-gray-700">
                        <a href="">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                            Espresso
                        </a>
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">Coffee</p>
                </div>
                <p class="text-sm font-medium text-gray-900">8k</p>
            </div>
        </div>
        <div class="group relative">
            <div
                class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                <img src="<?php echo base_url() . 'assets/images/latte.jpg' ?>" alt="Coffee Latte."
                    class="h-full w-full object-cover object-center lg:h-full lg:w-full">
            </div>
            <div class="mt-4 flex justify-between">
                <div>
                    <h3 class="text-sm text-gray-700">
                        <a href="#">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                            Latte
                        </a>
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">Coffee</p>
                </div>
                <p class="text-sm font-medium text-gray-900">12k</p>
            </div>
        </div>
        <div class="group relative">
            <div
                class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                <img src="<?php echo base_url() . 'assets/images/latte.jpg' ?>" alt="Americano Coffee."
                    class="h-full w-full object-cover object-center lg:h-full lg:w-full">
            </div>
            <div class="mt-4 flex justify-between">
                <div>
                    <h3 class="text-sm text-gray-700">
                        <a href="#">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                            Latte
                        </a>
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">Coffee</p>
                </div>
                <p class="text-sm font-medium text-gray-900">12k</p>
            </div>
        </div>
		<div class="group relative">
            <div
                class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                <img src="<?php echo base_url() . 'assets/images/espresso.jpg' ?>" alt="Espresso Coffee."
                    class="h-full w-full object-cover object-center lg:h-full lg:w-full">
            </div>
            <div class="mt-4 flex justify-between">
                <div>
                    <h3 class="text-sm text-gray-700">
                        <a href="">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                            Espresso
                        </a>
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">Coffee</p>
                </div>
                <p class="text-sm font-medium text-gray-900">8k</p>
            </div>
        </div>
		<?php foreach($products as $product): ?>
        <div class="group relative">		
            <div
                class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80" >
					<img src="data:image/jpeg;base64,<?= base64_encode($product->image) ?>" alt="Gambar Produk" class="h-full w-full object-cover object-center lg:h-full lg:w-full" loading="lazy">
            </div>
            <div class="mt-4 flex justify-between">
                <div>
                    <h3 class="text-sm text-gray-700">
                        <a href="">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                            <?= $product->name?>
                        </a>
                    </h3>
                    <p class="mt-1 text-sm text-gray-500"><?= $product->category?></p>
                </div>
                <p class="text-sm font-medium text-gray-900"><?= $product->price?></p>
				
            </div>
        </div>
		<form action="<?= site_url('app/add_to_cart'); ?>" method="post">
<!-- Isian untuk id_produk dan kuantitas -->
			<input type="hidden" name="product_id" value="<?= $product->product_id?>">
			<input type="number" name="quantity" value="1" min="1">
			<button type="submit">Tambahkan ke Keranjang</button>
		</form>
		<?php endforeach; ?>
     
    </div>
</div>
