<?php

namespace ElastiCo\FilamentCopyActions\Tables;

use Closure;
use Filament\Tables\Columns\TextColumn;


class CopyableTextColumn extends TextColumn
{
	protected string | Closure | null $icon = 'heroicon-o-clipboard-copy';
	
	protected string | Closure | null $iconClasses = 'w-6 h-6';
	
	protected string | Closure | null $copyIconColor = null;
	
	protected string | Closure | null $iconPosition = 'after';
	
	protected string | Closure | null $copyText = null;
	
	protected string | Closure | null $copySuccessMessage = 'Copied!';
	
	protected string $view = 'filament-copy-actions::columns.copyable-text-column';
	
	
	public function iconClasses(string | Closure | null $iconClasses) : static
	{
		$this->iconClasses = $iconClasses;
		
		return $this;
	}
	
	
	public function getIconClasses() : string
	{
		return $this->evaluate($this->iconClasses);
	}
	
	
	public function successMessage(string | Closure | null $message) : static
	{
		$this->copySuccessMessage = $message;
		
		return $this;
	}
	
	
	public function getSuccessMessage() : string
	{
		return $this->evaluate($this->copySuccessMessage);
	}
	
	
	public function copyableText(string | Closure | false | null $copyText) : static
	{
		$this->copyText = $copyText;
		
		return $this;
	}
	
	
	public function getCopyableText() : ?string
	{
		return $this->evaluate($this->copyText ?? $this->getFormattedState());
	}
	
	
	public function iconColor(string | Closure $copyIconColor) : static
	{
		$this->copyIconColor = $copyIconColor;
		
		return $this;
	}
	
	
	public function getIconColor() : ?string
	{
		return $this->evaluate($this->copyIconColor);
	}
}