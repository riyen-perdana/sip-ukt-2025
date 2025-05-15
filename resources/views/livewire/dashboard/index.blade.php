<div wire:poll>
    <section class="stats">
        <div class="container max-w-6xl px-3 mx-auto">
            <div class="mb-2">
                <div class="grid mb-7 gap-7 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="p-5 bg-white rounded shadow-xl">
                        <div class="flex items-center space-x-4">
                            <div>
                                <div
                                    class="flex items-center justify-center w-12 h-12 rounded-full bg-fuchsia-100 text-black-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400">Jumlah Pengguna</div>
                                <div class="text-2xl font-bold text-gray-900">{{ $user }} Orang</div>
                            </div>
                        </div>
                    </div>
                    <div class="p-5 bg-white rounded shadow-xl">
                        <div class="flex items-center space-x-4">
                            <div>
                                <div
                                    class="flex items-center justify-center w-12 h-12 rounded-full bg-lime-100 text-black-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400">Penerima Beasiswa</div>
                                <div class="text-2xl font-bold text-gray-900">{{ $bs }} Orang</div>
                            </div>
                        </div>
                    </div>
                    <div class="p-5 bg-white rounded shadow-xl">
                        <div class="flex items-center space-x-4">
                            <div>
                                <div
                                    class="flex items-center justify-center w-12 h-12 rounded-full bg-violet-100 text-black-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
                                      </svg>
                                </div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400">Jumlah Fakultas</div>
                                <div class="text-2xl font-bold text-gray-900">{{ $fkt }} Unit</div>
                            </div>
                        </div>
                    </div>
                    <div class="p-5 bg-white rounded shadow-xl">
                        <div class="flex items-center space-x-4">
                            <div>
                                <div
                                    class="flex items-center justify-center w-12 h-12 rounded-full bg-sky-100 text-black-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400">Jumlah Fakultas</div>
                                <div class="text-2xl font-bold text-gray-900">{{ $prd }} Unit</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-7 md:grid-cols-1 lg:grid-cols-3">
                    <div class="p-5 bg-white rounded shadow-xl">
                        <div class="flex items-center space-x-4">
                            <div>
                                <div
                                    class="flex items-center justify-center w-12 h-12 rounded-full bg-neutral-100 text-black-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-400">Jumlah Pendaftar</div>
                                <div class="text-2xl font-bold text-gray-900">{{ $dftr }} Orang</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
