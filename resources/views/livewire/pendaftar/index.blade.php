<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Pendaftar Penyesuaian UKT') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="flex flex-row pendaftar-table">
                        @livewire('pendaftar.pendaftar-table')
                    </section>
                    <section class="pendaftar-modal">
                        @livewire('pendaftar.pendaftar-modal')
                    </section>
                    <section class="pendaftar-view-bukti">
                        @livewire('pendaftar.pendaftar-modal-view')
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
