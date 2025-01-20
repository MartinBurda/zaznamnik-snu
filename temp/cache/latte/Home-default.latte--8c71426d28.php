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


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['id' => '13', 'name' => '13', 'dream' => '22'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block content} on line 3 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '

<div>
    <h1>Záznamník snů</h1>
	<a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Dream:default')) /* line 8 */;
		echo '">Přidat sen</a>
    <form method="get" action="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link('default')) /* line 9 */;
		echo '">
        <input type="text" name="search" placeholder="Hledat sny..." value="';
		echo LR\Filters::escapeHtmlAttr($presenter->getParameter('search')) /* line 10 */;
		echo '">
        <select name="category">
            <option value="">Všechny kategorie</option>
';
		foreach ($categories as $id => $name) /* line 13 */ {
			if ($id == $presenter->getParameter('category')) /* line 14 */ {
				echo '                <option value="';
				echo LR\Filters::escapeHtmlAttr($id) /* line 14 */;
				echo '" selected>';
				echo LR\Filters::escapeHtmlText($name) /* line 14 */;
				echo '</option>
';
			}

		}

		echo '        </select>
        <button type="submit">Hledat</button>
    </form>

    <h2>Všechny sny</h2>
    <ul>
';
		foreach ($dreams as $dream) /* line 22 */ {
			echo '            <li>
                <h3>';
			echo LR\Filters::escapeHtmlText($dream->name) /* line 24 */;
			echo '</h3>
                <p><strong>Kategorie:</strong> ';
			echo LR\Filters::escapeHtmlText($dream->name) /* line 25 */;
			echo '</p>
                <p>';
			echo LR\Filters::escapeHtmlText($dream->description) /* line 26 */;
			echo '</p>
            </li>
';

		}

		echo '    </ul>

   
</div>';
	}
}
