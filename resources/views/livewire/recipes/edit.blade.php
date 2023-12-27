<div>
    <form wire:submit="update">
        <div>

            <label class="block">
                <span class="text-gray-700">{{ __('Name') }}</span>
                <input type="text" wire:model="name" placeholder="{{ __('Name des Rezepts') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

            </label>
            <label class="block mt-2">
                <span class="text-gray-700">{{ __('Beschreibung') }}</span>
                <textarea wire:model="description" placeholder="{{ __('Kurze Beschreibung') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                <x-input-error :messages="$errors->get('desciption')" class="mt-2" />
            </label>
            <div class="flex gap-6 justify-start md:flex-row flex-col mt-2">
                <div class="">
                    <label class="block">
                        <span class="text-gray-700">{{ __('Bild') }}</span>

                        @if ($image)
                        <input class="mb-2" type="file" wire:model="image" hidden="hidden">
                        <img src="{{ $imageUploaded ? asset('storage/images/'.$image) : $image->temporaryUrl() }}" class="w-full max-w-sm">
                        @else
                        <input class="mb-2" type="file" wire:model="image">
                        @endif
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />

                </div>
                <div>
                    <label class="block">
                        <span class="text-gray-700">{{ __('Zubereitungszeit (min.)') }}</span>
                        <input type="number" wire:model="worktime" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                        <x-input-error :messages="$errors->get('worktime')" class="mt-2" />
                    </label>
                    <label class="block">
                        <span class="text-gray-700">{{ __('Portionen') }}</span>
                        <input type="number" wire:model="portion" class="mt-1 block w-full  rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                        <x-input-error :messages="$errors->get('portion')" class="mt-2" />
                    </label>

                </div>

            </div>
            <label class="block mt-2">
                <span class="text-gray-700">{{ __('Zutaten') }}</span>
                <livewire:ingredients.editList id="{{$recipe->id}}" />
            </label>
            <label class="block mt-2">
                <span class="text-gray-700">{{ __('Rezeptbeschreibung') }}</span>
                <textarea wire:model="instruction" placeholder="{{ __('Kochrezept') }}" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                <x-input-error :messages="$errors->get('instruction')" class="mt-2" />
            </label>
        </div>

        <div class="flex justify-between">
            <x-danger-button class="mt-4" wire:click.prevent="cancel">{{ __('Abbrechen') }}</x-danger-button>
            <x-primary-button class="mt-4">{{ __('Rezept speichern') }}</x-primary-button>
        </div>

    </form>
</div>
