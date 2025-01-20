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

    public function renderDefault(?string $search = null, ?int $category = null): void
    {
        // Dotaz na snů (dreams)
       
    
        $dreams = $this->database->table('dreams')->fetchAll();
        
        // Načtení kategorií pro snění
        $categories = $this->database->table('dream_categories')->fetchPairs('id', 'name');
    
        // Přiřazení kategorií k snům
      
    
        $this->template->dreams = $dreams;
        $this->template->categories = $categories;
    }

    protected function createComponentAddDreamForm(): Form
    {
        $form = new Form;
        $form->addText('name', 'Název:')
            ->setRequired('Zadejte název snu.');

        $form->addTextArea('description', 'Popis:')
            ->setRequired('Zadejte popis snu.');

        $form->addSelect('category_id', 'Kategorie:', $this->database->table('dream_categories')->fetchPairs('id', 'name'))
            ->setPrompt('Vyberte kategorii')
            ->setRequired('Vyberte kategorii.');

        $form->addSubmit('submit', 'Přidat sen');
        $form->onSuccess[] = [$this, 'addDreamFormSucceeded'];
        return $form;
    }

    public function addDreamFormSucceeded(Form $form, array $values): void
    {
        $this->database->table('dreams')->insert([
            'name' => $values['name'],
            'description' => $values['description'],
            'category_id' => $values['category_id'],
        ]);

        $this->flashMessage('Sen byl úspěšně přidán.', 'success');
        $this->redirect('this');
    } 
    public function handleDelete($id)
    {
        $this->database->table('dreams')->wherePrimary($id)->delete();
        $this->flashMessage('Sen byl úspěšně smazán.', 'success');
        $this->redirect('this');
    }
}
