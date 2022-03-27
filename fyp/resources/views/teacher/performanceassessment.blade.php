<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Performance Assessment - Add new assessment') }}
    </h2>
  </x-slot>

  <a href="{{ route('individualperformance', $pupil->pupilid) }}" class="p-5 ml-32 underline text-gray-600 hover:text-gray-900 flex"> Return to {{ $pupil->first_name }}'s summary </a>
  <x-auth-validation-errors class="w-1/2 p-5 m-auto" :errors="$errors" />
  @if(Session::has('success'))
  <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-8 py-3" role="alert">
    {{Session::get('success')}}
  </div>
  @endif

  <div class=" w-1/2 p-5 m-auto">
    <form method="POST" action=" {{ route('addassessment', $pupil->pupilid) }}" enctype="multipart/form-data" >
      @method('PUT')
      @csrf

      <!-- Learning Objectives -->
      <div class="mt-3">
        <x-label for="objectives" value="Learning Objective"/>
        <select id="objectives" name='objectives' class="block mt-1 w-full">
          <option value="">Select Objective</option>
          @foreach($LOs as $LO)
          <option class="sortMe" value="{{ $LO->LO_id }}"> [{{ $LO->year_group }}] {{ $LO->LO_title }} </option>
          @endforeach
        </select>
      </div>

      <!-- Progress Status -->
      <div class=" mt-3">
        <x-label for="performance" value="Current Performance"/>
        <select id="performance" name='performance' class="block mt-1 w-full">
          <option value="">Select current progress level</option>
          <option value="Working above expectations">Working above expectations (Greater Depth)</option>
          <option value="Working at expectations">Working at expectations</option>
          <option value="Working towards expectations">Working towards expectations</option>
          <option value="Working below expectations">Working below expectations</option>
        </select>
      </div>

      <!-- Notes -->
      <div class=" mt-3">
        <x-label for="notes" value="notes" />
        <textarea id="notes" class="block mt-1 w-full"  name="notes" rows="6" cols="50" required autofocus>
      </textarea>
      </div>

      <!-- Assessed Date -->
      <div class="mt-8">
        <x-label for="assessment_date" value="Assessed Date" />
        <x-input id="assessment_date" class="block mt-1 w-full" type="date" name="assessment_date" :value="old('assessment_date')" required autofocus />
      </div>

      <div class="flex items-center justify-end mt-4">
        <x-button class="ml-4">
          {{ __('Add Assessment') }}
        </x-button>
        <x-button class="ml-4" type="reset">
          {{ __('Reset') }}
        </x-button>
      </div>
    </form>
  </div>
</x-app-layout>

<script type="text/javascript">
var mylist = $('#objectives');
 var listitems = mylist.children('option.sortMe').get();
 listitems.sort(function(a, b) {
    var compA = $(a).text().toUpperCase();
    var compB = $(b).text().toUpperCase();
    return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
 })
 $.each(listitems, function(idx, itm) { mylist.append(itm); });
    </script>
