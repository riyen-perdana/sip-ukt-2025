<div wire:poll class="relative w-full overflow-x-auto shadow-md sm:rounded-lg">
    <section class="flex flex-row items-center justify-between mx-auto mt-5 mb-5 search-pagination">
        <div class="w-5/12 ml-4">
            <x-text-input wire:model.live="search" id="search"
                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                type="text" placeholder="Cari Data NIM Mahasiswa, Nama Mahasiswa" />
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
    <section class="table">
        <table class="w-full text-sm text-center text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3 w-[20px] sm:w-[20px]">
                        No.
                    </th>
                    <th scope="col" class="px-4 py-3 sm:w-[350px] w-[350px]">
                        Mahasiswa
                    </th>
                    <th scope="col" class="px-4 py-3 sm:w-[400px] w-[400px]">
                        Besaran UKT
                    </th>
                    <th scope="col" class="px-4 py-3 sm:w-[200px] w-[200px]">
                        Verifikator
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
                            {{ ($data->currentpage() - 1) * $data->perpage() + $loop->index + 1 }}.
                        </th>
                        <th scope="row"
                            class="flex flex-row gap-x-2 px-3 py-3 text-[13px] font-normal text-left text-gray-900 whitespace-nowrap">
                            <section class="flex-shrink-0 foto">
                                @php
                                    $url = str_replace('uc', 'thumbnail', $item->foto);
                                @endphp
                                <img src="{{ $url }}" alt="" class="w-10 h-10 rounded-full">
                            </section>
                            <section class="flex flex-col data">
                                <div class="font-semibold uppercase">{{ $item->nama }}</div>
                                <div class="font-semibold">{{ $item->nim }}</div>
                                <div>Fakultas {{ $item->prodi->fakultas->name }}</div>
                                <div>{{ $item->prodi->name_prodi }}</div>
                                <div>Semester {{ $item->semester }}</div>

                                @if ($item->pengajuan[0]['status'] == 'ajk')
                                    <div>
                                        Status : <span class="font-semibold text-red-500">Pengajuan</span>
                                    </div>
                                @elseif ($item->pengajuan[0]['status'] == 'prs')
                                    <div>
                                        Status : <span class="font-semibold text-green-500">Proses Verifikasi</span>
                                    </div>
                                @else
                                    <div>
                                        Status : <span class="font-semibold text-indigo-500">Selesai Verifikasi</span>
                                    </div>
                                @endif
                                @isset ($item->pengajuan[0]['verifikasi'][0])
                                    @if ($item->pengajuan[0]['verifikasi'][0]['is_setuju'] == 'Y')
                                        <div>
                                            Pengajuan : <span class="font-semibold text-green-500">Disetujui</span>
                                        </div>
                                    @else
                                        <div>
                                            Pengajuan : <span class="font-semibold text-red-500">Ditolak</span>
                                        </div>
                                    @endif
                                @endisset
                            </section>
                        </th>
                        <th scope="row"
                            class="px-3 py-3 font-normal text-left align-top text-[13px] text-gray-900 whitespace-nowrap">
                            <div>Sebelum : <span class="font-semibold text-red-500">[UKT {{ $item->ukt }}] - {{ format_rupiah($item->jml_ukt_awal) }}</span></div>
                            <div>Sesudah : <span class="font-semibold text-green-500">[UKT {{ $item->ukt - 1 }}] - {{ format_rupiah($item->jml_ukt_turun) }}</span>
                            </div>
                            <div>Selisih : <span class="font-semibold text-violet-500">{{ format_rupiah($item->jml_ukt_awal - $item->jml_ukt_turun) }}</span></div>
                        </th>
                        <th scope="row"
                            class="px-3 py-3 font-normal align-top text-[13px] text-gray-900 whitespace-nowrap text-center">
                                @isset ($item->pengajuan[0]['verifikasi'][0])
                                    {{ $item->pengajuan[0]['verifikasi'][0]['user']['name'] }}
                                @endisset
                        </th>
                        <th scope="row" class="px-3 py-3 text-[13px] font-normal text-gray-900 whitespace-nowrap align-top">
                            <div class="flex flex-row justify-center gap-x-1">
                                @if ($item->pengajuan[0]['status'] == 'ajk')
                                    <x-button-table wire:click="$dispatch('verifikasi',{data: {{ $item }}} )"  class="flex flex-row bg-cyan-500 hover:bg-cyan-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5 me-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                                        </svg>
                                        {{ __('Verifikasi') }}
                                    </x-button-table>
                                @elseif ($item->pengajuan[0]['status'] == 'prs')
                                    <x-button-table class="flex flex-row bg-red-500 hover:bg-red-600">
                                        <svg aria-hidden="true" class="inline w-3.5 h-3.5 me-2 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                        </svg>
                                        {{ __('Proses Verifikasi') }}
                                    </x-button-table>
                                @else
                                    <x-button-table class="flex flex-row bg-indigo-500 hover:bg-indigo-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5 me-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                                        </svg>
                                        {{ __('Selesai Verifikasi') }}
                                    </x-button-table>
                                @endif
                            </div>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-5 mx-auto text-black">Maaf..Data Yang Anda Cari Tidak Kami
                            Ditemukan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-5 py-5">
            {{ $data->links() }}
        </div>
    </section>
</div>
