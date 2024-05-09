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
			<!-- Current page -->
			<li>
			<span class="text-gray-700">Order</span>
			</li>
			</ol>
		</div>
	</div>
	<!-- end breadcrumb -->
	<div class="space-y-2">
		<div class="mb-4">
			<h2 class="text-base font-semibold leading-7 text-gray-900">Daftar Orderan</h2>
			<!-- <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what you share.</p> -->
		</div>
	</div>
	<div class="">
		<table class="min-w-full border-collapse border border-slate-500" id="orderTable">
			<thead class="bg-white">
				<tr>
				<th class="p-3 whitespace-no-wrap text-xs leading-4 font-medium  border-b border-gray-200">Order ID</th>
				<th class="p-3 whitespace-no-wrap text-xs leading-4 font-medium  border-b border-gray-200">Date</th>
				<th class="p-3 whitespace-no-wrap text-xs leading-4 font-medium  border-b border-gray-200">Nama</th>
				<th class="p-3 whitespace-no-wrap text-xs leading-4 font-medium  border-b border-gray-200">Status</th>
				<th class="p-3 whitespace-no-wrap text-xs leading-4 font-medium  border-b border-gray-200">Nomor Meja</th>
				<th class="p-3 whitespace-no-wrap text-xs leading-4 font-medium  border-b border-gray-200">Notes</th>
				<th class="p-3 whitespace-no-wrap text-xs leading-4 font-medium  border-b border-gray-200">Metode Pembayaran</th>
				<th class="p-3 whitespace-no-wrap text-xs leading-4 font-medium  border-b border-gray-200">Total</th>
				<th class="p-3 whitespace-no-wrap text-xs leading-4 font-medium  border-b border-gray-200">Action</th>
				</tr>
			</thead>
				<tbody>
				<?php foreach($orders as $order):?>
				<tr>
				<td class="p-2 whitespace-no-wrap text-xs font-regular border-b border-gray-200"><?= $order->order_id?></td>
				<td class="p-2 whitespace-no-wrap text-xs font-regular border-b border-gray-200"><?= $order->order_date?></td>
				<td class="p-2 whitespace-no-wrap text-xs font-regular border-b border-gray-200"><?= $order->nama?></td>
				<td class="p-2 whitespace-no-wrap text-xs font-medium border-b border-gray-200">
					<div class="inline-block py-2 w-full text-center px-4 rounded-md  
						<?php if ($order->status === 'Lunas'): ?> bg-green-300 text-green-800 <?php endif;?>
						<?php if ($order->status === 'Belum Bayar'): ?> bg-yellow-300 text-yellow-800 <?php endif;?>
						<?php if ($order->status === 'Pending'): ?> bg-orange-300 text-orange-800 <?php endif;?>">
							<?= $order->status ?>
					</div>
				</td>
				<td class="p-2 whitespace-no-wrap text-xs text-center font-regular border-b border-gray-200"><?= $order->nomor_meja?></td>
				<td class="p-2 whitespace-no-wrap text-xs font-regular border-b border-gray-200"><?= $order->notes?></td>
				<td class="p-2 whitespace-no-wrap text-xs font-regular border-b border-gray-200"><?= $order->metode_pembayaran?></td>
				<td class="p-2 whitespace-no-wrap text-xs font-regular border-b border-gray-200">Rp <?= number_format($order->total, 0, ',', '.') ?></td>

				<td class="p-2 whitespace-no-wrap text-xs font-regular border-b border-gray-200">	
					<!-- <form class="updateStatusForm" data-order-id="<?= $order->order_id?>">
                            <select name="status">
                                <option value="Belum Bayar">Belum Bayar</option>
                                <option value="Lunas">Lunas</option>
                            </select>
                            <button type="submit">Update Status</button>
          </form> -->
					<?php 
					if ($order->status != 'Lunas'): ?>
						<button class="change-status bg-blue-500 p-3 rounded text-white" data-order-id="<?= $order->order_id; ?>">Selesaikan Pembayaran</button>
					<?php endif; ?>
				</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<!-- jQuery dan Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
	
	$(document).ready(function() {
		$('#orderTable').DataTable();

		$('button.change-status').click(function() {
			var order_id = $(this).data('order-id');
			var new_status = 'Lunas';

			$.ajax({
				url: '<?= base_url('admin/update_status'); ?>',
				type: 'POST',
				dataType: 'json',
				data: {order_id: order_id, new_status: new_status},
				success: function(response) {
					if(response.success) {
						alert('Status Order Berhasil Diubah');
						location.reload();
    
					} else {
						alert('Terjadi Kesalahan saat mengubah status order');
					}
				},
				error: function() {
					alert('terjadi kesalahan saat menghubungi server.');
				}
			});
		});
		// Update order status via Ajax
		$('.updateStatusForm').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                var orderId = $(this).data('order-id');
                $.ajax({
                    url: '<?= base_url('admin/update_status'); ?>/' + orderId,
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 'success') {
                            // Refresh order list
                            location.reload();
                        }
                    }
                });
            });
	});
function ubahStatus(order_id, status) {
    // Lakukan pengiriman AJAX ke controller CodeIgniter untuk menyimpan perubahan status
	

    $.ajax({
        url: "<?= base_url('admin/ubah_status'); ?>",
        method: "POST",
        data: { order_id: order_id, status: status },
        success: function(response) {
            
			alert(response);
			// refresh otomatis setelah status berhasil diubah
			location.reload();
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}
yi
function ubahStatusLunas(order_id) {
	$.ajax({
		url: "<?= base_url('admin/ubah_status'); ?>",
		method: "POST",
		data: {order_id: order_id, status: status},
		success: function(response) {
			pindahKeSales(order_id);
		},
		error: function(xhr,  status, error) {
			console.error(xhr.responseText);
		}
	});
}

function pindahKeSales(order_id) {
	$.ajax({
		url: "<?= base_url('admin/pindah_ke_sales'); ?>/" + order_id,
		method: 'GET',
		success: function(response) {
			alert(responsive);
		},
		error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

</script>
