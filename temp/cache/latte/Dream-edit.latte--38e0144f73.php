<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /home/lukas/zaznamnik-snu/app/UI/Dream/edit.latte */
final class Template_38e0144f73 extends Latte\Runtime\Template
{
	public const Source = '/home/lukas/zaznamnik-snu/app/UI/Dream/edit.latte';

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

		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
		echo '    ';
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<h1>Upravit sen</h1>
';
		$ʟ_tmp = $this->global->uiControl->getComponent('addDreamForm');
		if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
		$ʟ_tmp->render() /* line 3 */;
	}
}
