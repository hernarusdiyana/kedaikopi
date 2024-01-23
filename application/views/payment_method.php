<div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-2-7xl lg:px-8">
    <div class="flex justify-between">
        <button id="backBtn" class="text-black">
			<i class="fi fi-br-angle-left"></i></button>
        <h1 class="text-xl font-bold tracking-tight text-ganjar-900 text-center py-4">Pembayaran</h1>
        <p></p>
    </div>
    <hr>
    <div class="borbder-b border-gray-100">
        <div class="mt-2 grid grid-cols-1 gap-2">
            <div class="group relative flex justify-between rounded-lg py-4 h-16">
                <h4 class="font-bold">
                    Metode Pembayaran
                </h4>
                <div class="">
                    <!-- <h5 class="font-semibold">
                      lihat semua  
                    </h5> -->
                </div>
            </div>
            <div class="payment-option flex items-center rounded-md gap-3 cursor-pointer hover:bg-white">
    <input type="radio" name="payment_option" id="payment_method_1" class="hidden" />
    <div class="flex justify-center h-14 w-16 items-center">
        <img src="<?php echo base_url() . 'assets/images/cashier.png' ?>" alt=""
            class="h-10 object-cover object-center mx-auto my-auto">
    </div>
    <label for="payment_method_1" class="flex-grow cursor-pointer">
        Bayar di Kasir
    </label>
    <span class="ml-auto"> <!-- Menggunakan margin-left:auto untuk memindahkan simbol ke sisi kanan -->
        <!-- Menggunakan kelas dari Tailwind CSS untuk mengatur tanda panah atau simbol lain -->
        <span class="w-4 h-4 border border-gray-500 rounded-full flex items-center justify-center">
            <span class="w-2 h-2 bg-gray-500 rounded-full"></span>
        </span>
    </span>
</div>
            <!-- Payment Option - 1 -->
            <div class="payment-option flex items-center rounded-md gap-3 cursor-pointer hover:bg-white" onclick="redirectToPaymentDetail('payment_method_1')">
                <div class="flex justify-center h-14 w-16 items-center">
                        <img src="<?php echo base_url() . 'assets/images/cashier.png' ?>" alt=""
                                    class="h-10 object-cover object-center mx-auto my-auto">
                    </div>
                <span class="flex-grow">Bayar di Kasir</span>
                <span>&gt;</span>
            </div>
            <!-- Payment Option - 1 -->
            <div class="payment-option flex items-center rounded-md gap-3 cursor-pointer hover:bg-white" onclick="redirectToPaymentDetail('payment_method_1')">
                <div class="flex justify-center h-14 w-16 items-center">
                        <img src="<?php echo base_url() . 'assets/images/logo_qris.png' ?>" alt=""
                                    class="w-full object-cover object-center mx-auto my-auto">
                    </div>
                <span class="flex-grow">Scan QRIS</span>
                <span>&gt;</span>
            </div>
            <!-- Payment Option - 2 -->
            <div class="payment-option flex items-center rounded-md gap-3 cursor-pointer hover:bg-white" onclick="redirectToPaymentDetail('payment_method_1')">
                <div class="flex justify-center h-14 w-16 items-center">
                        <img src="<?php echo base_url() . 'assets/images/logo_dana.png' ?>" alt=""
                                    class="w-full object-cover object-center mx-auto my-auto">
                    </div>
                <span class="flex-grow">Transfer Dana</span>
                <span>&gt;</span>
            </div>
            <!-- Payment Option - 3 -->
            <div class="payment-option flex items-center rounded-md gap-3 cursor-pointer hover:bg-white" onclick="redirectToPaymentDetail('payment_method_1')">
                <div class="flex justify-center h-14 w-16 items-center">
                        <img src="<?php echo base_url() . 'assets/images/logo_mandiri.png' ?>" alt=""
                                    class="w-full object-cover object-center mx-auto my-auto">
                    </div>
                <span class="flex-grow">Transfer BANK Mandiri</span>
                <span>&gt;</span>
            </div>
            
        </div>
        <div class="w-full mx-auto bg-gray-100 rounded-md overflow-hidden mt-4">
            <div class="px-6 py-4 gap-y-4">
                <h4 class="font-bold mb-2">
                    Rincian Biaya
                </h4>
                <div class="flex justify-between mb-2 border-b border-gray-300 py-2">
                    <span class="text-sm text-gray-700">Total Produk:</span>
                    <span class="text-sm text-gray-900 font-semibold">$89.97</span>
                </div>
                <div class="flex justify-between mb-4 border-b border-gray-300 py-2">
                    <span class="text-sm text-gray-700">Diskon:</span>
                    <span class="text-sm font-semibold">-$10.00</span>
                </div>
                <!-- <hr class="border-t border-gray-200 mb-4"> -->
                <div class="flex justify-between">
                    <span class="text-md font-bold">Total:</span>
                    <span class="text-md font-bold">$84.97</span>
                </div>
            </div>
            <div class="px-6 py-4">
                <a href="<?= base_url('app/order');?>"
                    class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">
                    Order
                </a>
            </div>
        </div>
    </div>
        
    
</div>
