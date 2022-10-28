@php
    $state = $getFormattedState();
    $copyableText = $getCopyableText();
    $icon = $getIcon();
    $iconColor = $getIconColor();
    $iconPosition = $getIconPosition();
    $successMessage = $getSuccessMessage();
@endphp
<div
        {{ $attributes->merge($getExtraAttributes())->class([
            'px-4 py-3 filament-tables-text-column',
            'text-primary-600 transition hover:underline hover:text-primary-500 focus:underline focus:text-primary-500' => $getAction() || $getUrl(),
            'whitespace-normal' => $canWrap(),
        ]) }}
>
    <div @class([
        'inline-flex items-center justify-center space-x-1 rtl:space-x-reverse min-h-6 py-0.5 rounded-xl whitespace-normal',
        ])>
        @if (filled($copyableText) && $icon && $iconPosition === 'before')
            <x-filament-copy-actions::copy-button :content="$copyableText"
                    :icon="$icon"
                    :iconColor="$iconColor"
                    :successMessage="$successMessage" />
        @endif
        <div>
            {{ $state }}
        </div>
        @if (filled($copyableText) && $icon && $iconPosition === 'after')
            <x-filament-copy-actions::copy-button :content="$copyableText"
                    :icon="$icon"
                    :iconColor="$iconColor"
                    :successMessage="$successMessage" />
        @endif
    </div>
</div>