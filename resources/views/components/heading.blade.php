<div
    {{
        $attributes->merge([
            'class' => 'h2 border-bottom mb-5 py-2 border-2 fw-bold',
        ])
    }}
>
    {{ $slot }} {{ $title }}
</div>
