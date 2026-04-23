<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-red']) }}>
    {{ $slot }}
</button>
