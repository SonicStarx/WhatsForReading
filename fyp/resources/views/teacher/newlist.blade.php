<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Create new reading list
    </h2>
  </x-slot>

  <a href="{{ route('readinglists') }}" class="p-5  underline text-gray-600 hover:text-gray-900 flex"> Return to reading lists </a>
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

                @csrf
              <table class="table-auto " style="text-align: left; width:75%;">
                <tr>
                  <thead>
                    <th>Pupil</th>
                    <th> </th>
                  </thead>
                </tr>
                <tbody>
                  @foreach ($pupils as $pupil)
                  <tr class="mb-5">
                    <td>{{ $pupil->first_name }} {{ $pupil->last_name }}</td>

                    <td>
                      <a href="{{ route('assignbook',$pupil->pupilid)}}">
                      <x-button> Assign Book </x-button>
                      </a>
                    </td>
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
