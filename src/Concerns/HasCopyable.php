<?php

namespace ElastiCo\FilamentCopyActions\Concerns;

use Closure;
use Illuminate\Support\HtmlString;


trait HasCopyable
{
	protected Closure | string | null $copyable = null;
	
	
	public static function getDefaultName() : ?string
	{
		return 'copy';
	}
	
	
	/** @noinspection PhpUndefinedFunctionInspection */
	public function setUp() : void
	{
		parent::setUp();
		
		$this
			->successNotificationMessage(__('Copied to clipboard'))
			->failureNotificationMessage(__('No data to copy'))
			->icon('heroicon-o-clipboard-copy')
			->extraAttributes(fn() => [
				'x-data'     => '{}',
				'x-on:click' => new HtmlString("copyToClipboard('{$this->getCopyable()}')"),
			])
			->action(function () : void {
				$this->getCopyable() ? $this->success() : $this->failure();
			});
	}
	
	
	/** @noinspection ClassMethodNameMatchesFieldNameInspection */
	public function copyable(Closure | string | null $copyable) : self
	{
		$this->copyable = $copyable;
		
		return $this;
	}
	
	
	public function getCopyable() : ?string
	{
		return $this->evaluate($this->copyable);
	}
}