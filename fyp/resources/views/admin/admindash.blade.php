<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('System Users') }}
    </h2>
  </x-slot>


     <script src="{{ asset('js/app.js') }}" defer></script>
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">

     @if(Session::has('success'))
     <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-8 py-3" role="alert">
       {{Session::get('success')}}
     </div>
     @endif

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-1 bg-white border-b border-gray-200">
          <a href="{{ route('adduser') }}">
            <x-button type="submit" style="float:right; margin:25px"> Add User </x-button>
          </a>
          <input type="text" id="searchInput" onkeyup="search()" placeholder="Search for users..">
          <div class="row justify-content-center">
          <table class="table-auto" id="allusers" style="text-align: center; width:100%; border:solid thin">
              <thead  class="thead-dark">
                <th>First Name</th>
                <th>Last name</th>
                <th>E-mail</th>
                <th>Role</th>
                <th>Edit</th>
                <th>Delete</th>
              </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <td style="text-align: center">{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>
                  <a href="{{ route('edituser', [$user->id]) }}" class="underline text-yellow-600 hover:text-gray-900"> Edit </a>
                </td>
                <td>
                  <a href="deleteuser/{{$user->id}}" class="underline text-red-600 hover:text-gray-900"
                    onclick="return confirm('Are you sure you would like to delete this user?')">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <br>
          {{ $users->links() }}
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
  table = document.getElementById("allusers");
  tr = table.getElementsByTagName("tr");

  // Loop through all list items, and hide those who don't match the search query
  for (i = 1; i < tr.length; i++) {
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
