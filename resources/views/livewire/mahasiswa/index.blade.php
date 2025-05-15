<div wire:poll>
    <div class="container max-w-6xl mx-auto">
        <div class="grid grid-cols-1 gap-7 md:grid-cols-2">
            <section class="bio">
                <div class="p-5 bg-white rounded shadow-xl">
                    <section class="mb-2 text-sm font-semibold header">
                        Biodata Mahasiswa
                    </section>
                    <hr class="h-px mb-3 bg-gray-200 border-0 dark:bg-gray-700">
                    <section class="flex flex-row gap-5 bio">
                        @php
                            $url = str_replace('uc', 'thumbnail', Auth::guard('mahasiswa')->user()->foto);
                        @endphp
                        <img src="{{ $url }}" alt="" class="w-20 h-20 rounded-2xl ">
                        <section class="w-full text-xs uppercase data">
                            <div class="flex flex-col mb-2">
                                <div class="font-semibold">
                                    Nomor Induk Mahasiswa
                                </div>
                                <div>
                                    {{ Auth::guard('mahasiswa')->user()->nim }}
                                </div>
                            </div>
                            <hr class="h-px mb-3 bg-gray-200 border-0 dark:bg-gray-700">
                            <div class="flex flex-col mb-2">
                                <div class="font-semibold">
                                    Nama
                                </div>
                                <div>
                                    {{ Auth::guard('mahasiswa')->user()->nama }}
                                </div>
                            </div>
                            <hr class="h-px mb-3 bg-gray-200 border-0 dark:bg-gray-700">
                            <div class="flex flex-col mb-2">
                                <div class="font-semibold">
                                    Program Studi
                                </div>
                                <div>
                                    {{ Auth::guard('mahasiswa')->user()->prodi->name_prodi }}
                                </div>
                            </div>
                            <hr class="h-px mb-3 bg-gray-200 border-0 dark:bg-gray-700">
                            <div class="flex flex-col mb-2">
                                <div class="font-semibold">
                                    Fakultas
                                </div>
                                <div>
                                    {{ Auth::guard('mahasiswa')->user()->prodi->fakultas->name }}
                                </div>
                            </div>
                            <hr class="h-px mb-3 bg-gray-200 border-0 dark:bg-gray-700">
                            <div class="flex flex-col mb-2">
                                <div class="font-semibold">
                                    Semester
                                </div>
                                <div>
                                    {{ Auth::guard('mahasiswa')->user()->semester }}
                                </div>
                            </div>
                            <hr class="h-px mb-3 bg-gray-200 border-0 dark:bg-gray-700">
                            <div class="flex flex-col mb-2">
                                <div class="font-semibold">
                                    Kelompok UKT - Besaran UKT
                                </div>
                                <div>
                                    UKT {{ Auth::guard('mahasiswa')->user()->ukt }} -
                                    {{ format_rupiah(Auth::guard('mahasiswa')->user()->jml_ukt_awal) }}
                                </div>
                            </div>
                            <hr class="h-px mb-3 bg-gray-200 border-0 dark:bg-gray-700">
                        </section>
                    </section>
                </div>
            </section>
            <section class="riwayat">
                <div class="min-h-full p-5 overflow-hidden bg-white rounded shadow-xl">
                    <section class="mb-2 text-sm font-semibold header">
                        Riwayat Pengajuan
                    </section>
                    <hr class="h-px mb-3 bg-gray-200 border-0 dark:bg-gray-700">
                    @foreach ($data as $item)
                        {{ $item }}
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</div>
