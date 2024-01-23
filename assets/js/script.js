//NAV SIDEBAR
// function toggleMenu() {
// 	console.log("Tombol Ikon Menu Diklik");

// 	var navList = document.querySelector(".nav-list");
// 	navList.classList.toggle("show");
// }
document.addEventListener("DOMContentLoaded", function () {
	const toggleButton = document.getElementById("toggleButton");
	const menu = document.getElementById("menu");
	console.log("Tombol Ikon Menu Diklik");

	toggleButton.addEventListener("click", function () {
		menu.classList.toggle("hidden");
	});
});
// CART
function increase1Value() {
	var value = parseInt(document.getElementById("number1").value, 10);
	value = isNaN(value) ? 0 : value;
	value++;
	document.getElementById("number1").value = value;
}

function decrease1Value() {
	var value = parseInt(document.getElementById("number1").value, 10);
	value = isNaN(value) ? 0 : value;
	value < 1 ? (value = 1) : "";
	value--;
	document.getElementById("number1").value = value;
}

function increase2Value() {
	var value = parseInt(document.getElementById("number2").value, 10);
	value = isNaN(value) ? 0 : value;
	value++;
	document.getElementById("number2").value = value;
}

function decrease2Value() {
	var value = parseInt(document.getElementById("number2").value, 10);
	value = isNaN(value) ? 0 : value;
	value < 1 ? (value = 1) : "";
	value--;
	document.getElementById("number2").value = value;
}

function increase3Value() {
	var value = parseInt(document.getElementById("number").value, 10);
	value = isNaN(value) ? 0 : value;
	value++;
	document.getElementById("number").value = value;
}

function decrease3Value() {
	var value = parseInt(document.getElementById("number").value, 10);
	value = isNaN(value) ? 0 : value;
	value < 1 ? (value = 1) : "";
	value--;
	document.getElementById("number").value = value;
}

// Back Button
document.addEventListener("DOMContentLoaded", function () {
	var backBtn = document.getElementById("backBtn");

	if (backBtn) {
		backBtn.addEventListener("click", function () {
			// Logic to go back
			window.history.back();
		});
	}
});

// OPEN CLOSE MODAL
document.addEventListener('DOMContentLoaded', function () {
	var openModalBtn = document.getElementById('openModalBtn');
	var closeModalBtn = document.getElementById('closeModalBtn');
	var modal = document.getElementById('myModal');
  
	openModalBtn.addEventListener('click', function () {
	  modal.style.display = 'block';
	});
  
	closeModalBtn.addEventListener('click', function () {
	  modal.style.display = 'none';
	});
  
	window.addEventListener('click', function (event) {
	  if (event.target === modal) {
		modal.style.display = 'none';
	  }
	});
  });
  


document.addEventListener("DOMContentLoaded", function () {
	// Ambil elemen tombol dan daftar pilihan metode pembayaran
	var showPaymentOptionsBtn = document.getElementById("showPaymentOptionsBtn");
	var paymentOptions = document.getElementById("paymentOptions");

	// Tambahkan event listener untuk mengubah tampilan daftar pilihan
	showPaymentOptionsBtn.addEventListener("click", function () {
		// Toggle (sembunyikan/tampilkan) daftar pilihan metode pembayaran
		paymentOptions.classList.toggle("hidden");
	});
});
