<x-layout>
   <div>
      @if (auth()->check())
      <h3>Welcome, {{ auth()->user()->name }}</h3>
      @endif
   </div>

   @if($userBorrowedBooks->count() > 0)
   <ul>
      @foreach($userBorrowedBooks as $book)
      <li>{{ $book->title }}</li>
      @endforeach
   </ul>
   @else
   <p>You haven't borrowed any books yet.</p>
   @endif

</x-layout>

<script>
   document.title = 'Dashboard'
</script>