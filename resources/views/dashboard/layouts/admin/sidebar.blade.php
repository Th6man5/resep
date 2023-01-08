 <div id="menu" class="bg-black col-span-4 rounded-lg p-5 ">
     <div class="grid grid-cols-2 items-center">
         <div>
             <h1 class="font-bold text-lg lg:text-3xl">Dashboard</h1>
         </div>
         <div class="ml-auto">
             <a class="btn btn-primary" href="/">Home</a>
         </div>

     </div>

     <p class="text-slate-400 text-sm mb-2">Welcome back,</p>
     <div
         class="flex flex-col space-y-2 md:space-y-0 md:flex-row mb-5 items-center md:space-x-2 hover:bg-white/10 group transition duration-150 ease-linear rounded-lg group w-full py-3 px-2">
         <div>
             <img class="rounded-full w-10 h-10 relative object-cover"
                 src="https://img.freepik.com/free-photo/no-problem-concept-bearded-man-makes-okay-gesture-has-everything-control-all-fine-gesture-wears-spectacles-jumper-poses-against-pink-wall-says-i-got-this-guarantees-something_273609-42817.jpg?w=1800&t=st=1669749937~exp=1669750537~hmac=4c5ab249387d44d91df18065e1e33956daab805bee4638c7fdbf83c73d62f125"
                 alt="">
         </div>
         <div>
             <p class="font-medium group-hover:text-indigo-400 leading-4">{{ auth()->user()->name }}</p>
             <span class="text-xs text-slate-400">{{ auth()->user()->username }}</span>

         </div>
         <div>
             <form action="/logout" method="post">
                 @csrf
                 <button type="submit" class="nav-link px-3 bg-dark border-0 text-light">Logout <span
                         data-feather="log-out" class="align-text-bottom"></span></button>
             </form>
         </div>
     </div>
     <hr class="my-2 border-slate-700">
     <div id="menu" class="flex flex-col space-y-2 my-5">
         <a href="/admin/dashboard"
             class="hover:bg-white/10 {{ Request::is('admin/dashboard') ? 'bg-white/10  ' : '' }} transition duration-150 ease-linear rounded-lg py-3 px-2 group">
             <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                 <div>
                     <i
                         class="bi bi-house text-2xl group-hover:text-green-500 {{ Request::is('admin/dashboard') ? ' text-green-400 ' : '' }}"></i>

                 </div>
                 <div>
                     <p class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                         Dashboard</p>
                     <p class="text-slate-400 text-sm hidden md:block">Data overview</p>
                 </div>

             </div>
         </a>
         <a href="/admin/dashboard/recipe"
             class="hover:bg-white/10 {{ Request::is('admin/dashboard/recipe*') ? 'bg-white/10 ' : '' }} transition duration-150 ease-linear rounded-lg py-3 px-2 group">
             <div class="relative flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                 <div>

                     <i
                         class="bi bi-card-text text-2xl group-hover:text-green-400 {{ Request::is('admin/dashboard/recipe*') ? ' text-green-500 ' : '' }}"></i>
                 </div>
                 <div>
                     <p class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                         Recipes</p>
                     <p class="text-slate-400 text-sm hidden md:block">Manage invoices</p>
                 </div>

             </div>
         </a>
         <a href="#" class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
             <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                 <div>
                     <i class="bi bi-people text-2xl group-hover:text-indigo-400"></i>
                 </div>
                 <div>
                     <p class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                         Users</p>
                     <p class="text-slate-400 text-sm hidden md:block">Manage users</p>
                 </div>

             </div>
         </a>
         <a href="#" class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
             <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                 <div>
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6 group-hover:text-indigo-400">
                         <path stroke-linecap="round" stroke-linejoin="round"
                             d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                         <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                     </svg>

                 </div>
                 <div>
                     <p class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">
                         Settings</p>
                     <p class="text-slate-400 text-sm hidden md:block">Edit settings</p>
                 </div>

             </div>
         </a>
     </div>

 </div>
