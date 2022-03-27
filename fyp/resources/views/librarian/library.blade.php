<x-app-layout>
  <x-slot name="header">

    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Library') }}
    </h2>
  </x-slot>

  @if(Session::has('success'))
  <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-8 py-3" role="alert">
    {{Session::get('success')}}
  </div>
  @endif

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-1 bg-white border-b border-gray-200">
          <a href="{{ route('new_book') }}">
            <x-button type="submit" style="float:right; margin:25px"> Add Book </x-button>
          </a>
          <input type="text" id="searchInput" onkeyup="search()" placeholder="Search for books..">
          <div class="row justify-content-center">
            <table id="allbooks" class="table-auto border-separate" style=" width:100%; border:solid thin">
                <thead class="thead-dark">
                  <th>Book Title</th>
                  <th>Author</th>
                  <th>Book Band</th>
                  <th>Category</th>
                  <th>Available Quantity</th>
                  <th> </th>
                </thead>
              <tbody>
                @foreach ($book as $books)
                <tr style="text-align: center">
                  <td>{{$books->book_title}}</td>
                  <td>{{$books->author}}</td>
                  @if($books->book_band)
                  <td>{{$books->book_band}}</td>
                  @else
                  <td> - </td>
                  @endif
                  <td>{{$books->category}}</td>
                  <td>{{$books->available_quantity}}</td>
                  <td>
                    <a href="{{ route('viewbook', [$books->bookid]) }}" class="underline text-yellow-600 hover:text-gray-900"> Details... </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <br>
            {{ $book->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

<script>
function search() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("allbooks");
  tr = table.getElementsByTagName("tr");

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i];
    if(td)
    {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
