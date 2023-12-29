<?php

namespace App\Livewire\Ingredients;

use App\Models\Food;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Unit;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class EditList extends Component
{
    public $ingredients = [];
    public $allUnits = [];
    public $allFoods = [];

    protected $listeners = ['recipeStored', 'recipeUpdated'];

    public function store($recipe_id)
    {
        foreach ($this->ingredients as $ingredient) {
            $food = Food::firstOrCreate([
                'name' => $ingredient['food']
            ]);
            $unit = Unit::firstOrCreate([
                'name' => $ingredient['unit']
            ]);
            $ingr = Ingredient::firstOrCreate([
                'food_id' => $food->id,
                'unit_id' => $unit->id,
                'recipe_id' => $recipe_id,
                'amount' => $ingredient['amount'],
                'note' => $ingredient['note']
            ]);
        }
        $this->message = '';
        $this->redirect(route('recipes.index'));
    }

    public function recipeStored($recipe_id): void
    {
        $this->store($recipe_id);
    }

    public function recipeUpdated($recipe_id): void
    {
        info("Recipe Updated emitted");
        info("RecipeId: " . $recipe_id);

        // Delete all ingredients for this recipe
        Ingredient::where('recipe_id', $recipe_id)->delete();

        $this->store($recipe_id);
    }

    public function mount($id = null)
    {
        info("mount: id=" . $id);
        if (!is_null($id)) {
            $recipe = Recipe::with('user')->latest()->findOrFail($id);
            $ingredientList = Ingredient::where('recipe_id', $id)->get();
            if (sizeof($ingredientList) > 0) {
                foreach ($ingredientList as $ingredient) {
                    $food = Food::where('id', $ingredient->food_id)->first();
                    $unit = Unit::where('id', $ingredient->unit_id)->first();
                    $ingr = [
                        'id' => $ingredient->id,
                        'food' => $food->name,
                        'unit' => $unit->name,
                        'amount' => $ingredient->amount,
                        'note' => $ingredient->note
                    ];
                    array_push($this->ingredients, $ingr);
                }
            } else {
                $this->createEmptyIngredient();
            }
        } else {
            $this->createEmptyIngredient();
        }
        $this->allUnits = Unit::all();
        $this->allFoods = Food::all();
    }

    public function createEmptyIngredient()
    {
        $this->ingredients[] = ['id' => uniqid(), 'food' => '', 'unit' => '', 'amount' => 0, 'note' => ''];
    }

    public function render()
    {
        return view('livewire.ingredients.editList');
    }

    public function addIngredient()
    {
        $this->createEmptyIngredient();
    }

    public function removeIngredient($index)
    {
        unset($this->ingredients[$index]);
        $this->ingredients = array_values($this->ingredients);
    }
}
