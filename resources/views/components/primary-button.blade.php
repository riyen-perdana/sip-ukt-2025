<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-sky-500 border border-transparent rounded-md text-xs text-white tracking-normal hover:bg-sky-400 focus:bg-sky-400 active:bg-sky-400 focus:outline-none focus:ring-1 focus:ring-offset-1 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

{{-- <button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-sky-500 border border-transparent rounded-md text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button> --}}
