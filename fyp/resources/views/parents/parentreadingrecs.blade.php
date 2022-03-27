<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reading Records') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  @foreach($parent->pupils as $pupil)
                  <p class="text-xl text-gray-800 mb-5">
                    {{$pupil->first_name}} {{$pupil->last_name}}'s Reading Record</p>


                          <table class="mb-10 table-auto divide-x-0" style="text-align: center; width:100%; border:solid thin">
                            <tr>
                            <thead>
                              <th>Assigned Week</th>
                              <th>Book</th>
                              <th>Status</th>
                              <th> </th>
                            </thead>
                          </tr>
                            <tbody>
                            @foreach($records as $record)
                            @if(($pupil->pupilid == $record->pupilid))
                            <tr>
                              <td> {{date('d-m-Y', strtotime($record->assigned_week))  }} </td>
                              @foreach($books as $book)
                              @if($book->bookid == $record->bookid)
                                <td> {{ $book->book_title }} </td>
                              @endif
                              @endforeach

                              @if($record->read == 0)
                                <td> Unread </td>
                                <td> <a href="{{ route('markasread', $record->entryid) }}">
                                  <x-button style="margin:10px"> Mark As Read </x-button>
                                </a> </td>
                              @else
                                <td> Read </td>
                                <td> Complete </td>
                              @endif
                              @endif
                              @endforeach
                            </tr>
                          </tbody>
                          </table>
              <!--because of the record loop this won't print only once and so
              the loop has been copied here to cover empty records -->
                        @if(($pupil->pupilid == $record->pupilid))
                        @else
                        <p> There are currently no records to show </p>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
