<!DOCTYPE html>
<html lang="en" data-theme="" class="bg-slate-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OfiiceSentry</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="/resources/css/style.css" rel="stylesheet">
</head>

<body class="container m-auto">
    <!-- Header Section Start -->
    <header>
        <div class="container m-auto">
            <nav class="fixed w-full z-20 top-0 start-0 bg-opacity-90 backdrop-blur-md dark:bg-opacity-50 shadow">
                <div
                    class="container mx-auto flex flex-wrap items-center justify-between mx-auto p-4 transition duration-300 ease-in-out">
                    <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img src="/img/bkpm.png" class="h-14 w-24" alt="">
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
                    </a>
                    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        <a href="/login" type="button"
                            class="text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-8 py-2 text-center dark:bg-cyan-500 dark:hover:bg-cyan-600 dark:focus:ring-cyan-700">Login
                        </a>
                        <button id="burger-menu" type="button"
                            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            aria-controls="navbar-sticky" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                        </button>
                        <div class="container">
                            <div id="dropdown-menu"
                                class="hidden md:hidden absolute top-full left-0 w-full bg-white shadow-md dark:bg-gray-800 z-30">
                                <ul class="py-2 px-4">
                                    <li><a href="#"
                                            class="block py-2 px-3 text-white hover:text-cyan-600">Home</a></li>
                                    <li><a href="#"
                                            class="block py-2 px-3 text-white hover:text-cyan-600">About</a></li>
                                    <li><a href="#"
                                            class="block py-2 px-3 text-white hover:text-cyan-600">Features</a></li>
                                    <li><a href="#"
                                            class="block py-2 px-3 text-white hover:text-cyan-600">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 transition duration-300 ease-in-out"
                        id="navbar-sticky">
                        <ul
                            class="flex flex-col p-4 md:p-0 mt-4 font-medium md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0">
                            <li>
                                <a href="#home"
                                    class="block py-2 px-3 text-white bg-cyan-700 rounded md:bg-transparent md:text-cyan-700 md:p-0 md:dark:text-cyan-500"
                                    aria-current="page">Home</a>
                            </li>
                            <li>
                                <a href="#About"
                                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-cyan-700 md:p-0 md:dark:hover:text-cyan-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                            </li>
                            <li>
                                <a href="#features"
                                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-cyan-700 md:p-0 md:dark:hover:text-cyan-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Features</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-cyan-700 md:p-0 md:dark:hover:text-cyan-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
        </div>
        </nav>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Start -->
    <section id="home" class="pt-36 pb-36">
        <div class="absolute inset-0 bg-cover bg-center z-[-1]" style="background-image: url('/img/landingpage.png');">
            <!-- Overlay transparan untuk membuat gambar terlihat gelap -->
            <div class="absolute inset-0 bg-black opacity-30"></div>
            <div class="container relative z-10">
                {{-- hanya untuk menambah space --}}
            </div>
    </section>

    <section id="" class="pt-36 pb-32">
        <div class="container">
            <h4 class="font-bold text-4xl mb-3 ml-2 lg:ml-0 md:ml-0 sm:ml-2">
                <span style="color: aqua;">OfficeSentry</span>
            </h4>
            <h2
                class=" font-weight-bolder text-white lg:text-aqua text-3xl mb-5 max-w-lg lg:text-4xl ml-2 lg:ml-0 md:ml-0 sm:ml-2">
                Inovasi dalam Manajemen dan Pemantauan
                <span style="color: aqua;">Office Boy</span>
            </h2>
            <p class="font-med text-white text-base max-w-xl lg:text-lg"></p>
        </div>
    </section>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
        class="absolute bottom-12 left-0 right-0 transform translate-y-1/2">
        <path fill="#0f172a" fill-opacity="1"
            d="M0,160L48,154.7C96,149,192,139,288,144C384,149,480,171,576,186.7C672,203,768,213,864,202.7C960,192,1056,160,1152,154.7C1248,149,1344,171,1392,181.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>
    <!-- Hero Section End -->

    <section id="" class="pt-24 pb-14">

    </section>
    <!-- About Section Start -->
    <section id="About" class="py-10 bg-transparent sm:py-16 lg:py-24 pt-24 pb-24 rounded-lg">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid items-center grid-cols-1 lg:grid-cols-2 gap-x-12 xl:gap-x-24 gap-y-12">
                <div class="relative lg:mb-12">
                    <img class="absolute -right-0 -bottom-8 xl:-bottom-12 xl:-right-4"
                        src="https://cdn.rareblocks.xyz/collection/celebration/images/content/3/dots-pattern.svg"
                        alt="" />
                    <div class="pl-24 pr-12">
                        <img class="relative rounded-xl"
                            src="https://cdn.rareblocks.xyz/collection/celebration/images/content/3/girl-working-on-laptop.jpg"
                            alt="" />
                    </div>
                    <div class="absolute left-0 pr-12 bottom-8 xl:bottom-20">
                        <div class="max-w-xs bg-blue-600 rounded-lg sm:max-w-md xl:max-w-md">
                            <div class="px-3 py-4 sm:px-5 sm:py-8">
                                <div class="flex items-start">
                                    <p class="text-3xl sm:text-4xl">👋</p>
                                    <blockquote class="ml-5">
                                        <p class="text-sm font-medium text-white sm:text-lg">"Tingkatkan Efisiensi dan
                                            Produktivitas dengan Office Sentry Solusi Monitoring Office Boy Terdepan."
                                        </p>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="2xl:pl-16">
                    <h2 class="text-3xl font-bold leading-tight text-white sm:text-4xl lg:text-5xl lg:leading-tight">
                        About OfficeSentry</h2>
                    <p class="text-lg leading-relaxed text-gray-400 mt-9">OfficeSentry adalah aplikasi inovatif yang
                        dirancang khusus untuk membantu Anda mengelola dan memantau kinerja Office Boy di kantor Anda
                        dengan lebih efisien.</p>
                    <p class="mt-6 text-lg leading-relaxed text-gray-400">Dengan fokus pada kemudahan penggunaan dan
                        fungsionalitas yang handal, OfficeSentry memberikan solusi yang cerdas dan terintegrasi untuk
                        memenuhi kebutuhan manajemen harian Anda.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-10 bg-transparent sm:py-16 lg:py-24 pt-24 pb-24">
        <div class="max-w-5xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="grid items-center grid-cols-1 gap-y-6 md:grid-cols-2 md:gap-x-20">
                <div class="">
                    <h2 class="text-3xl font-bold leading-tight text-white sm:text-4xl lg:text-5xl">Pemantauan Setiap
                        Saat.</h2>
                    <p class="mt-9 text-lg leading-relaxed text-gray-400">Di dunia yang serba cepat ini, manajemen dan
                        monitoring kinerja karyawan menjadi kunci kesuksesan setiap bisnis. Dengan Office Sentry, Anda
                        mengambil langkah revolusioner dalam mengelola dan meningkatkan produktivitas tim office boy
                        Anda. </p>
                </div>

                <div class="relative pl-20 pr-6 sm:pl-6 md:px-0">
                    <div class="relative w-full max-w-xs mt-4 mb-10 ml-auto">
                        <img class="ml-auto rounded-xl"
                            src="https://cdn.rareblocks.xyz/collection/celebration/images/features/1/person.jpg"
                            alt="" />

                        <img class="absolute -top-4 -left-12"
                            src="https://cdn.rareblocks.xyz/collection/celebration/images/features/1/wavey-lines.svg"
                            alt="" />

                        {{-- <div class="absolute -bottom-10 -left-16">
                            <div class="bg-yellow-300">
                                <div class="px-8 py-10">
                                    <span class="block text-4xl font-bold text-black lg:text-5xl"> 53% </span>
                                    <span class="block mt-2 text-base leading-tight text-black"> High
                                        Conversions<br />Everything </span>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Features Start -->
    <section id="features" class="py-36 bg-transparent sm:py-36 lg:py-36">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold leading-tight text-white sm:text-4xl xl:text-5xl font-pj">Our Features
                </h2>
                <p class="mt-4 text-base leading-7 text-white sm:mt-8 font-pj"></p>
            </div>

            <div
                class="grid grid-cols-1 mt-10 text-center sm:mt-16 sm:grid-cols-2 sm:gap-x-12 gap-y-12 md:grid-cols-3 md:gap-0 xl:mt-24">
                <div class="md:p-8 lg:p-14">
                    <svg class="mx-auto" width="46" height="46" viewBox="0 0 46 46" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M45 29V23C45 10.85 35.15 1 23 1C10.85 1 1 10.85 1 23V29" stroke="#ffffff"
                            stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M13 29H1V41C1 43.209 2.791 45 5 45H13V29Z" fill="#D4D4D8" stroke="#ffffff"
                            stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M45 29H33V45H41C43.209 45 45 43.209 45 41V29Z" fill="#D4D4D8" stroke="#ffffff"
                            stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <h3 class="mt-12 text-xl font-bold text-white font-pj">Pemantauan Real-Time</h3>
                    <p class="mt-5 text-base text-gray-600 font-pj"> Dapatkan update instan mengenai tugas dan lokasi
                        office boy Anda. Dengan Office Sentry, Anda selalu dalam kendali penuh.</p>
                </div>

                <div class="md:p-8 lg:p-14 md:border-l md:border-gray-200">
                    <svg class="mx-auto" width="44" height="44" viewBox="0 0 44 44" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M25 7C34.941 7 43 15.059 43 25C43 34.941 34.941 43 25 43C15.059 43 7 34.941 7 25"
                            stroke="#ffffff" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M19 1C9.059 1 1 9.059 1 19H19V1Z" fill="#D4D4D8" stroke="#ffffff" stroke-width="2"
                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <h3 class="mt-12 text-xl font-bold text-white font-pj">Pengaturan Tugas Otomatis</h3>
                    <p class="mt-5 text-base text-gray-600 font-pj">Lupakan pengaturan tugas manual yang memakan waktu.
                        Sistem kami memungkinkan penugasan otomatis berdasarkan algoritma canggih yang memastikan
                        distribusi kerja yang adil dan efisien.</p>
                </div>

                <div class="md:p-8 lg:p-14 md:border-l md:border-gray-200">
                    <svg class="mx-auto" width="42" height="42" viewBox="0 0 42 42" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M41 1H1V41H41V1Z" stroke="#ffffff" stroke-width="2" stroke-miterlimit="10"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M18 7H7V20H18V7Z" stroke="#ffffff" stroke-width="2" stroke-miterlimit="10"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M18 26H7V35H18V26Z" stroke="#ffffff" stroke-width="2" stroke-miterlimit="10"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M35 7H24V35H35V7Z" fill="#D4D4D8" stroke="#ffffff" stroke-width="2"
                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <h3 class="mt-12 text-xl font-bold text-white font-pj">Pelaporan Terperinci</h3>
                    <p class="mt-5 text-base text-gray-600 font-pj">Setiap office boy wajib mengirimkan bukti
                        pekerjaan. Foto-foto tersebut akan tersimpan dalam sistem dan dapat diakses kapan saja,
                        memberikan transparansi total dalam setiap aspek operasional.</p>
                </div>

                <div class="md:p-8 lg:p-14 md:border-t md:border-gray-200">
                    <svg class="mx-auto" width="42" height="42" viewBox="0 0 42 42" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.66667 25H6C3.23858 25 1 27.2386 1 30V37C1 39.7614 3.23858 42 6 42H36C38.7614 42 41 39.7614 41 37V30C41 27.2386 38.7614 25 36 25H31.8333C30.2685 25 29 26.2685 29 27.8333C29 29.3981 27.7315 30.6667 26.1667 30.6667H15.3333C13.7685 30.6667 12.5 29.3981 12.5 27.8333C12.5 26.2685 11.2315 25 9.66667 25Z"
                            fill="#D4D4D8" />
                        <path d="M9 9H33" stroke="#ffffff" stroke-width="2" stroke-miterlimit="10"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9 17H33" stroke="#ffffff" stroke-width="2" stroke-miterlimit="10"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M1 25H13V31H29V25H41" stroke="#ffffff" stroke-width="2" stroke-miterlimit="10"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M37 1H5C2.79086 1 1 2.79086 1 5V37C1 39.2091 2.79086 41 5 41H37C39.2091 41 41 39.2091 41 37V5C41 2.79086 39.2091 1 37 1Z"
                            stroke="#ffffff" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <h3 class="mt-12 text-xl font-bold text-white font-pj">Reset dan Penugasan Ulang Otomatis</h3>
                    <p class="mt-5 text-base text-gray-600 font-pj">Sistem kami secara otomatis mereset tugas setiap
                        hari, memastikan bahwa setiap hari adalah awal yang baru, dengan tugas-tugas yang terorganisir
                        dengan baik.</p>
                </div>

                <div class="md:p-8 lg:p-14 md:border-l md:border-gray-200 md:border-t">
                    <svg class="mx-auto" width="46" height="42" viewBox="0 0 46 42" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M30.562 18.4609C30.0511 17.9392 29.4292 17.5392 28.7426 17.2907C28.0559 17.0422 27.3221 16.9516 26.5956 17.0256C25.8692 17.0996 25.1687 17.3362 24.5462 17.718C23.9237 18.0998 23.3952 18.6169 23 19.2309C22.6049 18.6167 22.0764 18.0995 21.4539 17.7176C20.8315 17.3357 20.1309 17.099 19.4044 17.025C18.6779 16.951 17.944 17.0417 17.2573 17.2903C16.5706 17.5389 15.9488 17.939 15.438 18.4609C14.5163 19.4035 14.0002 20.6695 14.0002 21.9879C14.0002 23.3063 14.5163 24.5722 15.438 25.5149L23 33.1999L30.564 25.5159C31.485 24.5726 32.0004 23.3064 32 21.988C31.9997 20.6696 31.4835 19.4037 30.562 18.4609Z"
                            fill="#D4D4D8" stroke="#ffffff" stroke-width="2" stroke-miterlimit="10"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M41 41H5C3.93913 41 2.92172 40.5786 2.17157 39.8284C1.42143 39.0783 1 38.0609 1 37V1H17L22 9H45V37C45 38.0609 44.5786 39.0783 43.8284 39.8284C43.0783 40.5786 42.0609 41 41 41Z"
                            stroke="#ffffff" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <h3 class="mt-12 text-xl font-bold text-white font-pj">Interface yang Ramah Pengguna</h3>
                    <p class="mt-5 text-base text-gray-600 font-pj">Desain aplikasi kami intuitif, memudahkan setiap
                        anggota tim Anda untuk mengadaptasi dan menggunakan Office Sentry dengan efektif.</p>
                </div>

                <div class="md:p-8 lg:p-14 md:border-l md:border-gray-200 md:border-t">
                    <svg class="mx-auto" width="46" height="46" viewBox="0 0 46 46" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M27 27H19V45H27V27Z" stroke="#ffffff" stroke-width="2" stroke-miterlimit="10"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9 37H1V45H9V37Z" fill="#D4D4D8" stroke="#ffffff" stroke-width="2"
                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M45 17H37V45H45V17Z" fill="#D4D4D8" stroke="#ffffff" stroke-width="2"
                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        {{-- <path d="M5 17L15 7L23 15L37 1" stroke="#ffffff" stroke-width="2" stroke-miterlimit="10"
                        stroke-linecap="round" stroke-linejoin="round" /> --}}
                        {{-- <path d="M28 1H37V10" stroke="#ffffff" stroke-width="2" stroke-miterlimit="10"
                        stroke-linecap="round" stroke-linejoin="round" /> --}}
                    </svg>
                    <h3 class="mt-12 text-xl font-bold text-white font-pj">Analisis Kinerja Canggih</h3>
                    <p class="mt-5 text-base text-gray-600 font-pj">Dengan fitur Analisis Kinerja kami, Anda dapat
                        mengukur efektivitas operasional tim office boy Anda melalui berbagai metrik dan laporan yang
                        komprehensif.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Features End -->

    {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
        class="absolute left-0 right-0 transform translate-y-1/2">
        <path fill="#020617" fill-opacity="1"
            d="M0,160L48,154.7C96,149,192,139,288,144C384,149,480,171,576,186.7C672,203,768,213,864,202.7C960,192,1056,160,1152,154.7C1248,149,1344,171,1392,181.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg> --}}

    <!-- Footer Section Start -->
    <section id="" class="pt-24 pb-24 m-auto">
        <div class="absolute left-0 right-0 transform translate-y-1/2">
            <footer class="bg-white dark:bg-slate-950">
                <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
                    <div class="md:flex md:justify-between">
                        <div class="mb-6 md:mb-0">
                            <a href="https://flowbite.com/" class="flex items-center">
                                <img src="/img/bkpm.png" class="h-14 w-24" alt="">
                                <span
                                    class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
                            </a>
                        </div>
                        <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                            <div>
                                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                                    Resources
                                </h2>
                                <ul class="text-gray-500 dark:text-gray-400 font-medium">
                                    <li class="mb-4">
                                        <a href="https://flowbite.com/" class="hover:underline">Flowbite</a>
                                    </li>
                                    <li>
                                        <a href="https://tailwindcss.com/" class="hover:underline">Tailwind CSS</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow
                                    us
                                </h2>
                                <ul class="text-gray-500 dark:text-gray-400 font-medium">
                                    <li class="mb-4">
                                        <a href="https://github.com/themesberg/flowbite"
                                            class="hover:underline ">Github</a>
                                    </li>
                                    <li>
                                        <a href="https://discord.gg/4eeurUVvTy" class="hover:underline">Discord</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal
                                </h2>
                                <ul class="text-gray-500 dark:text-gray-400 font-medium">
                                    <li class="mb-4">
                                        <a href="#" class="hover:underline">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href=""
                                class="hover:underline">KemeninvesBPKM</a>. All Rights
                            Reserved.
                        </span>
                        <div class="flex mt-4 sm:justify-center sm:mt-0">
                            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 8 19">
                                    <path fill-rule="evenodd"
                                        d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Facebook page</span>
                            </a>
                            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 21 16">
                                    <path
                                        d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                                </svg>
                                <span class="sr-only">Discord community</span>
                            </a>
                            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 17">
                                    <path fill-rule="evenodd"
                                        d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Twitter page</span>
                            </a>
                            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">GitHub account</span>
                            </a>
                            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Dribbble account</span>
                            </a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </section>
    <!-- Footer Section End -->


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const section = document.querySelector("section");
            section.classList.add("show");
        });

        document.addEventListener("DOMContentLoaded", function() {
            const burgerMenu = document.getElementById("burger-menu");
            const dropdownMenu = document.getElementById("dropdown-menu");

            burgerMenu.addEventListener("click", function() {
                dropdownMenu.classList.toggle("hidden");
            });
        });
    </script>
    {{-- <script src="/resources/js/dropDown.js"></script> --}}
</body>

</html>
