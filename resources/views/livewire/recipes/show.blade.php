<div>
    <div class="flex justify-center">
        <div class="text-center">
            <div class="text-4xl">{{ $recipe->name }}</div>
            <div class="text-sm mt-2 ">{{ $recipe->description}}</div>
        </div>
    </div>
    <div class="border-y-2 mt-8 py-2 flex md:flex-row flex-col justify-between">
        <div class="flex ">
            <div>
                <svg class="w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#b98766">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="pl-2">
                <span class="font-extrabold text-primary">{{__('Zubereitung')}}</span>
                <span class="block">{{ $recipe->worktime . ' min' }}</span>
            </div>
        </div>
        <div class="flex ">
            <div>
                <svg class="w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#b98766">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                    <path strokeLinecap="round" strokeLinejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                </svg>

            </div>
            <div class="pl-2">
                <span class="block font-extrabold text-primary">{{__('Portionen')}}</span>
                <input class="w-20" type="number" wire:model.live="faktor" wire:change="updateFaktor"/>
            </div>
        </div>
        <div class="flex justify-end">
            <div class=" cursor-pointer" wire:click="edit({{$recipe->id}})">
                <svg class="w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#b98766" className="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
            </div>
            <div class="ml-4 cursor-pointer" wire:click="delete({{$recipe->id}})" wire:confirm="Soll das Rezept wirklich gelöscht werden?">
                <svg class="w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#c53030">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>

            </div>
        </div>

    </div>
    <div class="sm:flex sm:justify-between sm:items-start mt-4">
        <div class="rounded mb-4">
            <img src="{{ asset('storage/images/'.$recipe->image) }}" alt="{{ $recipe->name }}" class="w-full h-40 sm:h-64 object-cover rounded-lg">
        </div>
        <div class="sm:w-6/12">
            <livewire:ingredients.index recipeId="{{$recipe->id}}" faktor="{{$faktor}}" />
        </div>
    </div>
    <div class="border-t-2 mt-8 pt-4">
        {!! nl2br(e($recipe->instruction)) !!}
    </div>
</div>
