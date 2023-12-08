<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary text-primary-content btn-md']) }}>
    {{ $slot }}
</button>
