<div>
    <x-modal name='pendaftar-modal'>
        <h2 class="px-6 pt-4 font-semibold text-gray-900 text-normal dark:text-gray-100">
            Verifikasi Data Pendaftar {{ $mahasiswa }}
        </h2>
        <section class="px-6 pt-6 pb-4 mb-4 data">
            <div class="flex flex-col gap-2">
                <x-button-table
                    x-data=""
                    x-on:click.prevent="$dispatch('showModal',{view:'{{$surat_permohonan}}'})"
                    wire:loading.attr="disabled"
                    class="flex flex-row bg-cyan-500 hover:bg-cyan-600">
                    {{ __('Surat Permohonan Penyesuaian UKT Mahasiswa Kepada Dekan Fakultas') }}
                </x-button-table>

                <x-button-table
                    x-data=""
                    x-on:click.prevent="$dispatch('showModal',{view:'{{$kartu_keluarga}}'})"
                    wire:loading.attr="disabled"
                    class="flex flex-row bg-cyan-500 hover:bg-cyan-600">
                    {{ __('Scan Asli Kartu Keluarga Mahasiswa') }}
                </x-button-table>

                <x-button-table
                    x-data=""
                    x-on:click.prevent="$dispatch('showModal',{view:'{{$ktp_ortu}}'})"
                    wire:loading.attr="disabled"
                    class="flex flex-row bg-cyan-500 hover:bg-cyan-600">
                    {{ __('Scan Asli Kartu Tanda Penduduk Orang Tua') }}
                </x-button-table>

                <x-button-table
                    x-data=""
                    x-on:click.prevent="$dispatch('showModal',{view:'{{$gaji_ortu}}'})"
                    wire:loading.attr="disabled"
                    class="flex flex-row bg-cyan-500 hover:bg-cyan-600">
                    {{ __('Scan Asli slip gaji orang tua/SKTM dari Lurah setempat') }}
                </x-button-table>

                <x-button-table
                    x-data=""
                    x-on:click.prevent="$dispatch('showModal',{view:'{{$rekening_listrik}}'})"
                    wire:loading.attr="disabled"
                    class="flex flex-row bg-cyan-500 hover:bg-cyan-600">
                    {{ __('Scan Asli Rekening Listrik Selama 2 Bulan') }}
                </x-button-table>

                <x-button-table
                    x-data=""
                    x-on:click.prevent="$dispatch('showModal',{view:'{{$skk_ortu}}'})"
                    wire:loading.attr="disabled"
                    class="flex flex-row bg-cyan-500 hover:bg-cyan-600">
                    {{ __('Surat Keterangan Kematian/Sakit Permanen/PHK/Pailit Orang Tua') }}
                </x-button-table>

                <x-button-table
                    x-data=""
                    x-on:click.prevent="$dispatch('showModal',{view:'{{$ft_ruangtamu}}'})"
                    wire:loading.attr="disabled"
                    class="flex flex-row bg-cyan-500 hover:bg-cyan-600">
                    {{ __('Foto Ruang Tamu Rumah Orang Tua/Wali') }}
                </x-button-table>

                <x-button-table
                    x-data=""
                    x-on:click.prevent="$dispatch('showModal',{view:'{{$ft_kmrtidur}}'})"
                    wire:loading.attr="disabled"
                    class="flex flex-row bg-cyan-500 hover:bg-cyan-600">
                    {{ __('Foto Kamar Tidur Rumah Orang Tua/Wali') }}
                </x-button-table>

                <x-button-table
                    x-data=""
                    x-on:click.prevent="$dispatch('showModal',{view:'{{$ft_ruangklrg}}'})"
                    wire:loading.attr="disabled"
                    class="flex flex-row bg-cyan-500 hover:bg-cyan-600">
                    {{ __('Foto Ruang Keluarga Orang Tua/Wali') }}
                </x-button-table>

                <x-button-table
                    x-data=""
                    x-on:click.prevent="$dispatch('showModal',{view:'{{$ft_dapur}}'})"
                    wire:loading.attr="disabled"
                    class="flex flex-row bg-cyan-500 hover:bg-cyan-600">
                    {{ __('Foto Dapur Rumah Orang Tua/Wali') }}
                </x-button-table>

                <x-button-table
                    x-data=""
                    x-on:click.prevent="$dispatch('showModal',{view:'{{$ft_dpnrumah}}'})"
                    wire:loading.attr="disabled"
                    class="flex flex-row bg-cyan-500 hover:bg-cyan-600">
                    {{ __('Foto Keseluruhan Tampak Depan Rumah Orang Tua/Wali') }}
                </x-button-table>

                <x-button-table
                    x-data=""
                    x-on:click.prevent="$dispatch('showModal',{view:'{{$sk_tdkbs}}'})"
                    wire:loading.attr="disabled"
                    class="flex flex-row bg-cyan-500 hover:bg-cyan-600">
                    {{ __('Surat Keterangan Tidak Sedang Menerima Beasiswa') }}
                </x-button-table>

                <x-button-table
                    x-data=""
                    x-on:click.prevent="$dispatch('showModal',{view:'{{$spkd}}'})"
                    wire:loading.attr="disabled"
                    class="flex flex-row bg-cyan-500 hover:bg-cyan-600">
                    {{ __('Surat Keterangan Kebenaran Data') }}
                </x-button-table>

            </div>
        </section>
        <section class="form_data">
            <form class="px-6 pt-0 pb-4 mb-4 bg-white rounded" wire:submit="save" wire:loading.attr="disabled">
                @csrf
                <div class="mb-2">
                    <x-input-label for="is_setuju" :value="__('Persetujuan Pengajuan')" class="mb-2 font-semibold" />
                      <select wire:model="is_setuju" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border border-gray-300 rounded shadow appearance-none focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none focus:shadow-outline">
                        <option value="">{{ __('Pilih Persetujuan') }}</option>
                        <option value="Y">{{ __('Setuju Pengajuan') }}</option>
                        <option value="N">{{ __('Tolak Pengajuan') }}</option>
                      </select>
                      <x-input-error :messages="$errors->get('is_setuju')" class="mt-2" />
                </div>
                <div class="mb-2">
                    <x-input-label for="komentar" :value="__('Catatan Persetujuan')" class="mb-2 font-semibold" />
                    <textarea wire:model="komentar" class="w-full px-3 py-2 text-xs leading-tight text-gray-700 border border-gray-300 rounded shadow appearance-none focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none focus:shadow-outline"></textarea>
                    <x-input-error :messages="$errors->get('komentar')" class="mt-2" />
                </div>
                <div class="flex items-center justify-end mt-10 gap-x-2">
                    <x-primary-button wire:loading.attr="disabled">
                        @if ($tombol === 'Ubah')
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5 me-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5 me-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        @endif
                        {{ $tombol }}
                    </x-primary-button>
                    <x-secondary-button wire:click="resetForm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5 me-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                          {{ __('Batal') }}
                    </x-secondary-button>
                </div>
            </form>
        </section>
    </x-modal>
</div>

