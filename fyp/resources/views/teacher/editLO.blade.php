<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Topics & Objectives - Edit learning objective') }}
    </h2>
  </x-slot>

  <a href="{{ route('objectiveshome') }}" class="p-5 ml-32 underline text-gray-600 hover:text-gray-900 flex"> Return to Objectives </a>
  <x-auth-validation-errors class="w-1/2 p-5 m-auto" :errors="$errors" />
  @if(Session::has('success'))
  <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-8 py-3" role="alert">
    {{Session::get('success')}}
  </div>
  @endif

  <div class=" w-1/2 p-5 m-auto">
    <form method="POST" action="{{ route('updateLO',[$LO->LO_id]) }}">
      @method('PUT')
      @csrf

      <!-- LO Title -->
      <div class="LO_title">
        <x-label for="LO_title" :value="__('Learning Objective Title')"/>
        <x-input id="LO_title" class="block mt-1 w-full" type="text" name="LO_title" value="{{$LO->LO_title}}" required autofocus />
      </div>

      <!-- Year Group -->
      <!-- Year Group -->
      <div class="mt-3">
        <x-label for="year_group" :value="__('Year Group')"/>
        <select id="year_group" name='year_group' class="block mt-1 w-full">
          <option value="Reception" @if('Reception' == $LO->year_group) selected @endif>Reception</option>
          <option value="Year 1" @if('Year 1' == $LO->year_group) selected @endif>Year 1</option>
          <option value="Year 2" @if('Year 2' == $LO->year_group) selected @endif>Year 2</option>
        </select>
      </div>

      <!-- Description -->
      <div class="author mt-3">
        <x-label for="LO_description" :value="__('Description')" />
        <textarea id="LO_description" class="block mt-1 w-full"  name="LO_description" rows="6" cols="50" required autofocus>
           <?php echo $LO->LO_description; ?>
      </textarea>
      </div>

      <div class="flex items-center justify-end mt-4">
        <x-button class="ml-4">
          {{ __('Update') }}
        </x-button>
        <x-button class="ml-4" type="reset">
          {{ __('Reset') }}
        </x-button>
      </div>
    </form>
  </div>
</x-app-layout>
