@php
    $state = $getFormattedState();
	$descriptionAbove = $getDescriptionAbove();
    $descriptionBelow = $getDescriptionBelow();
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
    @if (filled($descriptionAbove))
        <div class="text-sm text-gray-500">
            {{ $descriptionAbove instanceof \Illuminate\Support\HtmlString ? $descriptionAbove : \Illuminate\Support\Str::of($descriptionAbove)->markdown()->sanitizeHtml()->toHtmlString() }}
        </div>
    @endif
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
    @if (filled($descriptionBelow))
        <div class="text-sm text-gray-500">
            {{ $descriptionBelow instanceof \Illuminate\Support\HtmlString ? $descriptionBelow : \Illuminate\Support\Str::of($descriptionBelow)->markdown()->sanitizeHtml()->toHtmlString() }}
        </div>
    @endif
</div>