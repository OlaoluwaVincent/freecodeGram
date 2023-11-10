<x-layout>
   <div class="container flex items-center justify-center  flex-col min-h-screen bg-slate-100">
      <h1 class="text-center font-bold mt-12 text-lg md:text-2xl">Create Account</h1>
      <form action="/auth/register" method="post" class='flex flex-col items-center justify-start py-12 px-[5%] gap-4 w-[40vw] m-auto bg-white'>
         @csrf
         <div class="flex items-center justify-start gap-2">
            <x-radio name="title" value="mr" label="Mr" />
            <x-radio name="title" value="mrs" label="Mrs" />
            <x-radio name="title" value="miss" label="Miss" />
            <x-radio name="title" value="dr" label="Dr" />
            <x-radio name="title" value="professor" label="Professor" />
         </div>
         <div class="w-full">
            <label for="name" class="self-start">Name</label>
            <input type="text" value="{{ old('name', '') }}" id="name" placeholder="Full Name" class="block w-full" name='name'>
         </div>
         <div class="w-full">
            <label for="email" class="self-start">Email</label>
            <input type="email" value="{{ old('email', '') }}" id="email" placeholder="email@email.com" class="block w-full" name='email'>
         </div>
         <div class="w-full">
            <label for="id_number" class="self-start">Organization ID Number</label>
            <input type="text" value="{{ old('id_number', '') }}" id="id_number" placeholder="17/25PC042" class="block w-full" name='id_number'>
         </div>
         <div class="w-full">
            <label for="password" class="self-start">Password</label>
            <input type="password" id="password" placeholder="Enter new password" class="block w-full" name='password'>
         </div>
         <div class="w-full">
            <label for="c_password" class="self-start">Confirm Password</label>
            <input type="password" id="c_password" placeholder="Confirm Password" class="block w-full" name='c_password'>
         </div>
         <span id="password-match"></span>

         <button type="submit" id="login_button">Create Account</button>

         <div class="w-full mx-auto">
            <p>Have an account? <span class="font-bold capitalize text-blue-600"><a href="/login">Login</a></span></p>
         </div>
      </form>

   </div>

</x-layout>


{{--styles--}}

<style>
   input {
      padding: 6px 12px;
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
   document.addEventListener("DOMContentLoaded", function() {
      document.title = 'Create Account';
      const passwordInput = document.getElementById("password");
      const confirmPasswordInput = document.getElementById("c_password");
      const passwordMatchMessage = document.getElementById("password-match");

      function checkPasswordMatch() {
         const password = passwordInput.value;
         const confirmPassword = confirmPasswordInput.value;

         if (password === confirmPassword) {
            passwordMatchMessage.textContent = "Passwords match!";
            passwordMatchMessage.style.color = "green";
         } else {
            passwordMatchMessage.textContent = "Passwords do not match!";
            passwordMatchMessage.style.color = "red";
         }
      }

      confirmPasswordInput.addEventListener("input", checkPasswordMatch);
   });
</script>