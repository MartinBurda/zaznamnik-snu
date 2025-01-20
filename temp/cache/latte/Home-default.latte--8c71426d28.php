<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /home/lukas/zaznamnik-snu/app/UI/Home/default.latte */
final class Template_8c71426d28 extends Latte\Runtime\Template
{
	public const Source = '/home/lukas/zaznamnik-snu/app/UI/Home/default.latte';

	public const Blocks = [
		['content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		$this->renderBlock('content', get_defined_vars()) /* line 3 */;
	}


	/** {block content} on line 3 */
	public function blockContent(array $ʟ_args): void
	{
		echo '

';
	}
}
