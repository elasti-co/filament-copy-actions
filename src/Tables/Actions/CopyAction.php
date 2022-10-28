<?php

namespace ElastiCo\FilamentCopyActions\Tables\Actions;

use Filament\Tables\Actions\Action as BaseAction;
use ElastiCo\FilamentCopyActions\Concerns\HasCopyable;


class CopyAction extends BaseAction
{
	use HasCopyable;
}