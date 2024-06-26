<?php

namespace App\Livewire\Recipes;


use Intervention\Image\ImageManager;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;

    #[Rule('required|min:1')]
    public $name = "";

    #[Rule('')]
    public $description = "";
    #[Rule('required')]
    public $worktime = 0;
    #[Rule('required')]
    public $portion = 0;

    #[Rule('required')]
    public $instruction = "";

    #[Validate('image|max:1024')]
    public $image;


    public function render()
    {
        return view('livewire.recipes.create');
    }

    public function store(): void
    {
        $validated = $this->validate();
        $path = $this->resizeImage();
        $validated['image'] = basename($path);
        $recipe = auth()->user()->recipes()->create($validated);


        info("Emit: Recipe Stored");
        info($recipe);

        $this->dispatch('recipeStored', $recipe->id);
        $this->message = '';
        $this->redirect(route('recipes.index'));
    }


    public function cancel(): Redirector
    {
        return redirect()->to('/recipes');
    }

    /**
     * @return mixed
     */
    public function resizeImage()
    {
        info("resizeImage" . $this->image);
        if (empty($this->image)){
            return $this->image;
        }
        $path = $this->image->store('public/images');
        $image = ImageManager::imagick()->read(Storage::get($path));
        $image->scaleDown(width: 400);
        Storage::put($path, $image->toJpeg(100));
        return $path;
    }
}
