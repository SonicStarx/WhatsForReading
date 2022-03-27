<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Weekly Reading Lists
    </h2>
  </x-slot>

  <x-auth-validation-errors class="w-1/2 p-5 m-auto" :errors="$errors" />
  @if(Session::has('success'))
  <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-8 py-3" role="alert">
    {{Session::get('success')}}
  </div>
  @endif
  @if(Session::has('fail'))
  <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-8 py-3" role="alert">
    {{Session::get('fail')}}
  </div>
  @endif



  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-1 bg-white border-b border-gray-200">
          <div class="row justify-content-center">


            <div class="w-full  px-3">
              <a href="{{ route('newlist') }}">
              <x-button class="my-9" style="float:left"> Assign Books </x-button>
            </a>
            </div>

            <br>
            <p class="mt-24"> View previously made reading lists below </p>
            <table class="table-auto ml-24 my-12 " style="text-align: left; width:20%; ">
              <tr>
                <thead class="thead-dark">
                  <th class=" px-8 py-2"> For Week </th>
                  <th>  </th>
                </thead>
              </tr>
              <tbody>
                @foreach($savedLists as $savedList)
                <tr>

                  <td class=" px-8 py-2">{{date('d-m-Y', strtotime($savedList->assigned_week))}} </td>

                  <td class="px-8 py-2">
                     <a href="{{ route('viewlist',$savedList->assigned_week)}}"
                       class="underline text-blue-700 hover:text-gray-900">View
                     </a></td>
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
