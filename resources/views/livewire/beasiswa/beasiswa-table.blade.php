<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <section class="flex flex-row items-center justify-between mx-auto mt-5 mb-5 search-pagination">
        <div class="w-5/12 ml-4">
            <x-text-input wire:model.live="search" id="search"
                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                type="text" placeholder="Cari Data Nomor Induk Mahasiswa, Nama" />
        </div>
        <div class="flex flex-row items-center justify-between mr-4 text-sm gap-x-2">
            <div>Page :</div>
            <div>
                <select wire:model.live.debounce.300ms="pages"
                    class="w-full py-2 pl-3 mx-auto text-sm leading-tight text-gray-700 border border-gray-300 rounded shadow appearance-none pr-7 focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none focus:shadow-outline">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
    </section>
    <table class="w-full text-sm text-center text-gray-500 rtl:text-right dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-4 py-3 w-[20px] sm:w-[20px]">
                    No.
                </th>
                <th scope="col" class="px-4 py-3 sm:w-[400px] w-[400px]">
                    Nomor Induk Mahasiswa
                </th>
                <th scope="col" class="px-4 py-3 sm:w-[300px] w-[300px]">
                    Nama
                </th>
                <th scope="col" class="px-4 py-3 sm:w-[200px] w-[200px]">
                    Status
                </th>
                <th scope="col" class="px-4 py-3 sm:w-[300px] w-[300px]">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row"
                        class="px-3 py-3 text-[13px] font-normal text-gray-900 whitespace-nowrap align-top">
                        {{ ($data ->currentpage()-1) * $data ->perpage() + $loop->index + 1 }}.
                    </th>
                    <th scope="row"
                        class="flex flex-col px-3 py-3 text-[13px] font-normal text-left text-gray-900 whitespace-nowrap">
                        <div>{{ $item->nim }}</div>
                    </th>
                    <th scope="row"
                        class="px-3 py-3 text-[13px] font-normal text-center text-gray-900 whitespace-nowrap">
                        {{ $item->name }}
                    </th>
                    @if ($item->is_aktif == 'Y')
                        <th scope="row">
                            <x-button-table class="bg-green-500 hover:bg-green-600">Aktif</x-button-table>
                        </th>
                    @else
                        <th scope="row">
                            <x-button-table class="bg-red-500 hover:bg-red-600">Tidak Aktif</x-button-table>
                        </th>
                    @endif
                    <th scope="row">
                        <div class="flex flex-row justify-center gap-x-1">
                            <x-button-table wire:click="$dispatch('getBeasiswa',{data: {{ $item }}} )"
                                class="flex flex-row bg-slate-500 hover:bg-slate-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5 me-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                                {{ __('Edit') }}
                            </x-button-table>
                            <x-button-table
                                {{-- wire:click="$dispatch('sweet-alert-confirm',{id:'{{ $item->id }}',tahun:'{{ $item->tahun }}'})" --}}
                                wire:click="$dispatch('sweet-alert-confirm',{id:'{{ $item->id }}',title:'Hapus Penerima Mahasiswa {{ $item->name }}'})"
                                class="flex flex-row bg-rose-500 hover:bg-rose-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5 me-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                                {{ __('Hapus') }}
                            </x-button-table>
                        </div>
                    </th>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="py-5 mx-auto text-black">Maaf..Data Yang Anda Cari Tidak Kami Ditemukan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-5 py-5">
        {{ $data->links() }}
    </div>
    <x-sweet-alert-confirm />
</div>
