<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Fakultas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="flex justify-end pb-10 add">
                        <x-primary-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'fakultas-modal')" wire:loading.attr="disabled">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 me-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            {{ __('Tambah') }}
                        </x-primary-button>
                    </section>
                    <section class="flex flex-row jadwal-table">
                        @livewire('fakultas.fakultas-table')
                    </section>
                    <section class="fakultas-modal">
                        @livewire('fakultas.fakultas-modal')
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
