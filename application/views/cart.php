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
                <div id="cart_detail">
                    <h3 class="text-center">Keranjang kosong</h3>
                </div>
            </div>
	</div>

    </div>
</div>

<!-- <script>
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
        $("#cart_detail").load_cart("<?= base_url(); ?>cart/load_cart");

        //request remove product dari keranjang
        $(document).on('click', '.remove_inventory', function() {
            var row_id = $(this).attr("id");
            if (confirm("apakah kamu mau hapus item ini?")) {
                $.ajax({
                    url: "<?= base_url(); ?>/cart/remove_cart",
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
                    url: "<?= base_url(); ?>/cart/clear_cart",
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
</script> -->
