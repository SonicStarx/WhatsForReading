<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{  __($teacher->class_name)  }} Class Performance
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
            <a href="{{ route('performancecharts') }}" class="pl-5 pb-5 underline text-blue-600 hover:text-blue-900 flex"> Chart View</a>
            <table class="table-auto border-separate" style="text-align: center; width:100%; border:solid thin">
              <tr>
                <thead>
                  <th>Pupil</th>
                  <th>Current Book Band</th>
                  <th>Current Phonics Level</th>
                  <th></th>
                </thead>
              </tr>
              <tbody>
                @foreach ($pupils as $pupil)
                @if($pupil->class == $teacher->class_name)
                <tr>
                  <td>{{$pupil->first_name}} {{$pupil->last_name}}</td>

                  @foreach($pupilp as $stats)
                  @if($stats->pupilid == $pupil->pupilid)
                  <td>{{$stats->reading_level}}</td>
                  <td>{{$stats->phonics_level}}</td>
                  @endif
                  @endforeach


                  <td><a href="{{ route('individualperformance', $pupil->pupilid) }}">
                    <x-button type="submit" style="margin:10px"> View Performance History </x-button>
                  </a></td>
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
