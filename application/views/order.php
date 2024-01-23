<div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-2-7xl lg:px-8">
   <div class="flex justify-between">
        <button id="backBtn" class="text-black">
			<i class="fi fi-br-angle-left"></i></button>
        <h1 class="text-xl font-bold tracking-tight text-ganjar-900 text-center py-4">Detail Pemesanan</h1>
        <p></p>
   </div>   <hr>
   <form action="<?= base_url('app/payment_method');?>" method="POST">

   <div class="border-b border-gray-100">
      <div class="mt-2 grid grid-cols-1 px-0 py-0 gap-y-2">
         <div class="group relative flex justify-between rounded-lg py-4 h-28" id="order">
            <div class="flex gap-x-6">
               <div class="h-20 w-20 overflow-hidden rounded-md bg-gray-900 lg:aspect-none">
                  <img src="<?php echo base_url() . 'assets/images/latte.jpg' ?>" alt="Coffee Latte."
                              class=" object-center ">
               </div>
               <div class="grid grid-col-1 gap-y-1">
                  <h3 class="text-sm text-gray-700 w-full ">
                  <a href="#">
                     <span aria-hidden="true" class="absolute inset-0"></span>
                     Latte</a>
                  </h3>
                  <p class="mt-1 text-sm text-gray-500">Coffee</p>
                  <p class="text-sm font-medium text-gray-900">Rp12.000</p> 
               </div>
            </div>
               <p class="text-sm font-small text-gray-400 mt-auto">x1</p>
         </div>
      </div>
      <div class="flex justify-between">
         <label for="notes" class="text-sm text-gray-700 w-1/4">Pesan:</label>
         <div class="flex-1">
            <input class="w-full text-right text-sm text-gray-400 p-2 focus:outline-none focus:border-transparent" type="text" name="notes" id="notes" placeholder="Katakan sesuatu ke barista..">
         </div>
      </div>
   </div>
   <div class="border-b border-gray-100">
      <div class="mt-2 grid grid-cols-1 px-0 py-0 gap-y-2">
         <div class="group relative flex justify-between rounded-lg py-4 h-28" id="product-cart">
            <div class="flex gap-x-6">
               <div class="h-20 w-20 overflow-hidden rounded-md bg-gray-900 lg:aspect-none">
                  <img src="<?php echo base_url() . 'assets/images/latte.jpg' ?>" alt="Coffee Latte."
                              class=" object-center ">
               </div>
               <div class="grid grid-col-1 gap-y-1">
                  <h3 class="text-sm text-gray-700 w-full ">
                  <a href="#">
                     <span aria-hidden="true" class="absolute inset-0"></span>
                     Latte</a>
                  </h3>
                  <p class="mt-1 text-sm text-gray-500">Coffee</p>
                  <p class="text-sm font-medium text-gray-900">Rp12.000</p> 
               </div>
            </div>
               <p class="text-sm font-small text-gray-400 mt-auto">x1</p>
         </div>
      </div>
      <div class="flex justify-between">
         <label for="notes" class="text-sm text-gray-700 w-1/4">Pesan:</label>
         <div class="flex-1">
            <input class="w-full text-right text-sm text-gray-400 p-2 focus:outline-none focus:border-transparent" type="text" name="notes" id="notes" placeholder="Katakan sesuatu ke barista..">
         </div>
      </div>
   </div>
      <div class="mt-4 inset-x-0 bg-gray-100 p-4 rounded">
      <h5 class="text-sm font-semibold text-gray-700">Isi Detail Kamu</h5>
         <div class="flex justify-between mt-2">
         
            <label for="name" class="text-sm text-gray-700 w-1/2">Nama:</label>
            <div class="flex-1">
               <input class="w-full text-right text-sm rounded text-gray-400 p-2 focus:outline-none focus:border-transparent" type="text" name="name" id="name" placeholder="Tulis Nama Kamu..">
            </div>
         </div>
         <div class="flex justify-between mt-2">
            <label for="nomor_meja" class="text-sm text-gray-700 w-1/2">Nomor Meja:</label>
            <div class="flex-1">
               <select name="nomor_meja" id="nomor_meja" class="mt-1 p-2 rounded w-full focus:outline-none focus:border-transparent">
                  <?php for($i = 1; $i <= 10; $i++): ?>
                  <option value="<?= sprintf('%02d', $i);?>"><?= sprintf('%02d', $i);?></option>  
                  <?php endfor; ?>
               </select>
            </div>
         </div>
      </div>
   <div class="mt-4">
      <div class="flex justify-between mt-4">
         <p class="text-sm text text-gray-700">Total Pesanan (2 Produk):</p>
         <div class="">
            <h4 class="font-semibold">Rp28.000</h4>
         </div>
      </div>
   </div>
   <div class="fixed bottom left-0 bottom-0 right-0 w-full bg-black">
      <button type="submit" class="fixed bottom-4 left-4 right-4 w-90 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Pilih Metode Pembayaran</button>
      </form>
   </div>
</div>
