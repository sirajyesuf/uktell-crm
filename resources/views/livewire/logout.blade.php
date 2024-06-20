@php
    $user = filament()->auth()->user();
@endphp


<div style="background-color:#f9fafb;border-top-width: 2px; border-top-color: #c1c1c1; border-top-style: solid;" class="flex flex-row gap-1 items-center p-2">

    <div style="padding:2px; cursor: pointer;">


        <x-filament::dropdown.list.item
        :action="filament()->getLogoutUrl()"
        :icon="\Filament\Support\Facades\FilamentIcon::resolve('panels::user-menu.logout-button') ?? 'heroicon-m-arrow-left-on-rectangle'"
        method="post"
        tag="form"
        >
        {{-- {{__('filament-panels::layout.actions.logout.label') }} --}}
        </x-filament::dropdown.list.item>

    </div>


    <div style="color: #2f2f2f">
        <p style="text-transform: capitalize; word-wrap: break-word; overflow-wrap: break-word; word-break: break-all;">
            {{$user->first_name}} {{$user->last_name}}
        </p>
        <p style="word-wrap: break-word; overflow-wrap: break-word; word-break: break-all;">
            {{$user->email}}
        </p>

    </div>
</div>

