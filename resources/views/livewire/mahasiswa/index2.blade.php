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
                    <section class="tabel">
                        <div class="flex flex-row text-xs gap-y-2">
                            @if ($data->pengajuan->count() > 0)
                                <table class="table w-full leading-normal border-none">
                                    <th>
                                        <tr>
                                            <td class="text-left">Tahun</td>
                                            <td class="font-bold text-right">{{ $data->tahun }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Status Pendaftaran</td>
                                            @php
                                                $date = date('Y-m-d');
                                            @endphp
                                            @if ($data->daftar_buka <= $date && $data->daftar_tutup >= $date)
                                                <td class="font-semibold text-right text-green-500">Buka</td>
                                            @else
                                                <td class="font-semibold text-right text-red-500">Tutup</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td class="text-left">Status Pengajuan</td>
                                            @if (!$data->pengajuan[0]->status)
                                                <td class="font-semibold text-right text-red-500">
                                                    Belum Mengajukan
                                                </td>
                                            @elseif ($data->pengajuan[0]->status == 'ajk')
                                                <td class="font-semibold text-right text-yellow-500">
                                                    Diajukan
                                                </td>
                                            @else
                                                <td class="font-semibold text-right text-green-500">
                                                    Diterima
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td class="text-left">Tanggal Pengajuan</td>
                                            <td class="font-semibold text-right">
                                                @if ($data->pengajuan[0]->created_at)
                                                    {{ tanggal_indonesia($data->pengajuan[0]->created_at) }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"></td>
                                            <td class="pt-2 font-semibold text-right">
                                                @if ($data->daftar_buka <= $date && $data->daftar_tutup >= $date && $data->pengajuan[0]->status != 'ajk')
                                                    {{-- Tombol untuk mengajukan --}}
                                                    <x-link-button
                                                        class="bg-sky-500 ms-1 hover:bg-sky-400 focus:bg-sky-400 active:bg-sky-400"
                                                        :href="route('pengajuan.index')" wire:navigate>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-3.5 h-3.5 me-2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
                                                        </svg>
                                                        {{ __('Klik Disini Untuk Mengajukan') }}
                                                    </x-link-button>
                                                @else
                                                    <x-link-button
                                                        class="bg-red-500 cursor-not-allowed pointer-events-none ms-1 hover:bg-red-400 focus:bg-red-400 active:bg-red-400"
                                                        :href="route('dashboard')" wire:navigate>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-3.5 h-3.5 me-2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
                                                        </svg>
                                                        {{ __('Pendaftaran Ditutup') }}
                                                    </x-link-button>
                                                @endif
                                        </tr>
                                    </th>
                                </table>
                            @else
                                <table class="table w-full leading-normal border-none">
                                    <th>
                                        <tr>
                                            <td class="text-left">Tahun</td>
                                            <td class="font-bold text-right">{{ $data->tahun }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Status Pendaftaran</td>
                                            @php
                                                $date = date('Y-m-d');
                                            @endphp
                                            @if ($data->daftar_buka <= $date && $data->daftar_tutup >= $date)
                                                <td class="font-semibold text-right text-green-500">Buka</td>
                                            @else
                                                <td class="font-semibold text-right text-red-500">Tutup</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td class="text-left">Status Pengajuan</td>
                                            <td class="font-semibold text-right text-red-500">
                                                Belum Mengajukan
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Tanggal Pengajuan</td>
                                            <td class="font-semibold text-right">
                                                -
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"></td>
                                            <td class="pt-2 font-semibold text-right">
                                                <x-link-button
                                                    class="bg-sky-500 ms-1 hover:bg-sky-400 focus:bg-sky-400 active:bg-sky-400"
                                                    :href="route('pengajuan.index')" wire:navigate>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-3.5 h-3.5 me-2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
                                                    </svg>
                                                    {{ __('Klik Disini Untuk Mengajukan') }}
                                                </x-link-button>
                                            </td>
                                        </tr>
                                    </th>
                                </table>
                            @endif
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </div>
</div>
