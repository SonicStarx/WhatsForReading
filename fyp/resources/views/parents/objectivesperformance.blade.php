<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Learning Objective Performance') }}
        </h2>
    </x-slot>

    <x-auth-validation-errors class="w-1/2 p-5 m-auto" :errors="$errors" />
    @if(Session::has('success'))
    <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-8 py-3" role="alert">
      {{Session::get('success')}}
    </div>
    @endif

    <a href="{{ route('performancehub') }}" class="p-5  underline text-gray-600 hover:text-gray-900 flex">
       Return to perfrormance summary </a>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   @if($LOs->count() > 0)
                  <table class=" table-auto border-separate" style=" width:100%; border:solid thin">
                    <tr>
                      <thead class="">
                        <th>Assessed Date</th>
                        <th>Learning Objective</th>
                        <th>Progress</th>
                        <th>Notes</th>
                      </thead>
                    </tr>
                    <tbody>
                      @foreach ($LOs as $LO)
                      <tr>
                        <td>{{$LO->assessment_date->format('d/m/Y')}}</td>
                        <td>{{$LO->LOTitle->LO_title}}</td>
                        <td>{{$LO->performance}}</td>
                        <td>{{$LO->Notes}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  @else
                  <p class="text-lg"> No data currently stored for learning objective progress </p>
                  @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
