//NAV sideBar
// function toggleMenu() {
// 	console.log("Tombol Ikon Menu Diklik");

// 	var navList = document.querySelector(".nav-list");
// 	navList.classList.toggle("show");
// }
// document.addEventListener("DOMContentLoaded", function () {
// 	const toggleButton = document.getElementById("toggleButton");
// 	const menu = document.getElementById("menu");
// 	console.log("Tombol Ikon Menu Diklik");

// 	toggleButton.addEventListener("click", function () {
// 		menu.classList.toggle("hidden");
// 	});
// });
// CART

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
document.addEventListener("DOMContentLoaded", function () {
	var openModalBtn = document.getElementById("openModalBtn");
	var closeModalBtn = document.getElementById("closeModalBtn");
	var modal = document.getElementById("myModal");

	openModalBtn.addEventListener("click", function () {
		modal.style.display = "block";
	});

	closeModalBtn.addEventListener("click", function () {
		modal.style.display = "none";
	});

	window.addEventListener("click", function (event) {
		if (event.target === modal) {
			modal.style.display = "none";
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

document.addEventListener("DOMContentLoaded", function () {
	var sideBarHideBtn = document.getElementById("sideBarHideBtn");
	// console.log(sideBarHideBtn);
	var sideBar = document.getElementById("sideBar");
	// console.log(sideBar);
	var sliderBtn = document.getElementById("sliderBtn");

	sliderBtn.addEventListener("click", function () {
		sideBar.classList.remove("hidden");
	});

	sideBarHideBtn.addEventListener("click", function () {
		if (sideBar.classList.contains("hidden")) {
			sideBar.classList.remove("hidden");
		} else {
			sideBar.classList.add("hidden");
		}
	});
});

// document.addEventListener("DOMContentLoaded", function() {
// 	var sideBarHideBtn = document.getElementById("sideBarHideBtn");
// 	var sideBarShowBtn = document.getElementById("sideBarShowBtn");
// 	var sidebar = document.getElementById("sideBar");

// 	// Tambahkan event listener untuk tombol sidebar yang menampilkan sidebar
// 	sideBarShowBtn.addEventListener("click", function() {
// 		sidebar.classList.add("md:ml-0"); // Tampilkan sidebar pada tampilan desktop (lebar >= 768px)
// 	});

// 	// Tambahkan event listener untuk tombol sidebar yang menyembunyikan sidebar
// 	sideBarHideBtn.addEventListener("click", function() {
// 		sidebar.classList.remove("md:ml-0"); // Sembunyikan sidebar pada tampilan desktop (lebar >= 768px)
// 	});
// });

