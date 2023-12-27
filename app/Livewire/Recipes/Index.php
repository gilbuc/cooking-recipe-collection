<?php

namespace App\Livewire\Recipes;

use App\Models\Recipe;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    protected $recipes;
    public $query = '';
    use WithPagination;

    public function mount(): void
    {
        $this->getRecipes();
    }

    public function getRecipes(): void
    {
        $this->recipes = Recipe::where('name', 'like', '%' . $this->query . '%')->paginate(12);
    }

    public function search()
    {
        $this->resetPage();
    }

    public function show($id)
    {
        return $this->redirect(route('recipes.show', ["id" => $id]));
    }

    public function create()
    {
        return $this->redirect(route('recipes.create'));
    }

    public function render()
    {
        $this->getRecipes();
        return view('livewire.recipes.index', [
            'recipes' => $this->recipes
        ])->layout('layouts.app');
    }
}
