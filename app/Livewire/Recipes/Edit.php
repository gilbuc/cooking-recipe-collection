<?php

namespace App\Livewire\Recipes;

use App\Models\Recipe;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $recipe;

    #[Rule('required|min:1')]
    public $name = "";

    #[Rule('')]
    public $description = '';

    #[Rule('required')]
    public $worktime = 0;

    #[Rule('required')]
    public $portion = 0;

    #[Rule('required')]
    public $instruction = '';

    #[Validate('image|max:1024')]
    public $image;
    public $imageUploaded = false;

    public function mount($id): void
    {
        $this->recipe = Recipe::with('user')->latest()->findOrFail($id);

        $this->name = $this->recipe->name;
        $this->description = $this->recipe->description;
        $this->worktime = $this->recipe->worktime;
        $this->portion = $this->recipe->portion;
        $this->image = $this->recipe->image;
        $this->instruction = $this->recipe->instruction;
        if ($this->image) {
            $this->imageUploaded = true;
        }
    }

    public function updatedImage($value)
    {
        $this->imageUploaded = false;
    }

    public function update(): Redirector
    {
        $this->authorize('update', $this->recipe);
        $validated = $this->validate();

        $path = $this->image->store('public/images');
        $validated['image'] = basename($path);
        $this->recipe->update($validated);

        info("Emit: Recipe Updated");
        info($validated);

        $this->dispatch('recipeUpdated', $this->recipe->id);
        return redirect()->to('/recipes');
    }

    public function cancel(): Redirector
    {
        return redirect()->to('/recipes');
    }

    public function render(): View
    {
        return view('livewire.recipes.edit');
    }
}
