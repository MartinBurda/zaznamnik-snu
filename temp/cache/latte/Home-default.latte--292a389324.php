<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: /root/zaznamnik-snu/app/UI/Home/default.latte */
final class Template_292a389324 extends Latte\Runtime\Template
{
	public const Source = '/root/zaznamnik-snu/app/UI/Home/default.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Záznamník snů</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <style>
        body {
            background-color: #121212; /* Deep dark background */
            color: #d1c4e9; /* Soft lavender for text */
        }
        h1, h2, h3 {
            color: #e1bee7; /* Pastel pink for headings */
        }
        a {
            color: #80deea; /* Soft cyan for links */
        }
        
        ul {
            list-style: none; /* Remove default list styling */
            padding: 0;
        }

    button, a[role="button"] {
        background-color: #1d1d1d; /* Match the darker tone of the page */
        color: #d1c4e9; /* Use the same lavender color as text */
        border: 1px solid #212121; /* Subtle border for slight definition */
        padding: 0.5em 1em; /* Keep spacing comfortable */
        border-radius: 5px; /* Rounded corners */
        cursor: pointer;
        text-decoration: none; /* No underline for link-style buttons */
    }

    button:hover, a[role="button"]:hover {
        color: #e1bee7; /* Highlight text on hover */
        background-color: #212121; /* Slight contrast on hover */
        border-color: #5e35b1; /* Add a slight glow effect */
    }

    button:focus, a[role="button"]:focus {
        outline: none; /* Remove default focus outline */
        box-shadow: 0 0 5px #5e35b1; /* Subtle focus effect */
    }

        input, select {
            background-color: #212121;
            color: #d1c4e9;
            border: 1px solid #5e35b1;
            padding: 0.5em;
            border-radius: 5px;
        }
        ul li {
            background-color: #1d1d1d; /* Slightly lighter background for list items */
            padding: 1em;
            margin-bottom: 1em;
            border-radius: 10px;
            list-style: none;
        }
        ul li h3 {
            margin: 0 0 0.5em 0;
        }
        ul li p {
            margin: 0.25em 0;
        }
    </style>
</head>
<body>
    <nav class="container-fluid">
        <ul>
            <li><strong>Záznamník snů</strong></li>
        </ul>
        <ul>
            <li><a href="#">Domů</a></li>
            <li><a href="#about">O Aplikaci</a></li>
            <li><a href="#contact" role="button">Kontakt</a></li>
        </ul>
    </nav>
    <main class="container">
        <div class="grid">
            <section>
                <hgroup>
                    <h1>Záznamník snů</h1>
                    <h3>Objevte a zorganizujte své sny</h3>
                </hgroup>
                <a href="Dream:default" class="button">Přidat sen</a>
                <form method="get" action="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link('default')) /* line 87 */;
		echo '" class="grid">
                    <input type="text" name="search" placeholder="Hledat sny..." value="';
		echo LR\Filters::escapeHtmlAttr($presenter->getParameter('search')) /* line 88 */;
		echo '">
                    <select name="category">
                        <option value="">Všechny kategorie</option>
';
		foreach ($categories as $id => $name) /* line 91 */ {
			if ($id == $presenter->getParameter('category')) /* line 92 */ {
				echo '                            <option value="';
				echo LR\Filters::escapeHtmlAttr($id) /* line 92 */;
				echo '" selected>';
				echo LR\Filters::escapeHtmlText($name) /* line 92 */;
				echo '</option>
';
			}

		}

		echo '                    </select>
                    <button type="submit">Hledat</button>
                </form>
                <h2>Všechny sny</h2>
                <ul>
';
		foreach ($dreams as $dream) /* line 99 */ {
			echo '                        <li>
                            <h3>';
			echo LR\Filters::escapeHtmlText($dream->name) /* line 101 */;
			echo '</h3>
                            <p><strong>Kategorie:</strong> ';
			echo LR\Filters::escapeHtmlText($dream->name) /* line 102 */;
			echo '</p>
                            <p>';
			echo LR\Filters::escapeHtmlText($dream->description) /* line 103 */;
			echo '</p>
                        </li>
';

		}

		echo '                </ul>
            </section>
        </div>
    </main>
    <footer class="container">
        <small><a href="#terms">Podmínky</a> • <a href="#privacy">Soukromí</a></small>
    </footer>
</body>
</html>
';
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['id' => '91', 'name' => '91', 'dream' => '99'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}
}
