<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kedai Kopi</title>
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/assets_user/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/style.css' ?>">
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    
	<style>
        .container {
  position: relative;
  
}

.absolute {
  position: absolute;
  left: 0;
}
    </style>
</head>

<body>
    <!-- NAVBAR HEADER  -->
    <header>
        <nav class="bg-white p-4 fixed top-0 w-full z-50">
            <div class="flex items-center justify-between">
                <div class="flex lg:flex-1">
                    <a href="<?= base_url('');?>" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="<?= base_url('/assets/images/aza_logo.png') ?>" alt="">
                    </a>
                </div>

                <div class="hidden lg:flex lg:gap-x-12">
                    <div class="relative z-50">
                        <button type="button"
                            class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900"
                            aria-expanded="false">
                            Product
                            <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                    </div>

                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Features</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Marketplace</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Company</a>
                    <div class="flex gap-2">
                        <h2 class="text-md font-medium text-gray-900">0</h2>
                        <a href="<?php echo base_url('app/cart/'); ?>">
                            <img class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                src="<?= base_url('/assets/icons/shopping-bag.png') ?>">
                        </a>
                    </div>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Log in <span
                            aria-hidden="true">&rarr;</span></a>
                </div>
                <!-- <div class="text-black font-bold text-xl">My Website</div> -->
                <div class="flex lg:hidden gap-4">
                    <div class="flex gap-2" id="cart">
                        <h2 class="text-md font-medium text-gray-900">0</h2>
                        <a href="<?php echo base_url('app/cart/'); ?>">
                            <img class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                src="<?= base_url('/assets/icons/shopping-bag.png') ?>">
                        </a>
                    </div>
                    <button id="toggleButton" class="text-black inset-y-0 z-50  focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                    <!-- <div class="fixed inset-0 z-10"></div> -->
                    <!-- <button type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button> -->


                    <!-- <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button> -->
                </div>
                <!-- <div class="hidden lg:flex space-x-4">
                    <a href="#" class="text-black">HOME</a>
                    <a href="#" class="text-black">About</a>
                    <a href="#" class="text-black">Contact</a>

                </div> -->
            </div>

            <div id="menu" class="hidden lg:hidden mt-4">

                <!-- Background backdrop, show/hide based on slide-over state. -->
                <div
                    class="fixed  right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                    <!-- <div class="flex items-center justify-between">
                            <a href="#" class="-m-1.5 p-1.5">
                                <span class="sr-only">Your Company</span>
                                <img class="h-8 w-auto"
                                    src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                            </a>
                            <button type="button" id="toggleButton" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                                <span class="sr-only">Close menu</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div> -->
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/10">
                            <div class="space-y-2 py-6">

                                <a href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>
                                <a href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Marketplace</a>
                                <a href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Company</a>
                            </div>
                            <div class="py-6">
                                <a href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log
                                    in</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </nav>
    </header>
