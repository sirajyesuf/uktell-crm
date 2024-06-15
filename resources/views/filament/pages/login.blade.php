<div class="flex">

    <div class="basis-1/4 flex flex-col bg-white p-4 gap-16">

        <div class="flex flex-col items-center mt-16">

            <img src="{{asset('img/logo-dark.png')}}" alt="logo" class="w-32 h-40">

            <p class="text-grey">Sign in to your account</p>

        </div>

        <form wire:submit="authenticate"class="flex flex-col gap-2 ">

            <div class="flex flex-col gap-1">
                <input wire:model="data.email" type="email" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="you@example.com" />

                <div class="text-sm text-red-600 dark:text-red-400">
                    @error('data.email') <span class="error">{{ $message }}</span> @enderror
                </div>

            </div>

            <input wire:model="data.password" type="password"  class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="password" />

            <div class="flex items-center">
                <input type="checkbox" class="text-red-900" wire:model="data.remember">
                <span class="ml-2 text-[#2f2f2f]">Remember me</span>
            </div>
            


            <button type="submit"
            class="p-1  bg-[#e6f5fb] rounded-l text-[#2f2f2f] capitalize text-bold"
            >sign in</button>
    
        </form>



     

    </div>

    <div class="basis-3/4 h-dvh bg-cover bg-center" style="background-image: url('{{asset('img/billingbooth-2.png')}}');">
        <!-- This div now has the background image covering the full height of the screen -->
    </div>
    
</div>