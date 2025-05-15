<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Penyesuaian UKT - Universitas Islam Negeri Sultan Syarif Kasim Riau</title>
    <link rel="stylesheet" href="https://api.fontshare.com/v2/css?f[]=clash-display@600&display=swap">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-[#F1F4F5] font-['Poppins']">
    <nav x-data="{ isOpen: false }" class="flex flex-row items-center justify-between max-w-6xl px-5 mx-auto mt-5 mb-20">
        <div class="flex flex-row items-center gap-x-3">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="h-[60px]">
            <div class="hidden lg:block">
                <div class="flex flex-col gap-y-1">
                    <h3 class="text-base font-semibold leading-none md:block lg:block text-indigo-950">Sistem Informasi
                        Penyesuaian UKT</h3>
                    <h4 class="text-sm font-semibold leading-none md:block lg:block text-indigo-950">Universitas Islam
                        Negeri Sultan Syarif Kasim Riau</h4>
                </div>
            </div>
            <div class="lg:hidden">
                <div class="flex flex-col gap-y-1">
                    <h3 class="text-base font-semibold leading-none md:block lg:block text-indigo-950">SIP-UKT</h3>
                    <h4 class="text-sm font-semibold leading-none md:block lg:block text-indigo-950">UIN SUSKA Riau</h4>
                </div>
            </div>
        </div>
        <div class="flex flex-row items-center justify-between gap-x-7">
            <div class="flex flex-col w-full lg:flex-row">
                <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 mt-10 ' : 'opacity-0 -translate-x-full']" class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white dark:bg-gray-800 md:mt-0 md:p-0 md:top-0 md:relative md:bg-transparent md:w-auto md:opacity-100 md:translate-x-0 md:flex md:items-center">
                    <div class="flex flex-col md:flex-row md:mx-6">
                        <a @click="isOpen = !isOpen" href="#beranda" class="my-2 text-sm font-semibold md:mx-2 md:my-0 text-indigo-950 hover:text-green-700">Beranda</a>
                        <a @click="isOpen = !isOpen" href="#ketentuan" class="my-2 text-sm font-semibold md:mx-2 md:my-0 text-indigo-950 hover:text-green-700">Syarat & Ketentuan</a>
                        <a @click="isOpen = !isOpen" href="#tanggal" class="my-2 text-sm font-semibold md:mx-2 md:my-0 text-indigo-950 hover:text-green-700">Tanggal Penting</a>
                    </div>
                </div>
            </div>
            <a href="{{ route('login-mahasiswa') }}" wire:navigate
                class="py-2 text-sm font-semibold text-white bg-indigo-950 px-7 rounded-xl hover:bg-green-700">Daftar</a>
                <div class="flex md:hidden lg:hidden">
                    <button x-cloak @click="isOpen = !isOpen" type="button" class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
                        <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                        </svg>

                        <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
        </div>
    </nav>

    <section class="max-w-6xl py-5 mx-auto hero" id="beranda" name="beranda">
        <div class="grid grid-cols-1 md:grid-cols-2 aspect-auto lg:grid-cols-2">
            <div class="flex flex-col justify-center p-5 gap-y-5">
                <div class="flex flex-col gap-y-3">
                    <h1 class="text-indigo-950 font-['Clash_Display'] text-3xl leading-nomal">
                        Penyesuaian UKT Universitas Islam Negeri Sultan Syarif Kasim Riau Tahun Akademik 2024/2025
                        Semester Ganjil
                    </h1>
                    <p class="text-sm leading-normal text-gray-500">
                        Surat Keputusan Rektor Tentang Penyesuaian UKT<br>
                        TA. 2024/2025, Silahkan klik link di bawah
                    </p>
                </div>
                <div class="flex flex-row gap-x-5">
                    <a href="#"
                        class="py-2 text-sm font-semibold text-white rounded-full bg-violet-950 px-7 hover:bg-indigo-700">Surat
                        Keputusan Rektor UIN SUSKA Riau</a>
                </div>
            </div>
            <div class="flex flex-row items-center justify-center object-scale-down p-5">
                <img src="{{ asset('assets/images/mhs-uin.jpg') }}" class="h-[550px] rounded-2xl" />
            </div>
        </div>
    </section>
    <section class="flex flex-col max-w-6xl p-5 pt-10 mx-auto faq gap-y-5" id="ketentuan" name="ketentuan">
        <h3 class="text-indigo-950 font-['Clash_Display'] text-5xl text-center">
            Syarat & Ketentuan
        </h3>
        <p class="text-sm leading-normal text-justify text-indigo-950">Penyesuaian Uang Kuliah Tunggal (UKT) merupakan mekanisme yang
            disediakan oleh UIN Sultan Syarif Kasim Riau kepada Mahasiswa yang mengalami perubahan kondisi ekonomi dan
            kemampuan Keuangan. Untuk mengajukan perubahan besaran Uang Kuliah Tunggal (UKT), Prosedur Penyesuaian Uang
            Kuliah Tunggal (UKT) Tahun @phpecho date('Y');

            @endphp adalah :</p>
        <ol class="pl-3 text-sm leading-normal text-justify list-decimal text-indigo-950">
            <li>
                Mahasiswa yang dapat Mengajukan Penyesuaian UKT Tahun @php echo date("Y")@endphp adalah Mahasiswa jenjang Diploma
                (D3) dan Jenjang Sarjana (S1) yang berstatus aktif pada Semester Genap Tahun Akademik
                @php echo date("Y")-1 @endphp/@php echo date("Y") @endphp dan tidak sedang menerima beasiswa.
            </li>
            <li>
                Pengajuan Penyesuaian UKT Tahun 2024 dilakukan secara online melalui portal
                https://sip-ukt.uin-suska.ac.id dengan login menggunakan akun iRaise.
            </li>
            <li>
                Mahasiswa mengupload file-file sebagai berikut :
                <ul class="list-disc list-uutside ps-3">
                    <li>
                        Surat Permohonan Penyesuaian UKT dari orang tua/wali mahasiswa ditujukan kepada Dekan Fakultas
                        yang bersangkutan <a class="text-red-500 hover:text-indigo-500 hover:font-semibold" href="https://docs.google.com/document/d/1f0MF4qyffF7BjWmJTyOiRvykf19zGgnT/edit?usp=drive_link&ouid=103428335033835886100&rtpof=true&sd=true" target="_blank">[Format Terlampir]</a>.
                    </li>
                    <li>
                        Scan Kartu Keluarga (KK) Asli dan KTP Orang Tua.
                    </li>
                    <li>
                        Scan asli rekening listrik 2 (Dua) bulan terakhir bagi pelanggan PLN Pasca bayar. Adapun bagi
                        pelanggan PLN Pra bayar (Pulsa), Scan rekening listrik diganti dengan Surat Pernyataan
                        Pengeluaran Biaya Listrik Selama 2 (dua) bulan terakhir yang ditandatangani oleh Kepala Keluarga
                        dan diketahui oleh Lurah setempat.
                    </li>
                    <li>
                        Scan asli slip gaji orang tua/Surat Keterangan Penghasilan Kurang Mampu dari Lurah setempat.
                    </li>
                    <li>
                        Scan asli Surat Kematian orang tua/wali yang berada dalam satu KK dengan mahasiswa/Surat
                        Keterangan dari rumah sakit bagi orang tua/wali yang sakit permanen yang berada dalam satu KK
                        dengan mahasiswa/Surat keterangan PHK dari perusahaan bagi orang tua/wali yang berada dalam satu
                        KK dengan mahasiswa/Surat keterangan usaha orang tua/wali pailit dan berada dalam satu KK dengan
                        mahasiswa dari Lurah setempat.
                    </li>
                    <li>
                        Foto rumah yang terdiri dari ruang tamu, kamar tidur, ruang keluarga, dapur, depan rumah yang
                        menampakan keseluruhan sisi depan
                    </li>
                    <li>
                        Surat pernyataan tidak sedang menerima beasiswa dari pihak manapun <a class="text-red-500 hover:text-indigo-500 hover:font-semibold" href="https://docs.google.com/document/d/1gcgH492EqYSWZ72pM0GBWlYHG7p1y6LS/edit?usp=sharing&ouid=103428335033835886100&rtpof=true&sd=true" target="_blank">[Format Terlampir]</a>.
                    </li>
                    <li>
                        Surat pernyataan kebenaran data dan informasi <a class="text-red-500 hover:text-indigo-500 hover:font-semibold" href="https://docs.google.com/document/d/1-i3V1yn9lVAko4lCgfrIHkg2zMeQhFcN/edit?usp=sharing&ouid=103428335033835886100&rtpof=true&sd=true" target="_blank">[Format Terlampir]</a>.
                    </li>
                </ul>
            </li>
            <li>
                Penyesuaian UKT berlaku mulai Semester Ganjil Tahun Akademik 2024/2025.
            </li>
            <li>
                Penyesuaian UKT hanya berlaku bagi mahasiswa yang berada pada UKT 5,6,7 dan jika disetujui akan diturunkan
                1 tingkat.
            </li>
            <li>
                Penyesuaian UKT <strong>tidak berlaku</strong> bagi Mahasiswa yang diterima melalui <strong>Jalur Tulis (CAT)
                    Mandiri, Jalur Pascasarjana, Jalur Mahasiswa Luar Negeri, Jalur Mahasiswa Transfer</strong> dan yang <strong>sedang menerima beasiswa dari pihak manapun</strong>.
            </li>
            <li>
                Mahasiswa yang bisa mengajukan Penyesuaian UKT Minimal berada di Semester II (dua).
            </li>
            <li>
                Apabila ada ditemukan ketidaksesuaian antara dokumen yang diunggah oleh mahasiswa yang mengikuti pengajuan penyesuaian UKT dengan fakta sebenarnya dilapangan, maka mahasiswa
                yang bersangkutan akan digugurkan dan UKT yang bersangkutan akan dinaikkan 1 (satu) tingkat dari UKT awal.
            </li>
        </ol>
    </section>
    <section class="max-w-6xl py-12 mx-auto pendaftaran" id="tanggal" name="tanggal">
        <div>
            <h3 class="text-indigo-950 font-['Clash_Display'] text-5xl text-center">
                Tanggal Penting
            </h3>
            <div class="flex flex-row items-center justify-center px-10 py-12 gap-x-24">
                <div class="items-center hidden sm:hidden md:hidden lg:block">
                    <img src="{{ asset('assets/images/verification-img.png') }}"
                        class="h-[400px] w-[600px] rounded-xl" />
                </div>
                <div class="flex flex-col items-center justify-center px-5 gap-y-10">
                    <div class="flex flex-col gap-y-5">
                        <div class="flex flex-row items-center p-5 bg-white rounded-2xl gap-x-4">
                            <svg width="31" height="30" viewBox="0 0 31 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="30" width="30" height="30" rx="15"
                                    transform="rotate(-90 0.5 30)" fill="white" />
                                <path
                                    d="M13.2125 9.05994L18.1025 13.9499C18.68 14.5274 18.68 15.4724 18.1025 16.0499L13.2125 20.9399"
                                    stroke="#080C2E" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <div class="flex flex-col">
                                <h3 class="text-xl font-bold">
                                    27 Mei 2024
                                </h3>
                                <p class="text-sm leading-none text-gray-500">
                                    Pengumuman Pembukaan Pendaftaran
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-row items-center p-5 bg-white rounded-2xl gap-x-4">
                            <svg width="31" height="30" viewBox="0 0 31 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="30" width="30" height="30" rx="15"
                                    transform="rotate(-90 0.5 30)" fill="white" />
                                <path
                                    d="M13.2125 9.05994L18.1025 13.9499C18.68 14.5274 18.68 15.4724 18.1025 16.0499L13.2125 20.9399"
                                    stroke="#080C2E" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <div class="flex flex-col">
                                <h3 class="text-xl font-bold">
                                    28 Mei - 10 Juni 2024
                                </h3>
                                <p class="text-sm leading-none text-gray-500">
                                    Pengajuan Dokumen Secara Online
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-row items-center p-5 bg-white rounded-2xl gap-x-4">
                            <svg width="31" height="30" viewBox="0 0 31 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="30" width="30" height="30" rx="15"
                                    transform="rotate(-90 0.5 30)" fill="white" />
                                <path
                                    d="M13.2125 9.05994L18.1025 13.9499C18.68 14.5274 18.68 15.4724 18.1025 16.0499L13.2125 20.9399"
                                    stroke="#080C2E" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <div class="flex flex-col">
                                <h3 class="text-xl font-bold">
                                    28 Mei - 13 Juni 2024
                                </h3>
                                <p class="text-sm leading-none text-gray-500">
                                    Verifikasi Dokumen Oleh Fakultas
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-row items-center p-5 bg-white rounded-2xl gap-x-4">
                            <svg width="31" height="30" viewBox="0 0 31 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="30" width="30" height="30" rx="15"
                                    transform="rotate(-90 0.5 30)" fill="white" />
                                <path
                                    d="M13.2125 9.05994L18.1025 13.9499C18.68 14.5274 18.68 15.4724 18.1025 16.0499L13.2125 20.9399"
                                    stroke="#080C2E" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <div class="flex flex-col">
                                <h3 class="text-xl font-bold">
                                    18 Juni 2024
                                </h3>
                                <p class="text-sm leading-none text-gray-500">
                                    Pengumuman
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="footer w-screen bg-[#080C2E]">
        <div class="grid max-w-6xl py-6 pt-20 mx-auto">
            <div class="flex flex-col px-10 company-logo gap-y-7">
                <div class="flex flex-row items-center gap-x-3">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="" class="h-[60px]">
                    <div class="flex flex-col gap-y-1">
                        <h3 class="text-xl leading-none text-white md:text-2xl">Bagian Keuangan Rektorat</h3>
                        <h4 class="text-xs leading-normal text-white md:text-sm">Universitas Islam Negeri Sultan Syarif Kasim Riau
                        </h4>
                    </div>
                </div>
                <p class="text-sm leading-tight text-gray-500 break-all">
                    Jl. H.R. Soebrantas KM. 15 No. 155<br>
                    Kec. Tuah Madani - Pekanbaru - Riau<br>
                    Kode POS 28298 PO Box. 1004<br>
                </p>
            </div>
        </div>
        <div class="max-w-6xl mx-auto text-center text-[#8D90A8] text-sm pt-6 pb-10 px-10">
            All Rights Reserved • Copyright by Bagian Keuangan Rektorat Universitas Islam Negeri Sultan Syarif Kasim
            Riau
        </div>
    </section>
</body>
@livewireScripts
</html>
