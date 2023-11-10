<x-layout>
   <div class="container flex items-center justify-center  flex-col min-h-screen bg-slate-100">
      <h1 class="text-center font-bold mt-12 text-lg md:text-2xl">Login Here</h1>
      <form action="/auth/login" method="post" class='flex flex-col items-center justify-start p-12 gap-6 w-[30vw] m-auto bg-white'>
         @csrf


         @if ($errors->any())
         <div>
            <ul>
               @foreach ($errors->all() as $error)
               <li class="text-red-500 font-bold capitalize">{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif
         <input type="text" value="{{ old('email', '') }}" placeholder="Username or Email Address" class="username" name='email'>
         <input type="password" placeholder="Password" class="username" name='password'>
         <button type="submit" id="login_button">Submit</button>

         <div class="w-full mx-auto">
            <p>Don't have an account? <span class="font-bold capitalize text-blue-600"><a href="/register">Register</a></span></p>
         </div>
      </form>

   </div>

</x-layout>

{{--styles--}}

<style>
   input {
      padding: 10px;
      outline: none;
      border: none;
      border: 1px gray solid;
      border-radius: 8px;
      width: 100%;
      display: block;
   }

   #login_button {
      border: none;
      background-color: green;
      padding: 8px 16px;
      color: white;
      font-weight: bold;
      width: 100%;
   }

   #login_button:hover {
      background-color: #025a02;
      cursor: pointer;

   }
</style>

{{--Javascript--}}

<script>
   document.title = 'Login';
</script>