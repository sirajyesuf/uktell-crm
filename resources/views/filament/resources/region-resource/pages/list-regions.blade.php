<x-filament-panels::page>

    <x-filament::section class="gap-4">
        <div class="flex flex-row gap-4 justify-between">
            <input type="text">
            <button>add</button>
            {{-- {{$this->form}} --}}
        </div>

        <div class="flex flex-row justify-between">
            <div class="bg-red-900">
                <p>Regions</p>
                <ul>
                    <li>                    <button>
                        zone1
                        <span>
                            delete
                        </span>
                    </button></li>

<li>
    <button>
        zone1
        <span>
            delete
        </span>
    </button>
</li>


                </ul>
            </div>
            <div class="flex flex-col gap-y-6">
                
                {{ $this->table }}
        
            </div>
        </div>


    </x-filament::section>


</x-filament-panels::page>