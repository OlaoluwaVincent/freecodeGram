<x-layout>

   <section class="relative">

      <section class="errors">
         @if(session('success'))
         <div class="alert success">
            {{ session('success') }}
         </div>
         @endif

         @if(session('error'))
         <div class="alert danger">
            {{ session('error') }}
         </div>
         @endif

         @if(session('message'))
         <div class="alert info">
            {{ session('message') }}
         </div>
         @endif
      </section>

      <section class="books">

         <div class="font-bold text-sm lg:text-lg">
            <h4>List of Books borrowed or bought</h4>

            <div class="flex flex-col gap-4 mt-4">
               @if(isset($singleBooks))

               @foreach($singleBooks as $book)
               <div class="flex items-center gap-3 justify-between">
                  <p>{{$book->title}} - <span class="text-red-500">{{$book->sellable == true ? 'Bought' : 'Borrowed'}}</span></p>
               </div>
               @endforeach

               @endif
            </div>

         </div>

         <div>
            @if(isset($booksLibrary) && $booksLibrary->count()>0)
            <h4 class="font-bold capitalize text-sm lg:text-lg">Books Available</h4>

            <div class="flex flex-col gap-4">
               @foreach($booksLibrary as $book)
               <div class="flex items-center gap-3 justify-between">
                  <p>{{$book->title}}</p>
                  <a href="inventory/{{ strval($book->id) }}" class="bg-green-700 text-white text-sm rounded-md px-3 py-1">{{$book->sellable == true ? 'Purchase Book' : 'Borrow Book'}}</a>
               </div>
               @endforeach

               @else
               <p class="font-bold">No books in Inventory</p>

               @endif
            </div>
         </div>

      </section>

   </section>

</x-layout>

<script>
   document.title = 'Inventory'

   // Function to hide or remove the session data alerts after 5 seconds

   function hideSessionAlerts() {
      setTimeout(function() {
         // Select all the alert elements
         var alerts = document.querySelectorAll('.alert');

         // Loop through the alerts and remove them from the DOM
         alerts.forEach(function(alert) {
            alert.style.display = 'none';
         });
      }, 4000); // 5000 milliseconds = 5 seconds
   }

   // Call the function when the page is loaded
   window.addEventListener('load', hideSessionAlerts);
</script>

<style>
   .books {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      gap: 20px;
   }

   .alert {
      position: absolute;
      top: -20px;
      left: 50%;
      transform: translateX(-50%);
      background-color: coral;
      border-radius: 10px;
      color: white;
      padding: 10px 20px;
   }

   .success {
      background-color: green;
   }

   .danger {
      background-color: red;
   }

   .info {
      background-color: blue;
   }
</style>