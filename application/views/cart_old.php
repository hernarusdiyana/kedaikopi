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
	<div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="table-responsive">
                    <h3 class="text-center">Daftar Produk</h3>
                    <br>
                    <?php
                    foreach ($products as $row):?>
                        <div class="">
							<h4><?=$row->name?></h4>
							<h3 class="text-danger"><?=$row->price?></h3>
							<input type="text" name="quantity" class="form-control quantity" id="<?=$row->product_id?>">
							<button type="button" name="add_cart" class="btn btn-success mt-2 add_cart" data-name="<?=$row->name?>" data-price="<?=$row->price?>" data-productid="<?=$row->product_id?>"><i class="fa fa-cart-plus"></i> Tambah</button>
                        </div>
                    <?php endforeach;?>
                
                </div>
            </div>
			<div class="col-lg-6 col-md-6">
                <div id="cart_detail">
                    <h3 class="text-center">Keranjang kosong</h3>
                </div>
            </div>
	</div>
		<?php 
		
		$cart = $this->cart->contents();
		if(empty($cart)) {
		
		?>
		<div class="flex justify-center mt-10">
			<div class="">
			<h4>Keranjang Kamu kosong nih, pilih menu yuk!</h4>
				<div class="mt-4 flex justify-center">
					<a href="<?= base_url('app/')?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">Pilih Menu</a>
				</div>
			</div>
		</div>
		<?php 
		} else {
		?>
		<?php foreach($cart_items as $item): ?>
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
		<?php
		}
		?>
        

    </div>
</div>

<script>
    $(document).ready(function() {
        $(".add_cart").click(function() {
            var product_id = $(this).data("productid");
            var name = $(this).data("productname");
            var price = $(this).data("price");
            var quantity = $('#' + product_id).val(); // ambil value inputan dari id yg dipilih

            //cek jika quantity = 0
            if (quantity != '' && quantity > 0) {
                //jika quantity lebih dari 0, request dengan ajax
                $.ajax({
                    url: "<?= base_url(); ?>app/add_to_cart",
                    method: "POST",
                    //kirim data ke server
                    data: {
                        product_id: product_id,
                        name: name,
                        price: price,
                        quantity: quantity
                    },
                    //jika berhasil
                    success: function(data) {
                        alert("Produk telah ditambahkan ke keranjang!");
                        $("#cart_detail").html(data);
                        $("#" + product_id).val('');
                    }
                });
            } else {
                alert("Silahkan masukkan quantity!");
            }
        });
        // load data
        $("#cart_detail").load("<?= base_url(); ?>keranjang_belanja/load");

        //request remove product dari keranjang
        $(document).on('click', '.remove_inventory', function() {
            var row_id = $(this).attr("id");
            if (confirm("apakah kamu mau hapus item ini?")) {
                $.ajax({
                    url: "<?= base_url(); ?>/keranjang_belanja/remove",
                    method: "POST",
                    data: {
                        row_id: row_id
                    },
                    success: function(data) {
                        alert("product dihapus dari keranjang belanja");
                        $("#cart_detail").html(data);
                    }
                });
            } else {
                return false;
            }
        });

        // request kosongkan keranjang
        $(document).on("click", "#clear_cart", function() {
            if (confirm("Anda mau mengosongkan keranjang?")) {
                $.ajax({
                    url: "<?= base_url(); ?>/keranjang_belanja/clear_cart",
                    success: function(data) {
                        alert("keranjang telah kosong!");
                        $("#cart_detail").html(data);
                    }
                });
            } else {
                return false;
            }
        });
    });
</script>
