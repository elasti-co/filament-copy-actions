# Filament Copy Actions

An easy-to-use copy actions for Filament Admin

- Table action to implement dynamic copy content
- Form action to use with any field
- Page action to implement a dynamic copy button on any page
- Custom copy table column to simply copy text content

## Installation

```bash
composer require elastico/filament-copy-actions
```

## Usage

### Table Column

Display a table text column with a copy button, the column has all features of the [TextColumn](https://filamentphp.com/docs/2.x/tables/columns#text-column) and the copy action sends column content to the clipboard and displays a success tooltip.

```php
use ElastiCo\FilamentCopyActions\Tables\CopyableTextColumn;

CopyableTextColumn::make('brand.name')
    ->successMessage('Brand copied to clipboard')
    ->searchable()
    ->sortable()
    ->toggleable()
```

The column has an option to display a description above or below the text, by default this description is not copied, if you want to copy the description too, use the `copyWithDescription` method instead.

#### Success message

You can customize the success message with the `successMessage` method, the default message is `Copied!`.

#### Icon Position and Color

You can customize the icon with the `icon`, `iconPosition` and `iconColor` methods.

### Table Action

Display a table action button, you set the content using the `copyable` method. You can customize the button icon/color using the same methods of the [Filament Action](https://filamentphp.com/docs/2.x/tables/actions#setting-a-color).

```php
use ElastiCo\FilamentCopyActions\Tables\Actions\CopyAction;

$table
    ->actions([
        CopyAction::make()->copyable(fn ($record) => $record->name),
    ])
```

#### Success message

The action will display a copy status, you can customize the success message with the `successNotificationMessage` method or the error message with the `errorNotificationMessage` method.


### Form Action

Use the `CopyAction` in your field suffix or prefix if you want to copy a field value. You can customize the button icon/color using the same methods of the [Filament Action](https://filamentphp.com/docs/2.x/tables/actions#setting-a-color).

```php
use ElastiCo\FilamentCopyActions\Forms\Actions\CopyAction;

Forms\Components\TextInput::make('sku')
    ->label('SKU (Stock Keeping Unit)')
    ->suffixAction(CopyAction::make())
    ->required();
    
Forms\Components\Select::make('shop_brand_id')
    ->relationship('brand', 'name')
    ->prefixAction(\ElastiCo\FilamentCopyActions\Forms\Actions\CopyAction::make())
    ->searchable();
```

You can use this form action in any filament field, the action will copy the field value to the clipboard by default, but you can customize the value with the `copyable` method.


```php

Forms\Components\Select::make('shop_brand_id')
    ->relationship('brand', 'name')
    ->prefixAction(\ElastiCo\FilamentCopyActions\Forms\Actions\CopyAction::make()->copyable(fn ($component) => $component->getOptionLabel()))
    ->searchable();
```

#### Success message

The action will display a copy status, you can customize the success message with the `successNotificationMessage` method or the error message with the `errorNotificationMessage` method.

### Page Action

You can add `CopyAction` button to any page in filament, just put the action in the `actions` method of the page. You can customize the button icon/color using the same methods of the [Filament Action](https://filamentphp.com/docs/2.x/tables/actions#setting-a-color).

```php
use ElastiCo\FilamentCopyActions\Pages\Actions\CopyAction;

protected function getActions(): array
{
    return [
        CopyAction::make()->copyable(fn () => $this->record->name),
    ];
}
```

The action will display a copy status, you can customize the success message with the `successNotificationMessage` method or the error message with the `errorNotificationMessage` method.