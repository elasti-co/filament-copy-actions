<?php

namespace ElastiCo\FilamentCopyActions\Pages\Actions;

use ElastiCo\FilamentCopyActions\Concerns\HasCopyable;
use Filament\Pages\Actions\Action as BaseAction;

class CopyAction extends BaseAction
{
    use HasCopyable;
}