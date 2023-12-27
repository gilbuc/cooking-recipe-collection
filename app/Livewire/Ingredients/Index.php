<?php

namespace App\Livewire\Ingredients;

use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Index extends Component
{
    public Collection $ingredients;

    public function mount($recipeId): void
    {
        $this->getIngredients($recipeId);
    }

    public function getIngredients($recipeId): void
    {
        $this->ingredients = Ingredient::where('recipe_id', $recipeId)->get();
    }


    public function render()
    {
        return view('livewire.ingredients.index');
    }
}
