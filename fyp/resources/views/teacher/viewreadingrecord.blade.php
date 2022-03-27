<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       {{$pupil->first_name}} {{$pupil->last_name}}'s Reading Record
    </h2>
  </x-slot>
  <a href="{{ route('readingrecords') }}" class="p-5  underline text-gray-600 hover:text-gray-900 flex"> Return to reading records </a>
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
            <p> Current reading level: {{$pupilp->reading_level}} </p>
            <a href="{{ route('individualperformance',$pupil->pupilid) }}"
              class="underline text-blue-600 hover:text-gray-900">
               View {{$pupil->first_name}}'s performance data </a>

            <table class="border border-gray-900  table-auto divide-x-0 ml-5 my-20" style="text-align: center; width:80%;">
              <tr >
              <thead>
                <th >Assigned Week</th>
                <th>Book</th>
                <th >Read by pupil?</th>
              </thead>
            </tr>
            <tbody class="pl-0">
              @foreach($records as $record)
              <tr>
                  <td class="border border-gray-900">{{$record->assigned_week->format('d/m/y')}}</td>
                  @foreach($library as $book)
                    @if($book->bookid == $record->bookid)
                      <td class="border border-gray-900"> {{$book->book_title}} </td>
                    @endif
                  @endforeach

                  @if($record->read == 0)
                    <td class="border border-gray-900">No</td>
                  @else
                    <td class="border border-gray-900">Yes</td>
                  @endif
                @endforeach
              </tr>
            </tbody>
            </table>

            </div>
         </div>
       </div>
     </div>
   </div>
</x-app-layout>
