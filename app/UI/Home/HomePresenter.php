<?php

declare(strict_types=1);

namespace App\UI\Home;
use Nette\Database\Explorer;
use Nette\Application\UI\Form;
use Nette;


final class HomePresenter extends Nette\Application\UI\Presenter
{
    private Nette\Database\Explorer $database;

    public function __construct(Nette\Database\Explorer $database)
    {
        $this->database = $database;
    }

    public function renderDefault(?string $name = null, ?int $category = null): void
    {
        // Dotaz na sny
        $dreams = $this->database->table('dreams');
    
        // Filtrace podle názvu snu
        if ($name) {
            $dreams->where('name LIKE ?', "%$name%");
        }
    
        // Filtrace podle kategorie
        if ($category) {
            $dreams->where('category_id', $category);
        }
    
        // Načtení kategorií pro výběr v šabloně
        $categories = $this->database->table('dream_categories')->fetchPairs('id', 'name');
    
        // Předání dat do šablony
        $this->template->dreams = $dreams->fetchAll();
        $this->template->categories = $categories;
    }

    
    protected function createComponentFilterForm(): Form
    {
        $form = new Form;
    
        // Přidání textového pole pro název snu
        $form->addText('name', 'Název snu:')
            ->setHtmlAttribute('placeholder', 'Zadejte název snu');
    
        // Přidání výběrového pole pro kategorie
        $form->addSelect('category', 'Kategorie:', $this->getCategories())
            ->setPrompt('Všechny kategorie');
    
        // Přidání tlačítka pro filtraci
        $form->addSubmit('filter', 'Filtrovat');
    
        // Zpracování úspěšného odeslání formuláře
        $form->onSuccess[] = [$this, 'filterFormSucceeded'];
    
        return $form;
    }
    public function filterFormSucceeded(Form $form, \stdClass $values): void
{
    // Předání filtrů do URL (pro použití v renderování)
    $this->redirect('this', [
        'name' => $values->name,
        'category' => $values->category,
    ]);
}
    
    // Pomocná metoda pro získání kategorií z databáze
    private function getCategories(): array
    {
        // Načtení kategorií z tabulky 'dream_categories'
        $categories = $this->database->table('dream_categories')->fetchPairs('id', 'name');
        return $categories;
    }
    public function handleDelete($id)
    {
        $this->database->table('dreams')->wherePrimary($id)->delete();
        $this->flashMessage('Sen byl úspěšně smazán.', 'success');
        $this->redirect('this');
    }
}
