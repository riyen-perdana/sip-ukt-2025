<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Daftar Penyesuaian UKT') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="flex justify-end pb-10 add">
                        <x-link-button class="bg-sky-500 ms-1 hover:bg-sky-400 focus:bg-sky-400 active:bg-sky-400"
                            :href="route('dashboard')" wire:navigate>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-3.5 h-3.5 me-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                            </svg>
                            {{ __('Kembali Ke Dashboard') }}
                        </x-link-button>
                    </section>
                    <section class="pendaftaran">
                        <form class="w-full px-6 pt-6 pb-4 mb-4 bg-white rounded" wire:submit="save">
                            @csrf
                            <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
                                <div x-data x-init="$refs.no_wa_mhs.focus()">
                                    <x-input-label for="no_wa_mhs" :value="__('Nomor Whatsapp Aktif Mahasiswa*')"
                                        class="mb-2 text-xs font-semibold" />
                                    <x-text-input x-ref="no_wa_mhs" wire:model.live="no_wa_mhs" id="no_wa_mhs"
                                        class="w-full px-3 py-2 text-xs leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        type="text" required autofocus
                                        placeholder="Nomor Whatsapp Aktif Mahasiswa" />
                                    <x-input-error :messages="$errors->get('no_wa_mhs')" class="mt-1" />
                                </div>
                                <div>
                                    <x-input-label for="no_wa_ortu" :value="__('Nomor Whatsapp Aktif Orang Tua/Wali Mahasiswa*')"
                                        class="mb-2 text-xs font-semibold" />
                                    <x-text-input wire:model.live="no_wa_ortu" id="no_wa_ortu"
                                        class="w-full px-3 py-2 text-xs leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        type="text" required
                                        placeholder="Nomor Whatsapp Aktif Orang Tua/Wali Mahasiswa" />
                                    <x-input-error :messages="$errors->get('no_wa_ortu')" class="mt-0" />
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-4 mb-2 md:grid-cols-1 lg:grid-cols-2">
                                <div>
                                    <x-input-label for="surper_mhs" :value="__('Surat Permohonan Penyesuaian UKT Mahasiswa Kepada Dekan Fakultas')" class="text-xs font-semibold" />
                                    <p class="mb-1 text-xs text-black-500">Format PDF dengan Kapasitas Maksimal 500Kb
                                    </p>
                                    <x-text-input wire:model.live="surper_mhs" id="surper_mhs"
                                        class="w-full px-3 py-2 mb-1 text-xs leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        type="file" required />
                                    <x-input-error :messages="$errors->get('surper_mhs')" class="mt-0" />
                                    @if ($surper_mhs && !$errors->get('surper_mhs'))
                                        <x-primary-button x-data=""
                                            x-on:click.prevent="$dispatch('viewData',{view:'{{ $surper_mhs->temporaryUrl() }}'})"
                                            wire:loading.attr="disabled" wire:ignore.self>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 me-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            {{ __('Lihat Berkas') }}
                                        </x-primary-button>
                                    @endif
                                </div>
                                <div>
                                    <x-input-label for="kk_mhs" :value="__('Scan Asli Kartu Keluarga Mahasiswa')" class="text-xs font-semibold" />
                                    <p class="mb-1 text-xs text-black-500">Format PDF dengan Kapasitas Maksimal 500Kb
                                    </p>
                                    <x-text-input wire:model="kk_mhs" id="kk_mhs"
                                        class="w-full px-3 py-2 mb-1 text-xs leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        type="file" required
                                        placeholder="Nomor Whatsapp Aktif Orang Tua/Wali Mahasiswa" />
                                    <x-input-error :messages="$errors->get('kk_mhs')" class="mt-0" />
                                    @if ($kk_mhs && !$errors->get('kk_mhs'))
                                        <x-primary-button x-data=""
                                            x-on:click.prevent="$dispatch('viewData',{view:'{{ $kk_mhs->temporaryUrl() }}'})"
                                            wire:loading.attr="disabled" wire:ignore.self>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 me-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            {{ __('Lihat Berkas') }}
                                        </x-primary-button>
                                    @endif
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-4 mb-2 md:grid-cols-1 lg:grid-cols-2">
                                <div>
                                    <x-input-label for="ktp_ortu_mhs" :value="__('Scan Asli Kartu Tanda Penduduk Orang Tua')" class="text-xs font-semibold" />
                                    <p class="mb-1 text-xs text-black-500">Format PDF dengan Kapasitas Maksimal 500Kb
                                    </p>
                                    <x-text-input wire:model="ktp_ortu_mhs" id="ktp_ortu_mhs"
                                        class="w-full px-3 py-2 mb-1 text-xs leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        type="file" required />
                                    <x-input-error :messages="$errors->get('ktp_ortu_mhs')" class="mt-0" />
                                    @if ($ktp_ortu_mhs && !$errors->get('ktp_ortu_mhs'))
                                        <x-primary-button x-data=""
                                            x-on:click.prevent="$dispatch('viewData',{view:'{{ $ktp_ortu_mhs->temporaryUrl() }}'})"
                                            wire:loading.attr="disabled" wire:ignore.self>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 me-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            {{ __('Lihat Berkas') }}
                                        </x-primary-button>
                                    @endif
                                </div>
                                <div>
                                    <x-input-label for="gjortu_mhs" :value="__('Scan Asli slip gaji orang tua/SKTM dari Lurah setempat')" class="text-xs font-semibold" />
                                    <p class="mb-1 text-xs text-black-500">Format PDF dengan Kapasitas Maksimal 500Kb
                                    </p>
                                    <x-text-input wire:model="gjortu_mhs" id="gjortu_mhs"
                                        class="w-full px-3 py-2 mb-1 text-xs leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        type="file" required />
                                    <x-input-error :messages="$errors->get('gjortu_mhs')" class="mt-0" />
                                    @if ($gjortu_mhs && !$errors->get('gjortu_mhs'))
                                        <x-primary-button x-data=""
                                            x-on:click.prevent="$dispatch('viewData',{view:'{{ $gjortu_mhs->temporaryUrl() }}'})"
                                            wire:loading.attr="disabled" wire:ignore.self>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-5 h-5 me-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            {{ __('Lihat Berkas') }}
                                        </x-primary-button>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-2">
                                <div>
                                    <x-input-label for="rknlstrk_mhs" :value="__(
                                        'Scan asli rekening listrik 2 bulan terakhir bagi pelanggan PLN Pasca bayar, bagi pelanggan PLN Pulsa, diganti dengan Surat Pernyataan Pengeluaran Biaya Listrik Selama 2 bulan terakhir yang ditandatangani oleh Kepala Keluarga dan diketahui oleh Lurah setempat',
                                    )"
                                        class="text-xs font-semibold" />
                                    <p class="mb-1 text-xs text-black-500">Format PDF dengan Kapasitas Maksimal 500Kb
                                    </p>
                                    <x-text-input wire:model="rknlstrk_mhs" id="rknlstrk_mhs"
                                        class="w-full px-3 py-2 mb-1 text-xs leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        type="file" required
                                        placeholder="Nomor Whatsapp Aktif Orang Tua/Wali Mahasiswa" />
                                    <x-input-error :messages="$errors->get('rknlstrk_mhs')" class="mt-0" />
                                    @if ($rknlstrk_mhs && !$errors->get('rknlstrk_mhs'))
                                        <x-primary-button x-data=""
                                            x-on:click.prevent="$dispatch('viewData',{view:'{{ $rknlstrk_mhs->temporaryUrl() }}'})"
                                            wire:loading.attr="disabled" wire:ignore.self>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-5 h-5 me-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            {{ __('Lihat Berkas') }}
                                        </x-primary-button>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-2">
                                <div>
                                    <x-input-label for="surkk_mhs" :value="__(
                                        'Scan asli Surat Kematian orang tua/wali yang berada dalam satu KK dengan mahasiswa/Surat Keterangan dari rumah sakit bagi orang tua/wali yang sakit permanen yang berada dalam satu KK dengan mahasiswa/Surat keterangan PHK dari perusahaan bagi orang tua/wali yang berada dalam satu KK dengan mahasiswa/Surat keterangan usaha orang tua/wali pailit dan berada dalam satu KK dengan mahasiswa dari Lurah setempat',
                                    )" class="text-xs font-semibold" />
                                    <p class="mb-1 text-xs text-black-500">Format PDF dengan Kapasitas Maksimal 500Kb
                                    </p>
                                    <x-text-input wire:model="surkk_mhs" id="surkk_mhs"
                                        class="w-full px-3 py-2 mb-1 text-xs leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        type="file" required
                                        placeholder="Nomor Whatsapp Aktif Orang Tua/Wali Mahasiswa" />
                                    <x-input-error :messages="$errors->get('surkk_mhs')" class="mt-0" />
                                    @if ($surkk_mhs && !$errors->get('surkk_mhs'))
                                        <x-primary-button x-data=""
                                            x-on:click.prevent="$dispatch('viewData',{view:'{{ $surkk_mhs->temporaryUrl() }}'})"
                                            wire:loading.attr="disabled" wire:ignore.self>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-5 h-5 me-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            {{ __('Lihat Berkas') }}
                                        </x-primary-button>
                                    @endif
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-4 mb-2 md:grid-cols-1 lg:grid-cols-2">
                                <div>
                                    <x-input-label for="ft_ruangtamu" :value="__('Foto Ruang Tamu Rumah Orang Tua/Wali')"
                                        class="text-xs font-semibold" />
                                    <p class="mb-1 text-xs text-black-500">Format PDF dengan Kapasitas Maksimal 500Kb
                                    </p>
                                    <x-text-input wire:model="ft_ruangtamu" id="ft_ruangtamu"
                                        class="w-full px-3 py-2 mb-1 text-xs leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        type="file" required />
                                    <x-input-error :messages="$errors->get('ft_ruangtamu')" class="mt-0" />
                                    @if ($ft_ruangtamu && !$errors->get('ft_ruangtamu'))
                                        <x-primary-button x-data=""
                                            x-on:click.prevent="$dispatch('viewData',{view:'{{ $ft_ruangtamu->temporaryUrl() }}'})"
                                            wire:loading.attr="disabled" wire:ignore.self>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-5 h-5 me-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            {{ __('Lihat Berkas') }}
                                        </x-primary-button>
                                    @endif
                                </div>
                                <div>
                                    <x-input-label for="ft_kamartdr" :value="__('Foto Kamar Tidur Rumah Orang Tua/Wali')"
                                        class="text-xs font-semibold" />
                                    <p class="mb-1 text-xs text-black-500">Format PDF dengan Kapasitas Maksimal 500Kb
                                    </p>
                                    <x-text-input wire:model="ft_kamartdr" id="ft_kamartdr"
                                        class="w-full px-3 py-2 mb-1 text-xs leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        type="file" required />
                                    <x-input-error :messages="$errors->get('ft_kamartdr')" class="mt-0" />
                                    @if ($ft_kamartdr && !$errors->get('ft_kamartdr'))
                                        <x-primary-button x-data=""
                                            x-on:click.prevent="$dispatch('viewData',{view:'{{ $ft_kamartdr->temporaryUrl() }}'})"
                                            wire:loading.attr="disabled" wire:ignore.self>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-5 h-5 me-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            {{ __('Lihat Berkas') }}
                                        </x-primary-button>
                                    @endif
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-4 mb-2 md:grid-cols-1 lg:grid-cols-2">
                                <div>
                                    <x-input-label for="ft_ruangklrg" :value="__('Foto Ruang Keluarga Orang Tua/Wali')"
                                        class="text-xs font-semibold" />
                                    <p class="mb-1 text-xs text-black-500">Format PDF dengan Kapasitas Maksimal 500Kb
                                    </p>
                                    <x-text-input wire:model="ft_ruangklrg" id="ft_ruangklrg"
                                        class="w-full px-3 py-2 mb-1 text-xs leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        type="file" required />
                                    <x-input-error :messages="$errors->get('ft_ruangklrg')" class="mt-0" />
                                    @if ($ft_ruangklrg && !$errors->get('ft_ruangklrg'))
                                        <x-primary-button x-data=""
                                            x-on:click.prevent="$dispatch('viewData',{view:'{{ $ft_ruangklrg->temporaryUrl() }}'})"
                                            wire:loading.attr="disabled" wire:ignore.self>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-5 h-5 me-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            {{ __('Lihat Berkas') }}
                                        </x-primary-button>
                                    @endif
                                </div>
                                <div>
                                    <x-input-label for="ft_dapur" :value="__('Foto Dapur Rumah Orang Tua/Wali')" class="text-xs font-semibold" />
                                    <p class="mb-1 text-xs text-black-500">Format PDF dengan Kapasitas Maksimal 500Kb
                                    </p>
                                    <x-text-input wire:model="ft_dapur" id="ft_dapur"
                                        class="w-full px-3 py-2 mb-1 text-xs leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        type="file" required />
                                    <x-input-error :messages="$errors->get('ft_dapur')" class="mt-0" />
                                    @if ($ft_dapur && !$errors->get('ft_dapur'))
                                        <x-primary-button x-data=""
                                            x-on:click.prevent="$dispatch('viewData',{view:'{{ $ft_dapur->temporaryUrl() }}'})"
                                            wire:loading.attr="disabled" wire:ignore.self>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-5 h-5 me-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            {{ __('Lihat Berkas') }}
                                        </x-primary-button>
                                    @endif
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-4 mb-2 md:grid-cols-1 lg:grid-cols-2">
                                <div>
                                    <x-input-label for="ft_dpnrumah" :value="__('Foto Keseluruhan Tampak Depan Rumah Orang Tua/Wali')"
                                        class="text-xs font-semibold" />
                                    <p class="mb-1 text-xs text-black-500">Format PDF dengan Kapasitas Maksimal 500Kb
                                    </p>
                                    <x-text-input wire:model="ft_dpnrumah" id="ft_dpnrumah"
                                        class="w-full px-3 py-2 mb-1 text-xs leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        type="file" required />
                                    <x-input-error :messages="$errors->get('ft_dpnrumah')" class="mt-0" />
                                    @if ($ft_dpnrumah && !$errors->get('ft_dpnrumah'))
                                        <x-primary-button x-data=""
                                            x-on:click.prevent="$dispatch('viewData',{view:'{{ $ft_dpnrumah->temporaryUrl() }}'})"
                                            wire:loading.attr="disabled" wire:ignore.self>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-5 h-5 me-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            {{ __('Lihat Berkas') }}
                                        </x-primary-button>
                                    @endif
                                </div>
                                <div>
                                    <x-input-label for="sk_tdkbs" :value="__('Surat Keterangan Tidak Sedang Menerima Beasiswa')" class="text-xs font-semibold" />
                                    <p class="mb-1 text-xs text-black-500">Format PDF dengan Kapasitas Maksimal 500Kb
                                    </p>
                                    <x-text-input wire:model="sk_tdkbs" id="sk_tdkbs"
                                        class="w-full px-3 py-2 mb-1 text-xs leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        type="file" required />
                                    <x-input-error :messages="$errors->get('sk_tdkbs')" class="mt-0" />
                                    @if ($sk_tdkbs && !$errors->get('sk_tdkbs'))
                                        <x-primary-button x-data=""
                                            x-on:click.prevent="$dispatch('viewData',{view:'{{ $sk_tdkbs->temporaryUrl() }}'})"
                                            wire:loading.attr="disabled" wire:ignore.self>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-5 h-5 me-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            {{ __('Lihat Berkas') }}
                                        </x-primary-button>
                                    @endif
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-4 mb-2 md:grid-cols-1 lg:grid-cols-2">
                                <div>
                                    <x-input-label for="spkd" :value="__('Surat Pernyataan Kebenaran Data')" class="text-xs font-semibold" />
                                    <p class="mb-1 text-xs text-black-500">Format PDF dengan Kapasitas Maksimal 500Kb
                                    </p>
                                    <x-text-input wire:model="spkd" id="spkd"
                                        class="w-full px-3 py-2 mb-1 text-xs leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        type="file" required />
                                    <x-input-error :messages="$errors->get('spkd')" class="mt-0" />
                                    @if ($spkd && !$errors->get('spkd'))
                                        <x-primary-button x-data=""
                                            x-on:click.prevent="$dispatch('viewData',{view:'{{ $spkd->temporaryUrl() }}'})"
                                            wire:loading.attr="disabled" wire:ignore.self>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-5 h-5 me-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            {{ __('Lihat Berkas') }}
                                        </x-primary-button>
                                    @endif
                                </div>
                            </div>
                            <div class="block mt-4">
                                <label for="remember" class="inline-flex items-top">
                                    <input wire:model="remember" id="remember" type="checkbox"
                                        class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500"
                                        name="remember">
                                    <span
                                        class="text-xs text-gray-600 ms-2">{{ __('Dengan ini saya menyatakan bahwa data yang saya isikan ini adalah benar, apabila dikemudian hari data yang saya isikan ternyata tidak benar, maka saya bersedia digugurkan dari penerima keringanan UKT UIN SUSKA Riau dan bersedia menerima sanksi yang ada yaitu dinaikkan UKT nya 1 (satu) tingkat.') }}</span>
                                </label>
                            </div>
                            <div class="block mt-4 mb-2">
                                <p class="text-xs text-red-500">Pastikan borang pendaftaran penyesuaian UKT sudah
                                    terisi dengan benar sebelum anda mengklik tombol SIMPAN, segala kesalahan dalam
                                    pengisian akan menjadi tanggung jawab mahasiswa sendiri.</p>
                            </div>
                            <div class="flex items-center justify-end mt-5 gap-x-2">
                                <x-primary-button wire:loading.attr="disabled ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5 me-2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                                    </svg>
                                    {{ __('Simpan') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </section>
                    <section class="modal-view">
                        <div>
                            <x-modal name='modal-view'>
                                <h2 class="px-6 pt-4 font-semibold text-gray-900 text-normal dark:text-gray-100">
                                    Lihat Berkas
                                </h2>
                                <div class="flex justify-center p-1 mt-10">
                                    <embed src="{{ $view }}" width="500px" height="700px"/>
                                </div>
                                <div class="flex items-center justify-end mt-10 mb-5 mr-5">
                                    <x-secondary-button wire:click="$dispatch('close-modal','modal-view')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5 me-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18 18 6M6 6l12 12" />
                                        </svg>
                                        {{ __('Tutup') }}
                                    </x-secondary-button>
                                </div>
                            </x-modal>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
