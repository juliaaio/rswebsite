<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest transition ease-in-out duration-150']) }} 
    style="background-color: #1977cc !important; border-radius: 50px !important; padding: 10px 25px !important;">
    {{ $slot }}
</button>