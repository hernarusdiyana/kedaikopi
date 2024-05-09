
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js"></script> -->
<script src="<?php echo base_url() . 'assets/assets_user/js/bootstrap.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/assets_user/fontawesome-free-6.1.1-web/js/fontawesome.min.js' ?>"></script>
<script src="<?php echo base_url() . '/assets/js/jquery.js' ?>"></script>
<script src="<?php echo base_url() . '/assets/js/script.js' ?>"></script>

</body>

</html>

<script>
    $(document).ready(function() {
        $(".add_cart").click(function() {
            var product_id = $(this).data("productid");
            var name = $(this).data("name");
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
		//  $("#cart_detail").load("<?= base_url(); ?>app/load");

        //request remove product dari keranjang
		$(document).on("click", ".remove_inventory", function() {
			var row_id = $(this).attr("id");
			if (confirm("Anda yakin ingin menghapus item ini dari keranjang belanja?")) {
				$.ajax({
					url: '<?= base_url() ?>/app/remove_cart',
					method: 'post',
					data: {row_id: row_id},
					success: function(data) {
						alert("Item telah dihapus dari keranjang belanja!");
						// Perbarui tampilan keranjang belanja jika perlu
					}
				});
			}
		});

        // request kosongkan keranjang
        $(document).on("click", "#clear_cart", function() {
            if (confirm("Anda mau mengosongkan keranjang?")) {
                $.ajax({
					url: '<?= base_url() ?>/app/clear_cart',
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
