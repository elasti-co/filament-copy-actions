<?php

namespace ElastiCo\FilamentCopyActions;

use ElastiCo\FilamentCopyActions\Forms\Actions\CopyAction;
use Filament\Facades\Filament;
use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;


class FilamentCopyActionsProvider extends PluginServiceProvider
{
	public function configurePackage(Package $package) : void
	{
		$package
			->name('filament-copy-actions')
			->hasViews();
	}
	
	
	public function bootingPackage() : void
	{
		Filament::registerScripts([
			'filament-copy-actions' => __DIR__ . '/../resources/js/filament-copy-actions.js',
		]);
	}
	
	
	public function packageBooted() : void
	{
		CopyAction::configureUsing(static function (CopyAction $action) {
			return $action->copyable(fn($component) => $component->getState());
		});
	}
}