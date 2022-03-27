<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Topics & Objectives - Edit topic') }}
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
    <form method="POST" action="{{ route('updatetopic', [$topic->id]) }}">
      @method('PUT')
      @csrf

      <!-- Topic Title -->
      <div class="topic_title">
        <x-label for="topic_title" :value="__('Learning Objective Title')" />
        <x-input id="topic_title" class="block mt-1 w-full" type="text" name="topic_title" value="{{$topic->topic_title}}" required autofocus />
      </div>

      <!-- Description -->
      <div class="author mt-3">
        <x-label for="description" :value="__('Description')" />
        <textarea id="description" class="block mt-1 w-full"  name="description"  rows="6" cols="50" required autofocus>
          <?php echo $topic->topic_description; ?>
      </textarea>
      </div>

      <!-- Scheduled Teaching -->
      <div class="category mt-3">
        <x-label for="teaching_date" :value="__('Scheduled Teaching')" />
        <x-input id="teaching_date" class="block mt-1 w-full" type="date" onload="" name="teaching_date" value="{{ $topic->scheduled_teaching->toDateString()}}"  required autofocus />
      </div>

      <!-- Learning Objectives -->
      <div class="phonics_level mt-3">
        <x-label for="learning_objectives" :value="__('Learning Objectives')"/>
        <select id="learning_objectives" name='learning_objective' class="block mt-1 w-full">
          <option value="">Select Objective</option>
          @foreach($LOs as $LO)
          <option class="sortMe" value="{{$LO->LO_id}}"
            @if(old('LO')== $LO->LO_id || $LO->LO_id == $topic->topicLO) selected @endif>

            [{{ $LO->year_group }}] {{ $LO->LO_title }} </option>
          @endforeach
        </select>
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
