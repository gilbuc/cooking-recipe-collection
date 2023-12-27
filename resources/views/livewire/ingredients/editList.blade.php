<div class="">
    @foreach ($ingredients as $index => $ingredient)
    <div class="" wire:key="ingredients.{{ $index }}.id">
        <div class="flex justify-between md:flex-row flex-col">
            <div class="">
                <input type="number" step="any" name="ingredients[{{$index}}][amount]" wire:model.defer="ingredients.{{ $index }}.amount" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
            </div>
            <div class="">
                <input type="text" wire:model.defer="ingredients.{{ $index }}.unit" placeholder="Einheit" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
            </div>
            <div class="">
                <input type="text" wire:model.defer="ingredients.{{ $index }}.food" placeholder="Zutat" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
            </div>
            <div class="">
                <input type="text" wire:model.defer="ingredients.{{ $index }}.note" placeholder="Anmerkung" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
            </div>
            <div class="">
                <x-primary-button class="mt-2" wire:click.prevent="addIngredient">+</x-primary-button>
                @if (sizeof($ingredients) > 1)
                <x-primary-button class="mt-2" wire:click.prevent="removeIngredient({{$index}})">-</x-primary-button>
                @endif
            </div>
        </div>

    </div>
    @endforeach
</div>
