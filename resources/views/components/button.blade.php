<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-refop border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-refopClaro focus:bg-refopClaro active:bg-refopClaro focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
