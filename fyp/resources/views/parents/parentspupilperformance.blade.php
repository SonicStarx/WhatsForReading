<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Performance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                  @foreach($parent->pupils as $pupil)
                    <p class="text-xl text-gray-800 mb-1"> {{$pupil->first_name}} {{$pupil->last_name}}'s Performance</p>
                    @foreach($records as $record)
                      @if(isset($record))
                        @if($record->pupilid === $pupil->pupilid)
                          <p> Current Reading Level: {{$record->reading_level}}</p>
                          <p> Current Phonics Level: {{$record->phonics_level}}</p>
                          <p >Working level: {{$record->working_level}}</p>
                          <p> Date of assessment: {{ $record->assessment_date->format('d/m/Y')}}</p>
                          <p class="mb-5"> Last Updated: {{ $record->uploaded_date->format('d/m/Y')}} </p>
                          @endif
                      @endif
                    @endforeach
                    <div class="mb-3">
                      <a href="{{ route('objectivesview', $pupil->pupilid)}}" class="underline text-blue-700 hover:text-gray-900"> View learning objectives performance</a>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
