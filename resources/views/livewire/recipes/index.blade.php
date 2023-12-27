<div>
    <form wire:submit="search">
        <div class="flex justify-center mb-6 w-full">
            <div class="basis-6/12">
                <input class="w-full" type="text" wire:model="query" placeholder="Rezept suchen" />
            </div>
            <div class="">
                <button class="ml-4" type="submit">
                    <svg class="w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#b98766" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>

                </button>
            </div>
            <div class="">
                <button class="ml-4" wire:click="create()">
                    <svg class="w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#b98766" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                </button>
            </div>


        </div>
    </form>

    <div class="grid lg:grid-cols-6 md:grid-cols-3 md:gap-6">
        @foreach ($recipes as $recipe)
        <div class="card hover:shadow-lg cursor-pointer" wire:key="{{ $recipe->id }}" wire:click="show({{$recipe->id}})">
            <img src="{{ asset('storage/images/'.$recipe->image) }}" alt="{{ $recipe->name }}" class="w-full h-32 sm:h-48 object-cover">
            <div class="p-2">
                <span class="font-bold">{{ $recipe->name }}</span>
                <span class="block text-gray-500 text-sm">{{ $recipe->description }}</span>
            </div>
            <div class="badged">
                <svg class="w-4 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ $recipe->worktime }} min.</span>
            </div>
        </div>
        @endforeach
    </div>
    {{ $recipes->links() }}
</div>
