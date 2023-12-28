<?php

namespace App\Livewire\Recipes;

use App\Models\Recipe;
use Illuminate\View\View;
use Livewire\Component;

class Show extends Component
{
    public $recipe;

    public $name = "";
    public $description = "";
    public $worktime = 0;
    public $portion = 0;
    public $instruction = 0;

    public $faktor = 0;
    public function mount($id): void
    {
        $this->recipe = Recipe::with('user')->latest()->findOrFail($id);

        $this->name = $this->recipe->name;
        $this->description = $this->recipe->description;
        $this->worktime = $this->recipe->worktime;
        $this->portion = $this->recipe->portion;
        $this->instruction = $this->recipe->instruction;
        $this->faktor = $this->portion;
    }

    public function edit($id)
    {
        return $this->redirect(route('recipes.edit', ["id" => $id]));
    }


    public function delete($id)
    {
        $recipe = Recipe::with('user')->latest()->findOrFail($id);

        $recipe->ingredients()->delete();
        $recipe->delete();
        return redirect()->to('/recipes');
    }

    public function updateFaktor()
    {
        info("Emit updateFaktor");
        $this->dispatch('doUpdateFaktor', $this->faktor, $this->portion);
    }
    public function render(): View
    {
        return view('livewire.recipes.show');
    }
}
