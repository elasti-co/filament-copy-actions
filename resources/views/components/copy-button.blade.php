@props([
    'content',
    'iconColor',
    'successMessage',
    'icon' => 'heroicon-o-clipboard-copy',
    'iconClasses',
])
@php
    $buttonClasses = [
        'flex items-center justify-center focus:outline-none filament-icon-button',
        'text-primary-600 hover:text-primary-500 dark:text-primary-500 dark:hover:text-primary-400' => $iconColor === 'primary',
        'text-danger-600 hover:text-danger-500 dark:text-danger-500 dark:hover:text-danger-400' => $iconColor === 'danger',
        'text-gray-600 hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400' => $iconColor === 'secondary',
        'text-success-600 hover:text-success-500 dark:text-success-500 dark:hover:text-success-400' => $iconColor === 'success',
        'text-warning-600 hover:text-warning-500 dark:text-warning-500 dark:hover:text-warning-400' => $iconColor === 'warning',
    ];
    $iconClasses ??= 'w-6 h-6';
@endphp

<button
    type="button"
    x-cloak
    x-data="{ clicked: false }"
    x-on:mouseover.outside="clicked = false"
    x-on:click.prevent="copyToClipboard('{{addslashes($content)}}'); clicked = true"
    @class($buttonClasses)
>
    <x-dynamic-component :component="$icon" :class="$iconClasses" x-show="!clicked"  />
    <x-heroicon-o-check x-show="clicked" @class([$iconClasses, 'text-success-500'])
    x-tooltip="{
        content: '{{ $successMessage }}',
        placement: 'right',
        onHidden: () => { clicked = false ;}
    }"/>
</button>