<button {{ $attributes->merge(['type' => 'button', 'class' => 'class="inline-flex items-center px-3 py-1 text-xs font-medium text-center text-white rounded-lg']) }}>
    {{ $slot }}
</button>
