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
			foreach (array_intersect_key(['id' => '20', 'category' => '20', 'dream' => '35'], $this->params) as $ʟ_v => $ʟ_l) {
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
    <section class="mb-5 library-filter">
    <h2 class="mb-3">Filtrování</h2>
';
		$form = $this->global->formsStack[] = $this->global->uiControl['filterForm'] /* line 11 */;
		Nette\Bridges\FormsLatte\Runtime::initializeForm($form);
		echo '    <form';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), ['class' => null], false) /* line 11 */;
		echo ' class="row g-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Název snu:</label>
            <input type="text" name="name" class="form-control" placeholder="Zadejte název snu">
        </div>
        <div class="col-md-6">
            <label for="category" class="form-label">Kategorie:</label>
            <select name="category" class="form-select">
                <option value="">Všechny kategorie</option>
';
		foreach ($categories as $id => $category) /* line 20 */ {
			echo '                    <option value="';
			echo LR\Filters::escapeHtmlAttr($id) /* line 21 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($category) /* line 21 */;
			echo '</option>
';

		}

		echo '            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">
                Filtrovat
            </button>
        </div>
    ';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(end($this->global->formsStack), false) /* line 11 */;
		echo '</form>
';
		array_pop($this->global->formsStack);
		echo '</section>

    <h2>Všechny sny</h2>
<ul>
';
		foreach ($dreams as $dream) /* line 35 */ {
			echo '        <li>
            <h3>';
			echo LR\Filters::escapeHtmlText($dream->name) /* line 37 */;
			echo '</h3>
            <p><strong>Kategorie:</strong> ';
			echo LR\Filters::escapeHtmlText($dream->category->name) /* line 38 */;
			echo '</p>
            <p>';
			echo LR\Filters::escapeHtmlText($dream->description) /* line 39 */;
			echo '</p>
            <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Dream:edit', [$dream->id])) /* line 40 */;
			echo '">Edit</a>
            <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Delete!', [$dream->id])) /* line 41 */;
			echo '" onclick="return confirm(\'Opravdu chcete tento sen smazat?\')">Delete</a>
        </li>
';

		}

		echo '</ul>

   
</div>';
	/** {block content} on line 3 */
	public function blockContent(array $ʟ_args): void
	{
		echo '

';
	}
}
