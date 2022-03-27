<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{  __($pupil->first_name)  }} {{  __($pupil->last_name)  }}'s Performance
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

  <a href="{{ route('classperformance') }}" class="p-5 underline text-gray-600 hover:text-gray-900 flex"> Return to {{$pupil->class}} Class performance</a>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-1 bg-white border-b border-gray-200">
          <div class="row justify-content-center">
            @if(isset($pupilp))
            <p class="mt-8"> Current Reading Level: {{$pupilp->reading_level}}</p>
            <p> Current Phonics Level: {{$pupilp->phonics_level}}</p>
            <p >Working level: {{$pupilp->working_level}}</p>
            <p> Date of assessment: {{ $pupilp->assessment_date->format('d/m/Y')}}</p>
            <p> Last Updated: {{ $pupilp->uploaded_date->format('d/m/Y')}} </p>
            <br>
            @else
            <p class="mt-8"> Current Reading Level: </p>
            <p> Current Phonics Level: </p>
            <br>
            @endif
            <a class="underline text-blue-700 hover:text-gray-900" href= "{{ route('viewrecord', $pupil->pupilid) }}"> View Reading Record </a>
            <br>
            <a href="{{ route('pupillevels', $pupil->pupilid) }}">
              <x-button type="submit" style="float:left; margin-top:8px; margin-bottom:10px"> Update levels and progress </x-button>
            </a>
            <a href="{{ route('pupilassessment', $pupil->pupilid) }}">
              <x-button type="submit" style="float:right; margin-top:8px; margin-bottom:8px"> Add new assessment </x-button>
            </a>

            <table class="mt-8 table-auto border-separate" style=" width:100%; border:solid thin">
              <tr>
                <thead class="">
                  <th>Assessed Date</th>
                  <th>Learning Objective</th>
                  <th>Progress</th>
                  <th>Notes</th>
                  <th></th>
                </thead>
              </tr>
              <tbody>
                @foreach ($LOfindp as $LO)
                <tr>
                  <td>{{$LO->assessment_date->format('d/m/Y')}}</td>
                  <td>{{$LO->LOTitle->LO_title}}</td>
                  <td>{{$LO->performance}}</td>
                  <td>{{$LO->Notes}}</td>
                  <td>
                    <a href="{{ route('editassessment', $LO->id) }}" class="underline text-yellow-600 hover:text-gray-900">Edit</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
</x-app-layout>
