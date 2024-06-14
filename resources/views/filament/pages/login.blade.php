<div class="flex flex-col-reverse md:flex-row">

    <div class="md:basis-1/4 flex flex-col bg-white p-4 gap-16 pt-32 order-2 md:order-1">

        <div class="flex flex-col items-center justify-center">

            <div>
                <img src="{{asset('img/logo-dark.png')}}" alt="logo" class="w-30 h-20">
            </div>

            <p class="text-grey">Sign in to your account</p>

        </div>

        <form wire:submit="authenticate"class="flex flex-col gap-2 ">

            <div>
                <input wire:model="data.email" type="email" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="you@example.com" />

                <div class="text-sm text-red-600 dark:text-red-400">
                    @error('data.email') <span class="error">{{ $message }}</span> @enderror
                </div>

            </div>

            <input wire:model="data.password" type="password"  class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="password" />

            <div class="flex items-center">
                <input type="checkbox" class="text-red-900" wire:model="data.remember">
                <span class="ml-2 text-black">Remember me</span>
            </div>
            


            <button type="submit"
            class="p-1  bg-[#e6f5fb] rounded-l text-black capitalize text-bold"
            >sign in</button>
    
        </form>



     

    </div>

    <div class="md:basis-3/4 h-64 md:h-screen bg-cover bg-center order-1 md:order-2" style="background-image: url('{{asset('img/billingbooth-2.png')}}');">
        <!-- This div now has the background image covering the full height of the screen -->
    </div>
    
</div>
