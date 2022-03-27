<x-app-layout>
  <x-slot name="header">

    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('All Learning Objectives') }}
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
          <a href="{{ route('topicshome') }}">
            <x-button type="submit" style="float:right; margin:25px"> View all topics </x-button>
          </a>
          <input type="text" id="searchInput" onkeyup="search()" placeholder="Search..">
  <div class="row justify-content-center">
  <table id="allobjectives" class="sortable shadow-lg table-auto" style="text-align: center; width:100%; ">
    <tr>
      <thead class="thead-dark bg-blue-300">
        <th>Learning Objective Title</th>
        <th>Year Group</th>
        <th>Description</th>
        <th> Edit</th>
        <th> Delete</th>
      </thead>
    </tr>
    <tbody class="sortMe">
      @foreach ($LOs as $LO)
      <tr style="text-align: center" >
        <td>{{ $LO->LO_title}}</td>
        <td>{{ $LO->year_group}}</td>
        <td>{{ $LO->LO_description}}</td>
        <td> <a href="{{ route('editobjective', [$LO->LO_id]) }}" class="underline text-red-600 hover:text-gray-900">Edit</a></td>
        <td> <a href="deleteLO/{{$LO->LO_id}}" class="underline text-red-600 hover:text-gray-900"
          onclick="return confirm('Are you sure you would like to delete this Learning Objective?')">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>
</x-app-layout>
<script type="text/javascript">
var mylist = $('#objectives');
 var listitems = mylist.children('tbody.sortMe').get();
 listitems.sort(function(a, b) {
    var compA = $(a).text().toUpperCase();
    var compB = $(b).text().toUpperCase();
    return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
 })
 $.each(listitems, function(idx, itm) { mylist.append(itm); });
</script>
<script>
function search() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("allobjectives");
  tr = table.getElementsByTagName("tr");

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
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
