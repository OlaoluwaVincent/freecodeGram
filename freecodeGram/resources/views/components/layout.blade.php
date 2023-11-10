@php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
@endphp

<x-partials.head />
<main class="main">
   @if (auth()->check())
   <x-header />
   @endif
   <section class="container px-[3%] lg:px-[5%]">
      {{$slot}}
   </section>

</main>
<x-partials.footer />
<style>
   .main {
      background-color: whitesmoke;
      min-height: 100vh;
   }
</style>