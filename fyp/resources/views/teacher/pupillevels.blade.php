<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Update {{  __($pupil->first_name)  }} {{  __($pupil->last_name)  }}'s Performance
    </h2>
  </x-slot>

  <a href="{{ route('individualperformance', $pupil->pupilid) }}" class="p-5 ml-32 underline text-gray-600 hover:text-gray-900 flex"> Return to pupil's performance summary </a>
  <x-auth-validation-errors class="w-1/2 p-5 m-auto" :errors="$errors" />
  @if(Session::has('success'))
  <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-8 py-3" role="alert">
    {{Session::get('success')}}
  </div>
  @endif

  <div class=" w-1/2 p-5 m-auto">
    <form method="POST" action="{{ route('updatepupillevels', $pupil->pupilid) }}">
      @method('PUT')
      @csrf

      <!-- Reading Level -->
      <div class="book_band mt-3">
        <x-label for="book_band" :value="__('Book Band')"/>
          <select id="reading_level" name='reading_level' class="block mt-1 w-full">
          @if(isset($pupilp->reading_level))
          <option value="Lilac" @if('Lilac' == $pupilp->reading_level) selected @endif>Lilac</option>
          <option value="Pink" @if('Pink' == $pupilp->reading_level) selected @endif>Pink</option>
          <option value="Red" @if('Red' == $pupilp->reading_level) selected @endif>Red</option>
          <option value="Yellow" @if('Yellow' == $pupilp->reading_level) selected @endif>Yellow</option>
          <option value="Light Blue" @if('Light Blue' == $pupilp->reading_level) selected @endif>Light Blue</option>
          <option value="Green" @if('Green' == $pupilp->reading_level) selected @endif>Green</option>
          <option value="Orange" @if('Orange' == $pupilp->reading_level) selected @endif>Orange</option>
          <option value="Turquoise" @if('Turquoise' == $pupilp->reading_level) selected @endif>Turquoise</option>
          <option value="Purple" @if('Purple' == $pupilp->reading_level) selected @endif>Purple</option>
          <option value="Gold" @if('Gold' == $pupilp->reading_level) selected @endif>Gold</option>
          <option value="White" @if('White' == $pupilp->reading_level) selected @endif>White</option>
          <option value="Lime" @if('Lime' == $pupilp->reading_level) selected @endif>Lime</option>
          <option value="Lime +" @if('Lime +' == $pupilp->reading_level) selected @endif>Lime +</option>
          <option value="Brown" @if('Brown' == $pupilp->reading_level) selected @endif>Brown</option>
          <option value="Grey" @if('Grey' == $pupilp->reading_level) selected @endif>Grey</option>
          <option value="Dark Blue" @if('Dark Blue' == $pupilp->reading_level) selected @endif>Dark Blue</option>
          <option value="Dark Red" @if('Dark Red' == $pupilp->reading_level) selected @endif >Dark Red</option>
          @else
          <option value=" ">Please select a book band</option>
          <option value="Lilac">Lilac</option>
          <option value="Pink">Pink</option>
          <option value="Red">Red</option>
          <option value="Yellow">Yellow</option>
          <option value="Light Blue">Light Blue</option>
          <option value="Green">Green</option>
          <option value="Orange">Orange</option>
          <option value="Turquoise">Turquoise</option>
          <option value="Purple">Purple</option>
          <option value="Gold">Gold</option>
          <option value="White">White</option>
          <option value="Lime">Lime</option>
          <option value="Lime +">Lime +</option>
          <option value="Brown">Brown</option>
          <option value="Grey">Grey</option>
          <option value="Dark Blue">Dark Blue</option>
          <option value="Dark Red">Dark Red</option>
          @endif
        </select>

      </div>



      <!-- Phonics Level -->
      <div class="phonics_level mt-3">
        <x-label for="phonics_level" :value="__('Phonics Level')"/>
        <select id="phonics_level" name='phonics_level' class="block mt-1 w-full" >
          @if(isset($pupilp->phonics_level))

          <option value=" ">Please select a phonics level</option>
          <option value="Stage 1" @if($pupilp->phonics_level == "Stage 1") selected @endif>Stage 1</option>
          <option value="Stage 2" @if($pupilp->phonics_level == "Stage 2") selected @endif>Stage 2</option>
          <option value="Stage 3" @if($pupilp->phonics_level == "Stage 3") selected @endif>Stage 3</option>
          <option value="Stage 4" @if($pupilp->phonics_level == "Stage 4") selected @endif>Stage 4</option>
          <option value="Stage 5" @if($pupilp->phonics_level == "Stage 5") selected @endif>Stage 5</option>
          <option value="Stage 6" @if($pupilp->phonics_level == "Stage 6") selected @endif>Stage 6</option>

         @else
          <option value=" ">Please select a phonics level</option>
          <option value="Stage 1">Stage 1</option>
          <option value="Stage 2">Stage 2</option>
          <option value="Stage 3">Stage 3</option>
          <option value="Stage 4">Stage 4</option>
          <option value="Stage 5">Stage 5</option>
          <option value="Stage 6">Stage 6</option>
          @endif
        </select>
      </div>

      <!-- Progress Status -->
      <div class="phonics_level mt-3">
        <x-label for="working_level" :value="__('Progress Status')"/>
        <div class=" mt-3">
          <select id="working_level" name='working_level' class="block mt-1 w-full">
            @if(isset($pupilp->working_level))
            @if($pupilp->working_level == "Working above expectations")
            <option value="Working above expectations" selected>Working above expectations (Greater Depth)</option>
            <option value="Working at expectations">Working at expectations</option>
            <option value="Working towards expectations" >Working towards expectations</option>
            <option value="Working below expectations" >Working below expectations</option>

            @elseif($pupilp->working_level == "Working at expectations")
            <option value="Working above expectations" >Working above expectations (Greater Depth)</option>
            <option value="Working at expectations" selected>Working at expectations</option>
            <option value="Working towards expectations" >Working towards expectations</option>
            <option value="Working below expectations" >Working below expectations</option>

            @elseif($pupilp->working_level == "Working towards expectations")
            <option value="Working above expectations" >Working above expectations (Greater Depth)</option>
            <option value="Working at expectations" >Working at expectations</option>
            <option value="Working towards expectations" selected>Working towards expectations</option>
            <option value="Working below expectations" >Working below expectations</option>

            @else
            <option value="Working above expectations" >Working above expectations (Greater Depth)</option>
            <option value="Working at expectations" >Working at expectations</option>
            <option value="Working towards expectations" >Working towards expectations</option>
            <option value="Working below expectations" selected>Working below expectations</option>
          </select>
        </div>
        @endif @else
          <option value="">Select current progress level</option>
          <option value="Working above expectations">Working above expectations (Greater Depth)</option>
          <option value="Working at expectations">Working at expectations</option>
          <option value="Working towards expectations">Working towards expectations</option>
          <option value="Working below expectations">Working below expectations</option>
          @endif
        </select>
      </div>

      <!-- Assessed Date -->
      <div class="mt-3">
        <x-label for="assessment_date" :value="__('Assessment Date')" />
        @if(isset($pupilp->assessment_date))
        <x-input id="assessment_date" class="block mt-1 w-full" type="date" value="{{ $pupilp->assessment_date->toDateString()}}" name="assessment_date" required autofocus />
        @else
        <x-input id="assessment_date" class="block mt-1 w-full" type="date" name="assessment_date" required autofocus />
        @endif
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

<script>

</script>
