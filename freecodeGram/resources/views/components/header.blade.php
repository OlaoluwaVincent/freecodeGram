@php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
@endphp





<header class='w-full flex items-center justify-between bg-slate-400 shadow-lg px-4 lg:px-10 py-4 lg:py-6 mb-3 lg:mb-5'>
   <div>
      <h1 class="font-bold capitalize text-4xl tracking-wider"><span class="text-blue-900 -mr-1">V</span> <span class="text-3xl text-orange-800">Books</span></h1>
      <h4 class="capitalize font-mono text-lg">Home of your <span class="text-white">choicest</span> books</h4>
   </div>
   <nav>
      <ul class="flex items-center justify-between gap-5">

         <li class="list-item {{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}">Home</a>
         </li>
         <li class="list-item relative {{ Route::currentRouteName() === 'inventory' ? 'active' : '' }}">
            <a href="{{ route('inventory') }}">Inventory <span class="p-1 rounded-full bg-orange-400 border border-white absolute -top-3 -right-2 text-xs text-white">{{$allBooks->count()}}
               </span> </a>
         </li>
         <li class="list-item {{ Route::currentRouteName() === 'profile' ? 'active' : '' }}">
            <a href="{{ route('profile') }}">Profile</a>
         </li>
         <li class="list-item">
            <a href="{{ route('logout') }}">Logout</a>
         </li>
      </ul>
   </nav>
</header>

<style>
   .list-item {
      font-size: 20px;
      font-weight: bold;
      transition: all ease-in-out 200ms linear;
   }

   .list-item:hover {
      color: khaki;
   }

   .active {
      color: white;
      position: relative;
      transition: all ease-in-out 500ms linear;
   }

   .active::after {
      content: '';
      position: absolute;
      width: 50%;
      height: 3px;
      background: #000;
      bottom: 0;
      right: 50%;
      transform: translateX(50%);
      z-index: 10;
   }

   .list-item:hover.active::after {
      background: white;
   }
</style>