<?php

namespace ElastiCo\FilamentCopyActions\Forms\Actions;

use ElastiCo\FilamentCopyActions\Concerns\HasCopyable;
use Filament\Forms\Components\Actions\Action as BaseAction;

class CopyAction extends BaseAction
{
    use HasCopyable;
}