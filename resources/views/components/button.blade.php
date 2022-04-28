<button {{ $attributes->merge(['type' => 'submit', 'class' => 'p-2 btn-theme btn-rounded']) }}>
    {{ $slot }}
</button>
