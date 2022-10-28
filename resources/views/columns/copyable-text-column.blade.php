@php
    $state = $getFormattedState();
    $copyableText = $getCopyableText();
    $icon = $getIcon();
    $iconClasses = $getIconClasses();
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
        @if ($icon && $iconPosition === 'before' && filled($copyableText))
            <x-filament-copy-actions::copy-button :content="$copyableText"
                    :icon="$icon"
                    :iconClasses="$iconClasses"
                    :iconColor="$iconColor"
                    :successMessage="$successMessage" />
        @endif
        <div>
            {{ $state }}
        </div>
        @if ($icon && $iconPosition === 'after' && filled($copyableText))
            <x-filament-copy-actions::copy-button :content="$copyableText"
                    :icon="$icon"
                    :iconClasses="$iconClasses"
                    :iconColor="$iconColor"
                    :successMessage="$successMessage" />
        @endif
    </div>
</div>