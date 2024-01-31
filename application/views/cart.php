<div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-2-7xl lg:px-8">
    <div class="flex justify-between">
        <button id="backBtn" class="text-black">
		<i class="fi fi-br-angle-left"></i>
		</button>
        <h1 class="text-xl font-bold tracking-tight text-ganjar-900 text-center py-4">Keranjang</h1>
        <p></p>
    </div>
    <hr>
    <div class="mt-0 grid grid-cols-1 px-0 py-0 gap-y-2">
		<?php foreach($cart as $item): ?>
        <!-- Product - -->
        <div class="group relative flex justify-between gap-x-6 rounded-lg py-4 h-28" id="product-cart">
            <div class="flex gap-x-6">
                <div class="h-24 w-24 overflow-hidden rounded-md bg-gray-900 lg:aspect-none ">
                    <img src="<?php echo base_url() . 'assets/images/latte.jpg' ?>" alt="Coffee Latte."
                        class=" object-center ">
                </div>
                <div class="grid grid-col-1 gap-y-1">
                    <h3 class="text-sm text-gray-700 w-full ">
                        <a href="#">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                            <?= $item->quantity?>x
                        </a>
                    </h3>

                    <p class="mt-1 text-sm text-gray-500"><?= $item->name ?></p>
                    <p class="text-sm font-medium text-gray-900"><?= $item->price ?></p>
                    <div class="relative inline-block text-left">
                        <select
                            class="block appearance-none text-sm w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded leading-tight focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <!-- Tambahkan opsi sesuai kebutuhan -->
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </div>
                    </div>

                </div>
            </div>
            <p class="text-sm font-medium text-gray-900">X</p>
        </div>
        <hr class="mt-5">
		<?php endforeach; ?>
        <!-- Product - -->
        <div class="group relative flex justify-between gap-x-6 rounded-lg py-4 h-28" id="product-cart">
            <div class="flex gap-x-6">
                <div class="h-24 w-24 overflow-hidden rounded-md bg-gray-900 lg:aspect-none ">
                    <img src="<?php echo base_url() . 'assets/images/latte.jpg' ?>" alt="Coffee Latte." class=" object-center ">
                </div>
                <div class="grid grid-col-1 gap-y-1">
                    <h3 class="text-sm text-gray-700 w-full ">
                        <a href="#">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                            Latte
                        </a>
                    </h3>

                    <p class="mt-1 text-sm text-gray-500">Coffee</p>
                    <p class="text-sm font-medium text-gray-900">12k</p>
                    <div class="relative inline-block text-left">
                        <select
                            class="block appearance-none text-sm w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded leading-tight focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <!-- Tambahkan opsi sesuai kebutuhan -->
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-sm font-medium text-gray-900">X</p>
        </div>
        <hr class="mt-5">
        <!-- Product - -->
        <div class="group relative flex justify-between gap-x-6 rounded-lg py-4 h-28" id="product-cart">
            <div class="flex gap-x-6">
                <div class="h-24 w-24 overflow-hidden rounded-md bg-gray-900 lg:aspect-none ">
                    <img src="<?php echo base_url() . 'assets/images/latte.jpg' ?>" alt="Coffee Latte."
                        class=" object-center ">
                </div>
                <div class="grid grid-col-1 gap-y-1">
                    <h3 class="text-sm text-gray-700 w-full ">
                        <a href="#">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                            Latte
                        </a>
                    </h3>

                    <p class="mt-1 text-sm text-gray-500">Coffee</p>
                    <p class="text-sm font-medium text-gray-900">12k</p>
                    <div class="relative inline-block text-left">
                        <select
                            class="block appearance-none text-sm w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded leading-tight focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200">
                            <?php for($i = 1; $i <= 10; $i++): ?>
                            <option value="<?= sprintf('%02d', $i);?>"><?= sprintf('%02d', $i);?></option>  
                            <?php endfor; ?>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </div>
                    </div>

                </div>
            </div>
            <p class="text-sm font-medium text-gray-900">X</p>
        </div>
        <hr class="mt-5">
        <div class="w-full mx-auto bg-gray-100 rounded-md overflow-hidden mt-4">
            <div class="px-6 py-4 gap-y-4">
                <div class="font-medium text-xl mb-2">Rincian Biaya</div>
                <div class="flex justify-between mb-2 border-b border-gray-300 py-2">
                    <span class="text-gray-700">Total Produk:</span>
                    <span class="text-gray-900 font-semibold">$89.97</span>
                </div>
                <div class="flex justify-between mb-2 border-b border-gray-300 py-2">
                    <span class="text-gray-700">Ongkos Kirim:</span>
                    <span class="text-gray-900 font-semibold">$5.00</span>
                </div>
                <div class="flex justify-between mb-4 border-b border-gray-300 py-2">
                    <span class="text-gray-700">Diskon:</span>
                    <span class="font-semibold">-$10.00</span>
                </div>
                <!-- <hr class="border-t border-gray-200 mb-4"> -->
                <div class="flex justify-between">
                    <span class="text-xl font-bold">Total:</span>
                    <span class="text-xl font-bold">$84.97</span>
                </div>
            </div>
            <div class="px-6 py-4">
                <a href="<?= base_url('app/order');?>"
                    class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">
                    Order</a>
            </div>
        </div>

    </div>
</div>
