<div>
    <x-modal name='modal-view'>
        <h2 class="px-6 pt-4 font-semibold text-gray-900 text-normal dark:text-gray-100">
            {{ $header }}
        </h2>
        <div class="flex items-center justify-end mt-10 mb-5 mr-5">
            <x-secondary-button wire:click="resetForm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5 me-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
                  {{ __('Tutup') }}
            </x-secondary-button>
        </div>
    </x-modal>
</div>
