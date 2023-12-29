<?php

namespace App\Livewire\Ingredients;

use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Attributes\On;

class Index extends Component
{
    public Collection $ingredients;

    #[On('doUpdateFaktor')]
    public function doUpdateFaktor($faktor, $portion)
    {
        info("doUpdateFaktor in EditList");
        foreach ($this->ingredients as $ingredient) {
            info("Faktor: " . $faktor . " Portion: ". $portion);
            $ingredient->amount = ($ingredient->amount / $portion) * $faktor;
            info("updateFaktor: " . $ingredient->amount);
        }
    }

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
