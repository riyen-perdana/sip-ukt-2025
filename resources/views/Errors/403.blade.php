<x-layouts.errors>
    <div class="flex">
        <div class="mx-auto text-center">
            <img src="{{asset('assets/images/4.png')}}" width="500" class="mx-auto" />

            <div class="max-w-4xl mx-auto text-normal">Maaf, Anda Tidak Berhak Mengakses Halaman Ini</div>

            <div class="flex mt-3">
                <div class="grid mx-auto">
                    <x-link-button class="bg-sky-500 ms-1 hover:bg-sky-400 focus:bg-sky-400 active:bg-sky-400" :href="route('dashboard')" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5 me-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                          </svg>
                        {{ __('Kembali Ke Dashboard') }}
                    </x-link-button>
                </div>
            </div>
        </div>
    </div>
</x-layouts.errors>
