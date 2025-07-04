<div>
    <x-modal name='jadwal-modal'>
        <h2 class="px-6 pt-4 font-semibold text-gray-900 text-normal dark:text-gray-100">
            {{ $headModal }} Jadwal
        </h2>
        <form class="px-6 pt-6 pb-4 mb-4 bg-white rounded" wire:submit="save">
            @csrf
            <div class="mb-2">
                <x-input-label for="tahun" :value="__('Tahun')" class="mb-2 font-semibold" />
                  <select wire:model="tahun" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border border-gray-300 rounded shadow appearance-none focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none focus:shadow-outline">
                    <option value="">{{ __('Pilih Tahun') }}</option>
                    @php
                        for ($i=2023; $i <= date('Y') ; $i++) {
                            echo "<option value=$i>$i</option>";
                        }
                    @endphp
                  </select>
                  <x-input-error :messages="$errors->get('tahun')" class="mt-2" />
            </div>
            <div class="grid grid-cols-1 gap-4 mb-2 sm:grid-cols-2">
                <div>
                    <x-input-label for="date" :value="__('Tanggal Mulai Daftar')" class="mb-2 font-semibold" />
                    <input
                        wire:model="daftar_buka"
                        x-ref="datepicker_1"
                        x-init="
                            new Pikaday({
                                field: $refs.datepicker_1,
                                format:'YYYY-MM-DD',
                                onSelect : function() {
                                    $wire.set('daftar_buka',moment(this.getDate()).format('YYYY-MM-DD'),false);
                                }
                            });
                        "
                        placeholder="Pilih Tanggal Mulai Pendaftaran"
                        type="text"
                        id="datepicker_1"
                        class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border border-gray-300 rounded appearance-none focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none focus:shadow-outline"
                        required />
                    <x-input-error :messages="$errors->get('daftar_buka')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="daftar_tutup" :value="__('Tanggal Akhir Daftar')" class="mb-2 font-semibold" />
                    <input
                        wire:model="daftar_tutup"
                        x-ref="datepicker_2"
                        x-init="
                            new Pikaday({
                                field: $refs.datepicker_2,
                                format:'YYYY-MM-DD',
                                onSelect : function() {
                                    $wire.set('daftar_tutup',moment(this.getDate()).format('YYYY-MM-DD'),false);
                                }
                            });
                        "
                        placeholder="Pilih Tanggal Akhir Pendaftaran"
                        type="text"
                        id="datepicker_2"
                        class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border border-gray-300 rounded appearance-none focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none focus:shadow-outline"
                        required />
                    <x-input-error :messages="$errors->get('daftar_tutup')" class="mt-2" />
                </div>
            </div>
            <div class="mb-2">
                <x-input-label for="isAktif" :value="__('Status Aktif')" class="mb-2 font-semibold" />
                    <select wire:model="isAktif" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border border-gray-300 rounded shadow appearance-none focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none focus:shadow-outline">
                        <option value="">{{ __('Pilih Status') }}</option>
                        <option value="Y">{{ __('Aktif') }}</option>
                        <option value="N">{{ __('Tidak Aktif') }}</option>
                    </select>
                <x-input-error :messages="$errors->get('isAktif')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-10 gap-x-2">
                <x-primary-button wire:loading.attr="disabled">
                    @if ($tombol === 'Ubah')
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5 me-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5 me-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    @endif
                    {{ $tombol }}
                </x-primary-button>
                {{-- <x-secondary-button x-on:click="$dispatch('close-modal','pengguna-modal')"> --}}
                <x-secondary-button wire:click="resetForm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5 me-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                    {{ __('Batal') }}
                </x-secondary-button>
            </div>
        </form>
    </x-modal>
</div>
