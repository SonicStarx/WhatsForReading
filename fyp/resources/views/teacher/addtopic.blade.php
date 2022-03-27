<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Topics & Objectives - Add new topic') }}
    </h2>
  </x-slot>

  <a href="{{ route('topicshome') }}" class="p-5 ml-32 underline text-gray-600 hover:text-gray-900 flex"> Return to Topics & Objectives </a>
  <x-auth-validation-errors class="w-1/2 p-5 m-auto" :errors="$errors" />
  @if(Session::has('success'))
  <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-8 py-3" role="alert">
    {{Session::get('success')}}
  </div>
  @endif

  <div class=" w-1/2 p-5 m-auto">
    <form method="POST" action="{{ route('storetopic') }}" enctype="multipart/form-data" >
      @method('PUT')
      @csrf

      <!-- Topic Title -->
      <div class="topic_title">
        <x-label for="topic_title" :value="__('Topic Title')" />
        <x-input id="topic_title" class="block mt-1 w-full" type="text" name="topic_title" :value="old('topic_title')" required autofocus />
      </div>

      <!-- Description -->
      <div class="desc mt-3">
        <x-label for="topic_description" :value="__('Description')" />
        <textarea id="topic_description" class="block mt-1 w-full"  name="topic_description" :value="old('topic_description')" rows="6" cols="50" required autofocus>
        </textarea>
      </div>

      <!-- Year Group -->
      <div class="mt-3">
        <x-label for="year_group" :value="__('Target Year Group')"/>
        <select id="year_group" name='year_group' class="block mt-1 w-full">
          <option value="Reception">Reception</option>
          <option value="Year 1">Year 1</option>
          <option value="Year 2">Year 2</option>
        </select>
      </div>

      <!-- Scheduled Teaching -->
      <div class="mt-8">
        <x-label for="scheduled_teaching" :value="__('Scheduled Teaching')" />
        <x-input id="scheduled_teaching" class="block mt-1 w-full" type="date" name="scheduled_teaching" :value="old('scheduled_teaching')" required autofocus />
      </div>

      <!-- Learning Objectives -->
      <div class="mt-3">
        <x-label for="topicLO" :value="__('Learning Objectives')"/>
        <select id="topicLO" name='topicLO' class="block mt-1 w-full">
          <option value="">Select Objective</option>
          @foreach($LOs as $LO)
          <option class="sortMe" value="{{ $LO->LO_id }}"> [{{ $LO->year_group }}] {{ $LO->LO_title }} </option>
          @endforeach
        </select>
      </div>

      <div class="flex items-center justify-end mt-4">
        <x-button class="ml-4">
          {{ __('Add Topic') }}
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
