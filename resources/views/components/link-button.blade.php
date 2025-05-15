@props(['href'])

<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 border border-transparent rounded-md text-xs text-white tracking-normal focus:outline-none focus:ring-1 focus:ring-offset-1 transition ease-in-out duration-150','href'=>$href]) }}>
    {{ $slot }}
</a>
