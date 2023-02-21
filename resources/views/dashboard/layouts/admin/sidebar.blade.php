 <div id="menu" class="bg-black col-span-3 p-5">
     <div class="grid grid-cols-2 items-center">
         <div>
             <h1 class="font-bold text-sm lg:text-3xl">MealsUP</h1>
         </div>


     </div>

     <p class="text-slate-400 text-sm mb-2">Welcome back,</p>
     <div
         class="flex flex-col space-y-2 md:space-y-0 md:flex-row mb-5 items-center md:space-x-2 hover:bg-white/10 group transition duration-150 ease-linear rounded-lg group w-full py-3 px-2">
         <div>
             @if (auth()->user()->profile_picture)
                 <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                     class="rounded-full w-10 h-10 relative object-cover" />
             @else
                 <img src="https://placeimg.com/192/192/arch" class="rounded-full w-10 h-10 relative object-cover" />
             @endif
         </div>
         <div>
             <p class="font-medium group-hover:text-indigo-400 leading-4">{{ auth()->user()->name }}</p>
             <span class="text-xs text-slate-400">{{ auth()->user()->username }}</span>

         </div>

     </div>
     <hr class="my-2 border-slate-700">
     <div id="menu" class="flex flex-col space-y-2 my-5">
         <a href="/admin/dashboard"
             class="md:hover:bg-white/10 {{ Request::is('admin/dashboard') ? 'md:bg-white/10  ' : '' }} transition duration-
             150 ease-linear rounded-lg py-3 px-2 group">
             <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                 <div>
                     <i
                         class="bi bi-speedometer2 text-2xl group-hover:text-green3 {{ Request::is('admin/dashboard') ? ' text-green1' : '' }}"></i>

                 </div>
                 <div>
                     <p
                         class="font-bold  text-sm lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400 sm:text-left text-center">
                         Dashboard</p>
                     <p class="text-slate-400 text-sm hidden md:block">Data overview</p>
                 </div>

             </div>
         </a>
         <a href="/admin/dashboard/recipe"
             class=" md:hover:bg-white/10 {{ Request::is('admin/dashboard/recipe*') ? 'md:bg-white/10 ' : '' }} transition duration-150 ease-linear rounded-lg py-3 px-2 group">
             <div class="relative flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                 <div>

                     <i
                         class="bi bi-card-text text-2xl group-hover:text-green3 {{ Request::is('admin/dashboard/recipe*') ? ' text-green1 ' : '' }}"></i>
                 </div>
                 <div>
                     <p
                         class="font-bold text-sm lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400 sm:text-left text-center">
                         Recipes</p>
                     <p class="text-slate-400 text-sm hidden md:block">Manage Recipes</p>
                 </div>

             </div>
         </a>
         <a href="/admin/dashboard/user"
             class="md:hover:bg-white/10 {{ Request::is('admin/dashboard/user*') ? 'md:bg-white/10 ' : '' }} transition duration-150 ease-linear rounded-lg py-3 px-2 group">
             <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                 <div>
                     <i
                         class="bi bi-people text-2xl group-hover:text-green3 {{ Request::is('admin/dashboard/user*') ? ' text-green1 ' : '' }}"></i>
                 </div>
                 <div>
                     <p
                         class="font-bold text-sm lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400 md:text-left text-center">
                         Users</p>
                     <p class="text-slate-400 text-sm hidden md:block">Manage users</p>
                 </div>

             </div>
         </a>
         <a href="/admin/dashboard/category"
             class="md:hover:bg-white/10 {{ Request::is('admin/dashboard/category*') ? 'md:bg-white/10 ' : '' }} transition duration-150 ease-linear rounded-lg py-3 px-2 group">
             <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                 <div>
                     <i
                         class="bi bi-tags text-2xl group-hover:text-green3 {{ Request::is('admin/dashboard/category*') ? ' text-green1 ' : '' }}"></i>
                 </div>
                 <div>
                     <p
                         class="font-bold text-sm lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400 sm:text-left text-center">
                         Categories</p>
                     <p class="text-slate-400 text-sm hidden md:block">Manage Categories</p>
                 </div>

             </div>
         </a>
         <a href="/admin/dashboard/country"
             class="md:hover:bg-white/10 {{ Request::is('admin/dashboard/country*') ? 'md:bg-white/10 ' : '' }} transition duration-150 ease-linear rounded-lg py-3 px-2 group">
             <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                 <div>
                     <i
                         class="bi bi-flag text-2xl group-hover:text-green3 {{ Request::is('admin/dashboard/country*') ? ' text-green1 ' : '' }}"></i>
                 </div>
                 <div>
                     <p
                         class="font-bold text-sm lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400 sm:text-left text-center">
                         Country</p>
                     <p class="text-slate-400 text-sm hidden md:block">Manage Countries</p>
                 </div>
             </div>
         </a>
         <a href="#" class="md:hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
             <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                 <div>
                     <i
                         class="bi bi-gear text-2xl group-hover:text-green3 {{ Request::is('admin/dashboard/    ') ? ' text-green1 ' : '' }}"></i>
                 </div>
                 <div>
                     <p
                         class="font-bold text-sm lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400 sm:text-left text-center">
                         Settings</p>
                     <p class="text-slate-400 text-sm hidden md:block">Edit settings</p>
                 </div>

             </div>
         </a>
         <a href="/" class="md:hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
             <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                 <div>
                     <i class="bi bi-house text-2xl group-hover:text-green3""></i>
                 </div>
                 <div>
                     <p class="font-bold text-sm lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                         Home</p>
                     <p class="text-slate-400 text-sm hidden md:block">Go to Homepage</p>
                 </div>

             </div>
         </a>
     </div>

 </div>
