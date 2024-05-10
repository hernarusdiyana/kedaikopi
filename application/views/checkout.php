<div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-2-7xl lg:px-8">
   <div class="flex justify-between">
        <button id="backBtn" class="text-black">
			<i class="fi fi-br-angle-left"></i></button>
        <h1 class="text-xl font-bold tracking-tight text-ganjar-900 text-center py-4">Detail Pemesanan</h1>
        <p></p>
   </div>   <hr>
   <form action="<?= base_url('app/process_order');?>" method="POST">
	<?php 
	$total_item = 0;
	foreach($cart_contents as $item): 
				$total_item = $total_item + $item['qty'];?>
   <div class="border-b border-gray-100">
      <div class="grid grid-cols-1 px-0 py-0 ">
         <div class="group relative flex justify-between rounded-lg py-4 h-28" id="order">
            <div class="flex gap-x-6">
               <div class="h-20 w-20 overflow-hidden rounded-md bg-gray-900 lg:aspect-none">
					<img src="data:image/jpeg;base64,<?= $item['image']; ?>" alt="" class="object-cover object-center rounded-md md:h-80 lg:h-80">
               </div>
               <div class="grid grid-col-1 gap-y-1">
                  <h3 class="text-sm text-gray-700 w-full ">
                  <a href="#">
                     <!-- <span aria-hidden="true" class="absolute inset-0"></span> -->
                     <?= $item['name']; ?>
                  </a>
                  </h3>
                  <p class="mt-1 text-sm text-gray-500">Coffee</p>
                  <p class="text-sm font-medium text-gray-900">Rp <?= number_format($item['price'], 0, ',', '.') ?></p> 
               </div>
            </div>
               <p class="text-sm font-small text-gray-400 mt-auto">x <?= $item['qty'];?></p>
         </div>
      </div>
      <div class="flex justify-between">
         <label for="notes" class="text-sm text-gray-700 w-1/4">Notes:</label>
         <div class="flex-1">
            <input class="w-full text-right text-sm text-gray-400 p-2 focus:outline-none focus:border-transparent" type="text" name="notes" id="notes" placeholder="Katakan sesuatu ke barista..">
         </div>
      </div>
   </div>
	
	<?php endforeach; ?>
   	<!-- Detail Customer -->
      <div class="mt-4 inset-x-0 bg-gray-100 p-4 rounded">
      <h5 class="text-sm font-semibold text-gray-700">Isi Detail Kamu</h5>
         <div class="flex justify-between mt-2">
         
            <label for="name" class="text-sm text-gray-700 w-1/2">Nama:</label>
            <div class="flex-1">
               <input class="w-full text-right text-sm rounded text-gray-400 p-2 focus:outline-none focus:border-transparent" type="text" name="nama" id="nama" placeholder="Tulis Nama Kamu.." required>
            </div>
         </div>
         <div class="flex justify-between mt-2">
            <label for="nomor_meja" class="text-sm text-gray-700 w-1/2">Nomor Meja:</label>
            <div class="flex-1">
               <select name="nomor_meja" id="nomor_meja" class="text-sm text-right text-gray-400 mt-1 p-2 rounded w-full focus:outline-none focus:border-transparent" required>
						<option value="">Pilih Nomor Meja Kamu</option>
                  <?php for($i = 1; $i <= 10; $i++): ?>
                  <option value="<?= sprintf('%02d', $i);?>"><?= sprintf('%02d', $i);?></option>  
                  <?php endfor; ?>
               </select>
            </div>
         </div>
      </div>
	<!-- Metode Pembayaran -->
		<div class="mt-4 mb-16">
			<h5 class="text-sm font-semibold text-gray-700">Metode Pembayaran</h5>
			<div class="col">
				<div class="payment-option flex items-center rounded-md gap-3 cursor-pointer border-b border-gray-100 hover:bg-white" onclick="redirectToPaymentDetail('payment_method_1')">
                <div class="flex h-14 w-16 items-center">
                        <img src="<?php echo base_url() . 'assets/images/cashier.png' ?>" alt=""
                                    class="h-8 object-cover object-center mx-auto my-auto">
                    </div>
                <label for="cash" class="flex-grow text-sm font-normal cursor-pointer">Cash</label>
                <input type="radio" name="metode_pembayaran" value="cash" id="cash">
            </div>
				<div class="payment-option flex items-center rounded-md gap-3 cursor-pointer border-b border-gray-100 hover:bg-white" onclick="redirectToPaymentDetail('payment_method_1')">
                <div class="flex h-14 w-16 items-center">
                        <img src="<?php echo base_url() . 'assets/images/logo_qris.png' ?>" alt=""
                                    class="h-8 w-full object-cover object-center mx-auto my-auto">
                    </div>
                <label for="qris" class="flex-grow text-sm font-normal cursor-pointer">Qris</label>
                <input type="radio" name="metode_pembayaran" value="qris" id="qris">
            </div>
				
   	   </div>
		

      <div class="fixed bottom-0 left-4 right-4 w-90 py-4 bg-white">
         <div class="flex justify-between mb-2">
            <p class="text-sm text text-gray-700">Total Pesanan (<?= $total_item;?> Produk):</p>
            <div class="">
               <h4 class="font-semibold">Rp <?= number_format($this->cart->total())?></h4>
            </div>
         </div>
         <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Pilih Metode Pembayaran</button>
      </div>
      </form>
   </div>
</div>
